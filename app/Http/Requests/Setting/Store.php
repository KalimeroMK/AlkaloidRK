<?php

    namespace App\Http\Requests\Setting;

    use App\Http\Requests\CanAuthorise;
    use Illuminate\Foundation\Http\FormRequest;

    class Store extends FormRequest
    {
        use CanAuthorise;

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules(): array
        {
            return [
                'title.*'        => 'required|string',
                'description.*'  => 'required',
                'address.*'      => 'required|string',
                'featured_image' => 'required|image',
                'mainurl'        => 'required|url',
                'email'          => 'required|email',
                'phone'          => 'required|numeric',
                'twitter'        => 'required|url',
                'facebook'       => 'required|url',
                'skype'          => 'required|string',
                'linkedin'       => 'required|url',
                'flickr'         => 'required|url',
                'pinterest'      => 'required|url',
                'gplus'          => 'required|url',
            ];
        }
    }
