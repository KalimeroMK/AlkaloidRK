<?php

    namespace App\Http\Requests\Slider;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreSliderRequest extends FormRequest
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
                'title'          => 'string',
                'featured_image' => 'image|required',
            ];
        }
    }
