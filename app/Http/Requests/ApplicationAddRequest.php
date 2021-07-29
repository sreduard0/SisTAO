<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationAddRequest extends FormRequest
{
       public function rules()
    {
        return
            [
                'abbreviation_app' => ['required'],
                'full_name' => ['required'],
            ];
    }
    public function messages()
    {
        return
            [
                'abbreviation_app' => 'É nescessário  preencher o campo sigla.',
                'full_name.required' => 'É nescessaário preencher o campo nome.',
            ];
    }
}
