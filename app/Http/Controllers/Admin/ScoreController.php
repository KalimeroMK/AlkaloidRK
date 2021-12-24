<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Score\StoreScoreRequest;
    use App\Http\Requests\Score\UpdateScoreRequest;
    use App\Models\Language;
    use App\Models\Score;
    use App\Traits\ImageUpload;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Str;

    class ScoreController extends Controller
    {
        use ImageUpload;

        /**
         * SettingController constructor.
         */
        public function __construct()
        {
            $this->middleware('permission:score-list');
            $this->middleware('permission:score-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:score-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:score-delete', ['only' => ['destroy']]);
        }

        /**
         * Display a listing of the resource.
         *
         * @return Factory|Application|View
         */
        public function index()
        {
            $scores = Score::with([
                'language' => function ($query) {
                    $query->where('languages.code', $this->lang());
                },
            ])
                           ->paginate(12);

            return view('admin.score.index', compact('scores'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|View
         */
        public function create()
        {
            $score     = new Score();
            $languages = Language::all();

            return view('admin.score.create', compact('score', 'languages'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  StoreScoreRequest  $request
         *
         * @return RedirectResponse
         */
        public function store(StoreScoreRequest $request): RedirectResponse
        {
            $image1    = $request->file('team1logo');
            $image2    = $request->file('team2logo');
            $filename1 = Str::random(15).'.'.$image1->getClientOriginalName();
            $filename2 = Str::random(15).'.'.$image2->getClientOriginalName();

            $image1->move($this->makePaths()->original, $filename1);
            $image2->move($this->makePaths()->original, $filename2);

            $score = Score::create($request->except('team1', 'team2', 'team1logo', 'team2logo') + [

                    'team1logo' => $filename1,
                    'team2logo' => $filename2,
                ]
            );

            $score->language()->attach($this->pivotData($request));

            Session::flash('success_msg', trans('messages.scoreCreate'));

            return redirect()->route('scores.edit', $score);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  Score  $score
         *
         * @return Application|Factory|View
         */
        public function edit(Score $score)
        {
            $languages = Language::all();

            return view('admin.score.edit', compact('score', 'languages'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  UpdateScoreRequest  $request
         * @param  Score  $score
         *
         * @return RedirectResponse
         */
        public function update(UpdateScoreRequest $request, Score $score): RedirectResponse
        {
            $image1    = $request->file('team1logo');
            $image2    = $request->file('team2logo');
            $filename1 = Str::random(15).'.'.$image1->getClientOriginalName();
            $filename2 = Str::random(15).'.'.$image2->getClientOriginalName();
            $image1->move($this->makePaths()->original, $filename1);
            $image2->move($this->makePaths()->original, $filename2);

            $score->update($request->except('team1', 'team2', 'team1logo', 'team2logo') + [

                    'team1logo' => $filename1,
                    'team2logo' => $filename2,
                ]
            );
            $score->language()->sync($this->pivotData($request), true);
            Session::flash('success_msg', trans('messages.scoreCreate'));

            return redirect()->route('scores.edit', $score);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  Score  $score
         *
         * @return RedirectResponse
         */
        public function destroy(Score $score): RedirectResponse
        {
            $score->delete();

            return redirect()->back();
        }

        /**
         * @param $request
         *
         * @return array
         */
        public function pivotData($request): array
        {
            $sync_data = [];
            for ($i = 0, $iMax = count($request['team1']); $i < $iMax; $i++) {
                $sync_data[$request['team1'][$i]] = [
                    'team1'       => $request['team1'][$i],
                    'team2'       => $request['team2'][$i],
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
            $original  = public_path().'/uploads/images/score/';
            $thumbnail = public_path().'/uploads/images/score/thumbnails/';
            $medium    = public_path().'/uploads/images/score/medium/';

            return (object) compact('original', 'thumbnail', 'medium');
        }
    }
