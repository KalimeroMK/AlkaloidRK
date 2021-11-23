<?php

    namespace App\Http\Requests\Team;

    use Illuminate\Foundation\Http\FormRequest;

    class UpdateTeamRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules(): array
        {
            return [
                'name'           => 'required|string',
                'lastname'       => 'required|string',
                'bio'            => 'required|string',
                'position'       => 'required|string',
                'birthday'       => 'required|date_format:d/m/Y',
                'featured_image' => 'image|required',
                'nationality'    => 'required|string',
            ];
        }
    }
