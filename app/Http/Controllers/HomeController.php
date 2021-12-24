<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\Email\SendRequest;
    use App\Mail\ContactMail;
    use App\Models\Category;
    use App\Models\Gallery;
    use App\Models\Post;
    use App\Models\Score;
    use App\Models\Slider;
    use App\Models\Team;
    use App\Models\Youtube;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Mail;

    class HomeController extends Controller
    {

        /**
         * @return Application|Factory|View
         */
        public function index()
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

            return view('theme.index', compact('sliders', 'youtube', 'teams', 'news', 'score', 'scores'));
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
        public function aboutUs()
        {
            return view('theme.about');
        }

        /**
         * @param $slug
         *
         * @return Application|Factory|View
         */
        public function productCat($slug)
        {
            $category = Category::whereSlug($slug)->firstOrFail();
            $posts    = Post::whereHas('categories', static function ($q) use ($category) {
                $q->where('title', '=', $category->title);
            })->paginate(10);
            if ($slug === 'galleries') {
                return view('theme.gallery', compact('category', 'posts'));
            }
            if ($slug === 'regruter') {
                return view('theme.contact');
            }

            if ($slug === 'kl7') {
                return view('theme.kl7', compact('category', 'posts'));
            }

            return view('theme.category', compact('posts'));
        }

        /**
         * @param $slug
         *
         * @return Application|Factory|View
         */
        public function postDetails($slug)
        {
            $post    = Post::whereSlug($slug)->firstOrFail();
            $related = Post::whereHas('tags', static function ($q) use ($post) {
                return $q->whereIn('title', $post->tags->pluck('title'));
            })
                           ->where('id', '!=', $post->id) // So you won't fetch same product
                           ->take(4)->get();
            $sliders = Gallery::wherePostId($post->id)->get();

            return view('theme.postDetails', compact('post', 'related', 'sliders'));
        }

        /**
         * @return Application|Factory|View
         */
        public function results()
        {
            return view('theme.tabela');
        }

        /**
         * @param $slug
         *
         * @return Application|Factory|View
         */
        public function galleriesDetails($slug)
        {
            $post    = Post::whereSlug($slug)->firstOrFail();
            $sliders = Gallery::wherePostId($post->id)->get();

            return view('theme.galleryDetails', compact('sliders', 'post'));
        }

        /**
         * @param $slug
         *
         * @return Application|Factory|View
         */
        public function playerDetails($slug)
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

            return view('theme.playerDetails', compact('team', 'related'));
        }
    }

