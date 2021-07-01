<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
{
    public function rules()
    {
        return
            [
                'name' => ['required', 'min:3'],
                'professional_name' => ['required'],
                'email' => ['required', 'email'],
                'phone1' => ['required', 'min:15', 'max:16'],
                'phone2' => ['required', 'min:15', 'max:16'],
                'born_at' => ['required'],
                'mother_name' => ['required', 'min:3'],
                'father_name' => ['required', 'min:3'],
                'military_id' => ['required', 'min:3'],
                'idt_mil' => ['required', 'min:10', 'max:14'],
                'street' => ['required'],
                'house_number' => ['required'],
                'district' => ['required'],
                'city' => ['required'],
                'cep' => ['required', 'min:8'],
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
                'name.min' => 'O campo NOME COMPLETO é nescessaário no minimo :min caracteres!',
                'professional_name.required' => 'É nescessaário preencher o campo NOME COMPLETO',
                'email.required' => 'É nescessaário preencher o campo E-MAIL',
                'phone1.required' => 'É nescessaário preencher o campo TELEFONE 1',
                'phone2.required' => 'É nescessaário preencher o campo TELEFONE 2',
                'born_at.required' => 'É nescessaário preencher o campo DATA DE NASCIMENTO',
                'mother_name.required' => 'É nescessaário preencher o campo NOME DA MÃE',
                'father_name.required' => 'É nescessaário preencher o campo NOME CDO PAI',
                'military_id.required' => 'É nescessaário preencher o campo N°',
                'idt_mil.required' => 'É nescessaário preencher o campo IDT Militar',
                'street.required' => 'É nescessaário preencher o campo LOGRADOURO',
                'house_number.required' => 'É nescessaário preencher o campo N° DA CASA',
                'district.required' => 'É nescessaário preencher o campo BAIRRO',
                'city.required' => 'É nescessaário preencher o campo CIDADE',
                'cep.required' => 'É nescessaário preencher o campo CEP',
                'departament_id.required' => 'É nescessaário preencher o campo SEÇ/SET/CL',
                'rank_id.required' => 'É nescessaário preencher o campo NOME COMPLETO',
                'company_id.required' => 'É nescessaário preencher o campo NOME COMPLETO'
            ];
    }
}
