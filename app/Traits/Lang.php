<?php

    namespace App\Traits;

    use Illuminate\Support\Facades\Session;

    trait Lang
    {
        /**
         * @return mixed
         */
        public function lang(): mixed
        {
            return Session::get('locale');
        }
    }