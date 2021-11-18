<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\Email\SendRequest;
    use App\Mail\ContactMail;
    use App\Models\Category;
    use App\Models\Gallery;
    use App\Models\Post;
    use App\Models\Slider;
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
            return view('theme.index', compact('sliders', 'youtube'));
        }

        /**
         * @return Application|Factory|View
         */
        public function contact()
        {
            return view('theme.contact');
        }

        /**
         * @param  SendRequest  $request
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
         * @return Application|Factory|View
         */
        public function productCat($slug)
        {
            $category = Category::whereSlug($slug)->firstOrFail();
            $posts = Post::whereHas('categories', static function($q) use ($category) {
                $q->where('title', '=', $category->title);
            })->paginate(10);

            return view('theme.category', compact('posts'));
        }

        /**
         * @param $slug
         * @return Application|Factory|View
         */
        public function postDetails($slug)
        {
            $post = Post::whereSlug($slug)->firstOrFail();
            $related = Post::whereHas('tags', static function($q) use ($post) {
                return $q->whereIn('title', $post->tags->pluck('title'));
            })
                ->where('id', '!=', $post->id) // So you won't fetch same product
                ->take(4)->get();
            $sliders = Gallery::wherePostId($post->id)->get();
            return view('theme.postDetails', compact('sliders', 'post', 'related', 'related', 'sliders'));
        }

        public function results()
        {
            return view('theme.tabela');
        }

    }

