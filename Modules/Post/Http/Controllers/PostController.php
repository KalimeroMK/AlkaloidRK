<?php

    namespace Modules\Post\Http\Controllers;

    use App\Modules\Setting\Requests\Store;
    use App\Modules\Setting\Requests\Update;
    use App\Traits\ImageUpload;
    use App\Traits\Lang;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Session;
    use Illuminate\View\View;
    use Modules\Category\Models\Category;
    use Modules\Language\Models\Language;
    use Modules\Post\Models\Post;
    use Modules\Tag\Models\Tag;

    class PostController extends Controller
    {
        use Lang;

        /**
         * PostController constructor.
         */
        public function __construct()
        {
            $this->middleware('permission:post-list');
            $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:post-delete', ['only' => ['destroy']]);
        }

        use ImageUpload;

        /**
         * @return Factory|View
         */
        public function index()
        {
            $posts = Post::with('category')
                         ->orderBy('id', 'asc')
                         ->with([
                             'language' => function ($query) {
                                 $query->where('languages.code', $this->lang());
                             },
                         ])
                         ->paginate(12);

            return view('post::index', compact('posts'));
        }

        /**
         * @return Factory|View
         */
        public function create()
        {
            $post       = new Post();
            $categories = Category::all();
            $languages  = Language::all();
            $tag        = Tag::all();

            return view('post::create', compact('categories', 'post', 'tag', 'languages'));
        }

        /**
         * @param  Store  $request
         *
         * @return RedirectResponse
         */
        public function store(Store $request): RedirectResponse
        {
            $post = Post::create(
                $request->except('featured_image', 'title', 'description') + [
                    'featured_image' => $this->verifyAndStoreImage($request),
                    'title'          => $request['title'][0],
                ]
            );
            $post->language()->attach($this->pivotData($request));
            $post->tags()->attach($request->tags);
            $post->categories()->attach($request->category);

            Session::flash('success_msg', trans('messages.post_created_success'));

            return redirect()->route('posts.edit', $post);
        }

        /**
         * @param  Post  $post
         *
         * @return Factory|Application|\Illuminate\Contracts\View\View
         */
        public function edit(Post $post)
        {
            $tag        = Tag::all();
            $languages  = Language::all();
            $categories = Category::all();

            return view('post::edit', compact('post', 'categories', 'tag', 'languages'));
        }

        /**
         * @param  Update  $request
         * @param  Post  $post
         *
         * @return RedirectResponse
         */
        public function update(Update $request, Post $post): RedirectResponse
        {
            if ($request->hasFile('featured_image',)) {
                $post->update(
                    $request->except('featured_image', 'title', 'description') + [
                        'featured_image' => $this->verifyAndStoreImage($request),
                        'title'          => $request['title'][0],
                    ]
                );
            } else {
                $post->update($request->except('title', 'description', 'featured_image'));
            }
            $post->language()->sync($this->pivotData($request), true);
            $post->tags()->sync($request->tags, true);
            $post->categories()->sync($request->category, true);

            Session::flash('error_msg', trans('messages.post_not_found'));

            return redirect()->route('posts.edit', $post);
        }

        /**
         * @param  Post  $post
         *
         * @return RedirectResponse
         * @throws Exception
         */
        public function destroy(Post $post): RedirectResponse
        {
            $post->delete();
            Session::flash('success_msg', trans('messages.post_deleted_success'));

            return redirect()->route('posts.index');
        }

        /**
         * @param $request
         *
         * @return array
         */
        public function pivotData($request): array
        {
            $sync_data = [];
            for ($i = 0, $iMax = count($request['title']); $i < $iMax; $i++) {
                $sync_data[$request['title'][$i]] = [
                    'title'       => $request['title'][$i],
                    'description' => $request['description'][$i],
                    'language_id' => $request['language_id'][$i],
                ];
            }

            return $sync_data;
        }

        /**
         * Make paths for storing images.
         *
         * @return object
         */
        public function makePaths(): object
        {
            $original  = public_path().'/uploads/images/posts/';
            $thumbnail = public_path().'/uploads/images/posts/thumbnails/';
            $medium    = public_path().'/uploads/images/posts/medium/';

            return (object)compact('original', 'thumbnail', 'medium');
        }

    }
