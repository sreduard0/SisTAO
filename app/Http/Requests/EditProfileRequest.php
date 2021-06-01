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
                'professional_name' => ['required', 'min:3'],
                'email' => ['required', 'email'],
                'phone1' => ['required', 'min:15', 'max:16'],
                'phone2' => ['required', 'min:15', 'max:16'],
                'born_at' => ['required'],
                'mother_name' => ['required', 'min:3'],
                'father_name' => ['required', 'min:3'],
                'military_id' => ['required', 'min:3'],
                'cpf' => ['required', 'min:14', 'max:14'],
                'street' => ['required'],
                'house_number' => ['required'],
                'district' => ['required'],
                'city' => ['required'],
                'cep' => ['required'],
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
                'professional_name' => 'É nescessaário preencher o campo NOME COMPLETO',
                'email' => 'É nescessaário preencher o campo E-MAIL',
                'phone1' => 'É nescessaário preencher o campo TELEFONE 1',
                'phone2' => 'É nescessaário preencher o campo TELEFONE 2',
                'born_at' => 'É nescessaário preencher o campo DATA DE NASCIMENTO',
                'mother_name' => 'É nescessaário preencher o campo NOME DA MÃE',
                'father_name' => 'É nescessaário preencher o campo NOME CDO PAI',
                'military_id' => 'É nescessaário preencher o campo N°',
                'cpf' => 'É nescessaário preencher o campo CPF',
                'street' => 'É nescessaário preencher o campo LOGRADOURO',
                'house_number' => 'É nescessaário preencher o campo N° DA CASA',
                'district' => 'É nescessaário preencher o campo BAIRRO',
                'city' => 'É nescessaário preencher o campo CIDADE',
                'cep' => 'É nescessaário preencher o campo CEP',
                'departament_id' => 'É nescessaário preencher o campo SEÇ/SET/CL',
                'rank_id' => 'É nescessaário preencher o campo NOME COMPLETO',
                'company_id' => 'É nescessaário preencher o campo NOME COMPLETO'
            ];
    }
}
