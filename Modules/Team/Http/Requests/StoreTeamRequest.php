<?php

    namespace Modules\Team\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use JetBrains\PhpStorm\ArrayShape;

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
        #[ArrayShape([
            'name'           => "string",
            'lastname'       => "string",
            'bio'            => "string",
            'position'       => "string",
            'birthday'       => "string",
            'featured_image' => "string",
            'nationality'    => "string",
        ])] public function rules(): array
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
