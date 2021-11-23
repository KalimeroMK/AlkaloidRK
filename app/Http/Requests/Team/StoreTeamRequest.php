<?php

    namespace App\Http\Requests\Team;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreTeamRequest extends FormRequest
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

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules(): array
        {
            return [
                'name'           => 'required',
                'lastname'       => 'required',
                'bio'            => 'required',
                'position'       => 'required',
                'birthday'       => 'required|date',
                'featured_image' => 'image|required',
                'nationality'    => 'required',
            ];
        }
    }
