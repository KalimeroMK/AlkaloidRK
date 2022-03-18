<?php

    namespace Modules\Tag\Http\Requests;

    use App\Http\Requests\CanAuthorise;
    use Illuminate\Foundation\Http\FormRequest;
    use JetBrains\PhpStorm\ArrayShape;

    class Store extends FormRequest
    {
        use CanAuthorise;

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        #[ArrayShape(['title' => "string"])] public function rules(): array
        {
            return [
                'title' => 'required',
            ];
        }
    }
