<?php

    namespace Modules\User\Http\Requests;

    use App\Http\Requests\CanAuthorise;
    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Validation\Rule;
    use JetBrains\PhpStorm\ArrayShape;

    class Update extends FormRequest
    {
        use CanAuthorise;

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        #[ArrayShape([
            'name'  => "string",
            'email' => "array",
            'roles' => "string",
        ])
        ] public function rules(): array
        {
            return [
                'name'  => 'required|max:255',
                'email' => [
                    'required',
                    Rule::unique('users', 'id')->ignore($this['id']),
                ],
                'roles' => 'required',
            ];
        }
    }
