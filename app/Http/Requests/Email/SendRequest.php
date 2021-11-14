<?php

    namespace App\Http\Requests\Email;

    use Illuminate\Foundation\Http\FormRequest;

    class SendRequest extends FormRequest
    {
        public function rules(): array
        {
            return [
                'name'   =>'required',
                'email'  =>'required|email',
                'message'=>'required',
            ];
        }

        public function authorize(): bool
        {
            return true;
        }
    }