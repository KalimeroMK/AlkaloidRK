<?php

    namespace Modules\Home\Http\Controllers;

    use App\Http\Requests\Email\SendRequest;
    use App\Traits\Lang;
    use DOMDocument;
    use Goutte\Client;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Str;
    use Modules\Category\Models\Category;
    use Modules\Gallery\Models\Gallery;
    use Modules\Home\Mail\ContactMail;
    use Modules\Post\Models\Post;
    use Modules\Score\Models\Score;
    use Modules\Slider\Models\Slider;
    use Modules\Team\Models\Team;
    use Modules\Youtube\Models\Youtube;
    use Spatie\Feed\Feed;
    use GuzzleHttp\Client as GuzzleClient;
    use Spatie\Feed\Helpers\ResolveFeedItems;

    class HomeController extends Controller
    {
        use Lang;

        /**
         * @return Application|Factory|View
         */
        public function index(): View|Factory|Application
        {
            $sliders = Slider::all()->take(3);
            $youtube = Youtube::get()->last();
            $teams   = Team::with([
                'language' => function ($query) {
                    $query->where('languages.code', $this->lang());
                },
            ])
                           ->paginate(8);
            $score   = Score::with([
                'language' => function ($query) {
                    $query->where('languages.code', $this->lang());
                },
            ])
                            ->latest()->first();;
            $scores = Score::with([
                'language' => function ($query) {
                    $query->where('languages.code', $this->lang());
                },
            ])
                           ->paginate(8);;
            $category = Category::whereSlug('news')->firstOrFail();
            $news     = Post::whereHas('categories', static function ($q) use ($category) {
                $q->where('title', '=', $category->title);
            })->with([
                'language' => function ($query) {
                    $query->where('languages.code', $this->lang());
                },
            ])->take(2)->get();

            return view('home::index',
                compact('sliders', 'youtube', 'teams', 'news', 'score', 'scores'));
        }

        /**
         * @param  SendRequest  $request
         *
         * @return RedirectResponse
         */
        public function contactPost(SendRequest $request): RedirectResponse
        {
            $data = $request->all();
            Mail::to('test@test.com')->send(new ContactMail($data));

            return redirect('contact')
                ->with('success_msg', 'Thanks for your message. We\'ll be in touch.');
        }

        /**
         * @return Application|Factory|View
         */
        public function aboutUs(): View|Factory|Application
        {
            return view('home::about');
        }

        /**
         * @param $slug
         *
         * @return Application|Factory|View
         */
        public function productCat($slug): View|Factory|Application
        {
            $category = Category::whereSlug($slug)->firstOrFail();
            $posts    = Post::whereHas('categories', static function ($q) use ($category) {
                $q->where('title', '=', $category->title);
            })->paginate(10);
            if ($slug === 'galleries') {
                return view('home::gallery', compact('category', 'posts'));
            }
            if ($slug === 'regruter') {
                return view('home::contact');
            }

            if ($slug === 'kl7') {
                return view('home::kl7', compact('category', 'posts'));
            }

            return view('home::category', compact('posts'));
        }

        /**
         * @param $slug
         *
         * @return Application|Factory|View
         */
        public function postDetails($slug): View|Factory|Application
        {
            $post    = Post::whereSlug($slug)->firstOrFail();
            $related = Post::whereHas('tags', static function ($q) use ($post) {
                return $q->whereIn('title', $post->tags->pluck('title'));
            })
                           ->where('id', '!=', $post->id) // So you won't fetch same product
                           ->take(4)->get();
            $sliders = Gallery::wherePostId($post->id)->get();

            return view('home::postDetails', compact('post', 'related', 'sliders'));
        }

        /**
         * @return array
         */
        public function results(): array
        {

            $client = new Client();
            $crawler = $client->request('GET', 'https://macedoniahandball.com.mk/tabelirezultati/');

            return $crawler->filter('table')->filter('tr')->each(function ($tr, $i) {
                return $tr->filter('td')->each(function ($td, $i) {
                    $td->filter('a')->each(function ($a, $i) {
                        return $a->attr('href');
                    });
                });
            });
        }

        /**
         * @param $slug
         *
         * @return Application|Factory|View
         */
        public function galleriesDetails($slug): View|Factory|Application
        {
            $post    = Post::whereSlug($slug)->firstOrFail();
            $sliders = Gallery::wherePostId($post->id)->get();

            return view('home::galleryDetails', compact('sliders', 'post'));
        }

        /**
         * @param $slug
         *
         * @return Application|Factory|View
         */
        public function playerDetails($slug): View|Factory|Application
        {
            $team = Team::whereSlug($slug)->with([
                'language' => function ($query) {
                    $query->where('languages.code', $this->lang());
                },
            ])->firstOrFail();

            $related = Team::with([
                'language' => function ($query) {
                    $query->where('languages.code', $this->lang());
                },
            ])
                           ->where('id', '!=', $team->id) // So you won't fetch same product
                           ->take(8)->get();

            return view('home::playerDetails', compact('team', 'related'));
        }

        /**
         * @return Feed
         */
        public function __invoke(): Feed
        {
            $feeds = config('feed.feeds');

            $name = Str::after(app('router')->currentRouteName(), 'feeds.');

            $feed = $feeds[$name] ?? null;

            abort_unless($feed, 404);

            $items = ResolveFeedItems::resolve($name, $feed['items']);

            return new Feed(
                $feed['title'],
                $items,
                request()->url(),
                $feed['view'] ?? 'feed::atom',
                $feed['description'] ?? '',
                $feed['language'] ?? 'en-US',
                $feed['image'] ?? '',
                $feed['format'] ?? 'atom',
            );
        }

    }

