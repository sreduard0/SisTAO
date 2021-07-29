<?php

namespace App\Classes;

use App\Models\LoginApplicationModel;
use App\Models\LoginModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Switch_;

class Tools
{
    //=================[ Buscar dados do usuario ]=========================
    public function user_data($user_id)
    {
        switch ($user_id) {
            case 'all':
                return UserModel::with('login', 'rank', 'departament', 'company', 'city')->get();
                break;

            default:
                return UserModel::with('login', 'rank', 'departament', 'company', 'city')->find($user_id);
                break;
        }
    }
    //====================[Mascara para strings]===========================
    function mask($mask, $str)
    {
        $str = str_replace(" ", "", $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }
        return $mask;
    }
    //========================[ CRUD USER ]================================
    public function crud_user($data, $f)
    {
        switch ($f) {
            case 'create':
                $user_data = new UserModel();
                $user_data->photoUrl = 'img/img_profiles/img_profile_padrao.png';
                $user_data->backgroundUrl = 'img/img_background/bg3.jpg';

                break;

            case 'update':

                $user_data = UserModel::with('rank', 'departament', 'company', 'city')->find($data['id']);
                break;
        }

        $user_data->name = $data['name'];
        $user_data->professionalName = $data['professional_name'];
        $user_data->email = $data['email'];
        $user_data->phone1 = str_replace(['(', ')', '-', ' ', '_'], '', $data['phone1']);
        $user_data->phone2 = str_replace(['(', ')', '-', ' ', '_'], '', $data['phone2']);
        $user_data->born_at = substr($data['born_at'], 6, 4) . "-" . substr($data['born_at'], 3, 2) . "-" . substr($data['born_at'], 0, 2);
        $user_data->motherName = $data['mother_name'];
        $user_data->fatherName = $data['father_name'];
        $user_data->militaryId = $data['military_id'];
        $user_data->idt_mil = str_replace(['.', '-'], '', $data['idt_mil']);
        $user_data->street = $data['street'];
        $user_data->house_number = $data['house_number'];
        $user_data->district = $data['district'];
        $user_data->city_id = $data['city'];
        $user_data->cep = str_replace('-', '', $data['cep']);
        $user_data->departament_id = $data['departament_id'];
        $user_data->rank_id = $data['rank_id'];
        $user_data->company_id = $data['company_id'];
        $user_data->save();

        if (isset($data['login'])) {
            $idt_mil = str_replace(['.', '-'], '', $data['idt_mil']);
            $pass = rand(10000000, 99999999);
            $login = new LoginModel;
            $login->users_id = $user_data->id;
            $login->status = 1;
            $login->login = $idt_mil;
            $login->password = Hash::make($pass);
            $login->save();

            $permission = new LoginApplicationModel();
            $permission->applications_id = 6;
            $permission->profileType = 0;
            $permission->notification = 1;
            $permission->login_id = $user_data->id;
            $permission->save();

            session()->flash('new_login', [
                'login' => $idt_mil,
                'password' => $pass,
            ]);
        }
    }
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
    //=============================[]======================================
}
