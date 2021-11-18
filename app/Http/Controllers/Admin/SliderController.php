<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Slider\StoreSliderRequest;
    use App\Http\Requests\Slider\UpdateSliderRequest;
    use App\Models\Slider;
    use App\Traits\ImageUpload;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Session;

    class SliderController extends Controller
    {
        use ImageUpload;

        /**
         * Slider constructor
         */
        public function __construct()
        {
            $this->middleware('permission:slider-list');
            $this->middleware('permission:slider-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:slider-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
        }

        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index()
        {
            $sliders = Slider::get();
            return view('admin.slider.index', compact('sliders'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|View
         */
        public function create()
        {
            $slider = new Slider();
            return view('admin.slider.create', compact('slider'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  StoreSliderRequest  $request
         * @return RedirectResponse
         */
        public function store(StoreSliderRequest $request): RedirectResponse
        {
            Slider::create(
                $request->except('featured_image') + [
                    'featured_image' => $this->verifyAndStoreImage($request),
                ]
            );
            return redirect()->route('sliders.index');
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  Slider  $slider
         * @return Application|Factory|View
         */
        public function edit(Slider $slider)
        {
            return view('admin.slider.edit', compact('slider'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  UpdateSliderRequest  $request
         * @param  Slider  $slider
         * @return RedirectResponse
         */
        public function update(UpdateSliderRequest $request, Slider $slider): RedirectResponse
        {
            Slider::create(
                $request->except('featured_image') + [
                    'featured_image' => $this->verifyAndStoreImage($request),
                ]
            );
            return redirect()->back();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  Slider  $slider
         * @return RedirectResponse
         */
        public function destroy(Slider $slider): RedirectResponse
        {
            $slider->delete();
            Session::flash('success_msg', trans('messages.tag_deleted_success'));
            return redirect()->back();
        }

        /**
         * Make paths for storing images.
         *
         * @return object
         */
        public function makePaths(): object
        {
            $original = public_path() . '/uploads/images/slider/';
            $thumbnail = public_path() . '/uploads/images/slider/thumbnails/';
            $medium = public_path() . '/uploads/images/slider/medium/';
            return (object)compact('original', 'thumbnail', 'medium');
        }
    }
