<?php

    namespace App\Http\Requests;

    trait CanAuthorise
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize(): bool
    
        {
            return true;
        }
    }
