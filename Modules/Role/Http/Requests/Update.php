<?php

namespace App\Modules\Role\Requests;

use App\Http\Requests\CanAuthorise;
use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    use CanAuthorise;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    : array
    {
        return [
            'name' => 'required',
            'permission' => 'required'
        ];
    }
}
