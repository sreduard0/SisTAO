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
                'professionalName' => ['required', 'min:3'],
                'email' => ['required', 'email'],
                'phone1' => ['required', 'min:10', 'max:11'],
                'phone2' => ['required', 'min:10', 'max:11'],
                'born_at' => ['required'],
                'motherName' => ['required', 'min:3'],
                'fatherName' => ['required', 'min:3'],
                'militaryId' => ['required', 'min:3'],
                'cpf' => ['required', 'min:11', 'max:11'],
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
            [];
    }
}
