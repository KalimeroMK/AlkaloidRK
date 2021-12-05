<?php

    namespace App\Http\Requests\Score;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreScoreRequest extends FormRequest
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
                'team1.*'    => 'required|string',
                'team2.*'    => 'required|string',
                'team1goals' => 'required|integer',
                'team2goals' => 'required|integer',
                'team1logo'  => 'required|image',
                'team2logo'  => 'required|image',
                'date'       => 'required|date|after:yesterday',
            ];
        }
    }
