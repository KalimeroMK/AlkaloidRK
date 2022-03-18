<?php

    namespace Modules\Team\Http\Controllers;

    use App\Traits\ImageUpload;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Session;
    use Illuminate\View\View;
    use Modules\Language\Models\Language;
    use Modules\Team\Http\Requests\StoreTeamRequest;
    use Modules\Team\Http\Requests\UpdateTeamRequest;
    use Modules\Team\Models\Team;

    class TeamController extends Controller
    {
        /**
         * PostController constructor.
         */
        public function __construct()
        {
            $this->middleware('permission:team-list');
            $this->middleware('permission:team-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:team-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:team-delete', ['only' => ['destroy']]);
        }

        use ImageUpload;

        /**
         * @return Factory|View
         */
        public function index()
        {
            $teams = Team::with([
                'language' => function ($query) {
                    $query->where('languages.code', $this->lang());
                },
            ])
                         ->paginate(12);

            return view('team::index', compact('teams'));
        }

        /**
         * @return Factory|View
         */
        public function create()
        {
            $team      = new Team();
            $languages = Language::all();

            return view('team::create', compact('team', 'languages'));
        }

        /**
         * @param  StoreTeamRequest  $request
         *
         * @return RedirectResponse
         */
        public function store(StoreTeamRequest $request): RedirectResponse
        {
            $team = Team::create(
                $request->except('featured_image', 'name', 'lastname', 'bio', 'position', 'nationality') + [
                    'slug'           => $request['lastname'][0],
                    'featured_image' => $this->verifyAndStoreImage($request),
                ]
            );
            $team->language()->attach($this->pivotData($request));

            Session::flash('success_msg', trans('messages.post_created_success'));

            return redirect()->route('teams.edit', $team);
        }

        /**Ï
         *
         * @param  Team  $team
         *
         * @return Factory|Application|\Illuminate\Contracts\View\View
         */
        public function edit(Team $team)
        {
            $languages = Language::all();

            return view('team::edit', compact('team', 'languages'));
        }

        /**
         * @param  UpdateTeamRequest  $request
         * @param  Team  $team
         *
         * @return RedirectResponse
         */
        public function update(UpdateTeamRequest $request, Team $team): RedirectResponse
        {
            if ($request->hasFile('featured_image',)) {
                $team->update(
                    $request->except('featured_image', 'name', 'lastname', 'bio', 'position', 'nationality') + [
                        'featured_image' => $this->verifyAndStoreImage($request),
                        'slug'           => $request['lastname'][0],
                    ]
                );
            } else {
                $team->update($request->except('featured_image', 'name', 'lastname', 'bio', 'position', 'nationality'));
            }
            $team->language()->sync($this->pivotData($request), true);

            Session::flash('error_msg', trans('messages.post_not_found'));

            return redirect()->route('teams.edit', $team);
        }

        /**
         * @param  Team  $team
         *
         * @return RedirectResponse
         */
        public function destroy(Team $team): RedirectResponse
        {
            $team->delete();
            Session::flash('success_msg', trans('messages.post_deleted_success'));

            return redirect()->route('teams.index');
        }

        /**
         * @param $request
         *
         * @return array
         */
        public function pivotData($request): array
        {
            $sync_data = [];
            for ($i = 0, $iMax = count($request['name']); $i < $iMax; $i++) {
                $sync_data[$request['name'][$i]] = [
                    'name'        => $request['name'][$i],
                    'lastname'    => $request['lastname'][$i],
                    'nationality' => $request['nationality'][$i],
                    'position'    => $request['position'][$i],
                    'bio'         => $request['bio'][$i],
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
            $original  = public_path().'/uploads/images/teams/';
            $thumbnail = public_path().'/uploads/images/teams/thumbnails/';
            $medium    = public_path().'/uploads/images/teams/medium/';

            return (object)compact('original', 'thumbnail', 'medium');
        }

    }
