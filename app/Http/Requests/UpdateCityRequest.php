<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required',
            'en.name' => 'required',
            'governorate_id' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
