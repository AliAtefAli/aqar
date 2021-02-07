<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlockRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required',
            'en.name' => 'required',
            'city_id' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
