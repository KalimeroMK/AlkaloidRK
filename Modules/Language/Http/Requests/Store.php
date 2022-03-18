<?php

    namespace Modules\Language\Http\Requests;

    use App\Http\Requests\CanAuthorise;
    use Illuminate\Foundation\Http\FormRequest;
    use JetBrains\PhpStorm\ArrayShape;

    class Store extends FormRequest
    {
        use CanAuthorise;

        /**
         * @var mixed
         */
        public mixed $name;
        /**
         * @var mixed
         */
        public mixed $country;

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        #[ArrayShape([
                'name'    => "string",
                'country' => "string",
            ]
        )] public function rules(): array
        {
            return [
                'name'    => 'required|string|max:255|unique:languages',
                'country' => 'required|string|max:255|unique:languages',
            ];
        }
    }
