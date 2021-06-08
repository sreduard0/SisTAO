<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AltPwdRequest extends FormRequest
{

    public function rules()
    {
        return
            [
                'oldPwd' => ['required', 'min:8'],
                'newPwd' => ['required', 'min:8'],
                'confNewPwd' => ['required', 'min:8']
            ];
    }
    public function messages()
    {
        return
            [
                'oldPwd.required' => 'É nescessário inserir sua senha atual.',
                'oldPwd.min' => 'Sua senha atual está incorreta.',
                'newPwd.required' => 'É nescessaário inserir sua nova senha.',
                'newPwd.min' => 'Sua nova senha deverá ser alfanumérica com no mínimo 8 caracteres',
                'confNewPwd.required' => 'É nescessaário confirmar sua nova senha.',
                'confNewPwd.min' => 'Sua nova senha deverá ser alfanumérica com no mínimo 8 caracteres',
            ];
    }
}
