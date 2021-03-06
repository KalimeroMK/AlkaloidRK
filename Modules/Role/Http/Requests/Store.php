<?php

    namespace Modules\Role\Http\Requests;

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
                'name'       => 'required|unique:roles,name',
                'permission' => 'required',
            ];
        }
    }
