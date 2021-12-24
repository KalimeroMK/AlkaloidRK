<?php

    namespace App\Http\Controllers;

    use Illuminate\Contracts\Routing\ResponseFactory;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Http\Response;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Support\Facades\Session;

    class Controller extends BaseController
    {
        use AuthorizesRequests,
            DispatchesJobs,
            ValidatesRequests;

        /**
         * @return mixed
         */
        public function lang()
        {
            return Session::get('locale');
        }
                
        /**
         * @return ResponseFactory|Response
         */
        public function throw404()
        {
            return response(view('errors.404'));
        }

        /**
         * @return ResponseFactory|Response
         */
        public function show403()
        {
            return response(view('errors.403'));
        }

        /**
         * @return ResponseFactory|Response
         */
        public function show404()
        {
            return response(view('errors.404'));
        }

        /**
         * @return ResponseFactory|Response
         */
        public function show500()
        {
            return response(view('errors.500'));
        }

        /**
         * @return ResponseFactory|Response
         */
        public function show503()
        {
            return response(view('errors.503'));
        }
    }
