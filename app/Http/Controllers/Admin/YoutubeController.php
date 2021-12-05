<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Youtube\StoreYoutubeRequest;
    use App\Http\Requests\Youtube\UpdateYoutubeRequest;
    use App\Models\Youtube;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Session;

    class YoutubeController extends Controller
    {

        public function __construct()
        {
            $this->middleware('permission:youtube-list');
            $this->middleware('permission:youtube-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:youtube-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:youtube-delete', ['only' => ['destroy']]);
        }

        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index()
        {
            $youtubes = Youtube::get();

            return view('admin.youtube.index', compact('youtubes'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|View
         */
        public function create()
        {
            $youtube = new Youtube();

            return view('admin.youtube.create', compact('youtube'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  StoreYoutubeRequest  $request
         *
         * @return RedirectResponse
         */
        public function store(StoreYoutubeRequest $request): RedirectResponse
        {
            $youtube = Youtube::create($request->all());
            Session::flash('success_msg', trans('messages.post_created_success'));

            return redirect()->route('youtube.edit', $youtube);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  Youtube  $youtube
         *
         * @return Application|Factory|View
         */
        public function edit(Youtube $youtube)
        {
            return view('admin.youtube.edit', compact('youtube'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  UpdateYoutubeRequest  $request
         * @param  Youtube  $youtube
         *
         * @return RedirectResponse
         */
        public function update(UpdateYoutubeRequest $request, Youtube $youtube): RedirectResponse
        {
            $youtube->update($request->all());

            return redirect()->route('youtube.edit', $youtube);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  Youtube  $youtube
         *
         * @return RedirectResponse
         */
        public function destroy(Youtube $youtube): RedirectResponse
        {
            $youtube->delete();

            return redirect()->back();
        }
    }
