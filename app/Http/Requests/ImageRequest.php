<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{

    public function rules()
    {
        return [
            'img_profile' => ['required']
        ];
    }

    public function messages()
    {
        return [];
    }
}
