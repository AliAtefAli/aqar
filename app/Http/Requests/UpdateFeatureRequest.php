<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeatureRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required',
            'en.name' => 'required',
            'ar.description' => 'required',
            'en.description' => 'required',
            'price' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
