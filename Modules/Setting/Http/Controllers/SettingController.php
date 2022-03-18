<?php

    namespace Modules\Setting\Http\Controllers;

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
    use Modules\Language\Models\Language;
    use Modules\Setting\Models\Setting;

    class SettingController extends Controller
    {
        use ImageUpload;
        use Lang;

        /**
         * SettingController constructor.
         */
        public function __construct()
        {
            $this->middleware('permission:settings-list');
            $this->middleware('permission:settings-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:settings-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:settings-delete', ['only' => ['destroy']]);
        }

        /**
         * @return Factory|View
         */
        public function index()
        {
            $languages = Language::all();
            $setting   = Setting::with([
                'language' => function ($query) {
                    $query->where('languages.code', $this->lang());
                },
            ])
                                ->first();
            if (is_null($setting)) {
                $setting = new Setting();

                return view('setting::create', compact('setting', 'languages'));
            }

            return view('setting::index', compact('setting', 'languages'));
        }

        /**
         * @return Factory|View
         */
        public function create()
        {
            $setting   = new Setting();
            $languages = Language::all();

            return view('setting::create', compact('setting', 'languages'));
        }

        /**
         * @param  Store  $request
         *
         * @return string
         */
        public function store(Store $request): string
        {
            $setting = Setting::create(
                $request->except('featured_image', 'title', 'description', 'address') + [
                    'featured_image' => $this->verifyAndStoreImage($request),
                ]
            );
            $setting->language()->attach($this->pivotData($request));

            Session::flash('success_msg', trans('messages.settings_updated_success'));

            return redirect()->route('settings.edit', $setting);
        }

        /**
         * @param  Setting  $setting
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View
         */
        public function edit(Setting $setting)
        {
            $languages = Language::all();

            return view('setting::edit', compact('setting', 'languages'));
        }

        /**
         * @param  Update  $request
         * @param  Setting  $setting
         *
         * @return RedirectResponse
         */
        public function update(Update $request, Setting $setting): RedirectResponse
        {
            if ($request->hasFile('featured_image',)) {
                $setting->update(
                    $request->except('featured_image', 'title', 'description') + [
                        'featured_image' => $this->verifyAndStoreImage($request),
                    ]
                );
            } else {
                $setting->update($request->except('title', 'description', 'featured_image'));
            }

            $setting->language()->sync($this->pivotData($request), true);

            Session::flash('success_msg', trans('messages.settings_updated_success'));

            return redirect()->route('settings.edit', $setting);
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
                    'address'     => $request['address'][$i],
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
            $original  = public_path().'/uploads/images/logo/';
            $thumbnail = public_path().'/uploads/images/logo/thumbnails/';
            $medium    = public_path().'/uploads/images/logo/medium/';

            return (object)compact('original', 'thumbnail', 'medium');
        }
    }
