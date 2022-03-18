<?php

    namespace Modules\Team\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use JetBrains\PhpStorm\ArrayShape;

    class UpdateTeamRequest extends FormRequest
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
