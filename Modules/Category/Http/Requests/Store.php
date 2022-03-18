<?php

    namespace Modules\Category\Http\Requests;

    use App\Http\Requests\CanAuthorise;
    use Illuminate\Foundation\Http\FormRequest;
    use JetBrains\PhpStorm\ArrayShape;

    class Store extends FormRequest
    {
        use CanAuthorise;

        /**
         * @var mixed
         */
        public mixed $title;
        /**
         * @var mixed
         */
        public mixed $parent_id;

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        #[ArrayShape(['title' => "string"]
        )] public function rules(): array
        {
            return [
                'title' => 'required',
            ];
        }
    }
