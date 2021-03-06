<?php

    namespace Modules\Gallery\Http\Controllers;

    use App\Modules\Gallery\Requests\Store;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Str;
    use Illuminate\View\View;
    use Modules\Gallery\Models\Gallery;
    use Modules\Post\Models\Post;

    class GalleryController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @param $id
         *
         * @return Application|Factory|View
         */
        public function index($id): Factory|View|Application
        {
            $post    = Post::findOrFail($id);
            $gallery = Gallery::wherePostId($id)->get();

            return view('Modules::Gallery.resources.views.gallery.addGallery', compact('gallery', 'post'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  Store  $request
         *
         * @return RedirectResponse
         */
        public function store(Store $request): RedirectResponse
        {
            $post_id = $request['post_id'];
            if ($request->hasfile('image')) {
                foreach ($request->file('image') as $image) {
                    $name  = Str::random(15).'.'.$image->getClientOriginalExtension();
                    $paths = $this->makePaths();
                    File::makeDirectory($paths->original, $mode = 0755, true, true);
                    $image->move($paths->original, $name);
                    $gallery          = new Gallery();
                    $gallery->image   = $name;
                    $gallery->post_id = $post_id;
                    $gallery->save();
                }
            }

            return redirect()->back();
        }

        /**
         * Make paths for storing images.
         *
         * @return object
         */
        public function makePaths(): object
        {
            $original = public_path().'/uploads/images/gallery/';

            return (object)compact('original');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param $id
         *
         * @return RedirectResponse
         */
        public function destroy($id): RedirectResponse
        {
            $gallery = Gallery::FindOrFail($id);
            $image   = public_path().'/uploads/images/gallery/'.$gallery->image;
            unlink($image);
            $gallery->delete();

            return back();
        }
    }
