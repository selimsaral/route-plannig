<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteCalculateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'address.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'address.*.required' => "Tüm Adres Alanlarını Doldurmalısınız!",
        ];
    }
}
