<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

//====================================================
public function rules()
{
    return
    [
        'login' => ['required','min:6','max:50'],
        'password' => ['required','min:6'],
    ];
}

//====================================================
public function messages(){
    return
    [
        'login.required' => 'Por favor, digite seu usuário!',
        'login.min' => 'São no minimo :min caracteres!',
        'login.max' => 'São no maximo 50 caracteres!',
        'password.required' => 'Por favor, digite a senha!',
        'password.min' => 'A senha deve conter no minimo :min caracteres!',
    ];
}
//====================================================

}
