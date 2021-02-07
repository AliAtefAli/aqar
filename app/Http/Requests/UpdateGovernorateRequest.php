<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGovernorateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required',
            'en.name' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
