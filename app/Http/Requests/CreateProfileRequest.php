<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
{
    public function rules()
    {
        return
            [
                'name' => ['required'],
                'professional_name' => ['required'],
                'idt_mil' => ['required', 'min:11', 'max:11'],
                'departament_id' => ['required'],
                'rank_id' => ['required'],
                'company_id' => ['required']
            ];
    }

    public function messages()
    {
        return
            [
                'name.required' => 'É nescessaário preencher o campo NOME COMPLETO',
                'professional_name.required' => 'É nescessaário preencher o campo NOME DE GUERRA',
                'idt_mil.required' => 'É nescessaário preencher o campo IDT Militar',
                'departament_id.required' => 'É nescessaário preencher o campo SEÇ/SET/CL',
                'rank_id.required' => 'É nescessaário preencher o campo P/G',
                'company_id.required' => 'É nescessaário preencher o campo CIA'
            ];
    }
}
