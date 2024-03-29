<?php

namespace App\Http\Controllers;

use App\Classes\Tools;
use App\Http\Controllers\Controller;
use App\Http\Requests\AltPwdRequest;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\EditProfileRequest;
use App\Models\ApplicationsModel;
use App\Models\LoginApplicationModel;
use App\Models\LoginModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrudController extends Controller
{
    //###################{Classe Tools}###################//
    private $Tools;
    public function __construct()
    {
        $this->Tools = new Tools();
    }
    //####################################################//
    //======={ SUBMIT CREATE PERFIL }======//
    public function submit_create_user(CreateProfileRequest $request)
    {
        $request->validated();
        $data = $request->all();

        $checkIdtMil = UserModel::where('idt_mil', str_replace(['.', '-'], '', $data['idt_mil']))->first();;
        if (!empty($checkIdtMil)) {
            session()->flash('error', 'Um perfil com essa IDT militar já existe.');
            return back();
        }
        $this->Tools->crud_user($data, 'create');
        session()->flash('success', 'Perfil criado com sucesso.');


        if(session('SisTAO')['profileType'] == 2)
        {
             return redirect()->route('callplan',['company'=> session('user')['company']]);
        }
        return redirect()->route('users_list');
    }
    //======={ SUBMIT ALT PERFIL }======//
    public function submit_alt_profile(EditProfileRequest $request)
    {
        $request->validated();
        $data = $request->all();

        $this->Tools->crud_user($data, 'update');

        session()->flash('success', 'Suas informações foram alteradas com sucesso.');

        return back();
    }
    //========={ DELETE PERFIL }========//
    public function delete_profile($id)
    {
        UserModel::find($id)->delete();
        LoginModel::where('users_id', $id)->forceDelete();
        $loginApp = LoginApplicationModel::where('login_id', $id)->get();
        foreach ($loginApp as $permission){
            $permission->delete();
        }

        session()->flash('success', 'Perfil excluído com sucesso.');
       if(session('SisTAO')['profileType'] == 1){
         return redirect()->route('users_list');
               }else{ return redirect()->route('callplan',['company'=> session('user')['company']]);}
    }
    //========={ RESET PASSWORD }========//
    public function password($f, $id)
    {
        $user = $this->Tools->user_data($id);
        $pass = rand(10000000, 99999999);
        switch ($f) {
            case 'create':
                $login = new LoginModel;
                $login->users_id = $user->id;
                $login->login = $user->idt_mil;
                $login->status = 1;
                $login->password = Hash::make($pass);
                $login->save();

                $permission = new LoginApplicationModel();
                $permission->applications_id = 6;
                $permission->profileType = 0;
                $permission->notification = 1;
                $permission->login_id = $user->id;
                $permission->save();

                break;

            case 'reset':
                $login = LoginModel::where('users_id', $id)->first();
                $login->password = Hash::make($pass);
                $login->save();
                break;
        }
        session()->flash('new_login', [
            'login' => $user->idt_mil,
            'password' => $pass,
        ]);
        return back();
    }
    //========{ SUBMIT ALT SENHA }======//
    public function submit_alt_pwd(AltPwdRequest $request)
    {

        $old_pwd = trim($request->input('oldPwd'));
        $new_pwd = trim($request->input('newPwd'));
        $rep_new_pwd = trim($request->input('confNewPwd'));

        $user = LoginModel::where('users_id', session('user')['id'])->first();

        //Verifica se a senha antiga ta correta
        if (!Hash::check($old_pwd, $user->password)) {
            session()->flash('erro', 'Senha atual incorreta.');
            return back();
        }

        if ($new_pwd == $rep_new_pwd) {
            $user->password = Hash::make($new_pwd);
            $user->save();
            session()->flash('success', 'Sua senha foi alterada com sucesso.');
            return back();
        } else {

            session()->flash('erro', 'Os campos "Nova senha" e "Confirmar senha" devem ser iguais.');
            return back();
        }
    }
    //===================={ UPLOADE IMG PERFIL }========================//
    public function upload_img_profile(Request $request)
    {
        $data = $request->all();
        $image_array_1 = explode(";", $data['img_profile']);
        $image_array_2 = explode(",", $image_array_1[1]);
        $img = base64_decode($image_array_2[1]);
        $imageName = 'img_profile_user_' . $data['user_id'] . '-' . date('d-m-Y-H-m-s') . '.png';
        $fileDir = 'img/img_profiles/' . $data['user_id'] . '/';

        if (!is_dir($fileDir)) {
            mkdir($fileDir, 0777, true); //444
        }
        file_put_contents($fileDir . $imageName, $img);

        $user_data = $this->Tools->user_data($data['user_id']);
        $user_data->photoUrl = $fileDir . $imageName;
        $user_data->save();

        return $fileDir . $imageName;
    }
    //============{ SUBMIT Alteração de imagem do background }=============//
    public function alt_img_bg(Request $request)
    {
        $bg = $request->img_selected;
        $user_data = $this->Tools->user_data(session('user')['id']);
        $user_data->backgroundUrl = $bg;
        $user_data->save();

        return true;
    }
    //============{ Alteração de permissaão de apps }=============//
    public function alt_permissions(Request $request)
    {
        // (`applications_id`, `profileType`, `notification`, `login_id`) VALUES ('2', '1', '1', '6')
        $permissions = $request->all();
        foreach ($permissions as $permission) {
            $loginApp = LoginApplicationModel::where('login_id', $permission['userID'])->where('applications_id', $permission['appID'])->first();
            if (isset($permission['check']) && isset($permission['permission'])) {
                if (empty($loginApp)) {
                    $loginApp = new LoginApplicationModel();
                    $loginApp->applications_id = $permission['appID'];
                    $loginApp->profileType = $permission['permission'];
                    $loginApp->notification = 1;
                    $loginApp->login_id = $permission['userID'];
                    $loginApp->save();
                } else {
                    $loginApp->applications_id = $permission['appID'];
                    $loginApp->profileType = $permission['permission'];
                    $loginApp->notification = 1;
                    $loginApp->login_id = $permission['userID'];
                    $loginApp->save();
                }
            } else {
                $loginApp = LoginApplicationModel::where('login_id', $permission['userID'])->where('applications_id', $permission['appID'])->first();
                if (isset($loginApp) && !isset($permission['check'])) {
                    $loginApp->delete();
                }
            }
        }
    }
    //============{ Solicitação de login }=============//
    public function request_login(Request $request)
    {
        $data = $request->all();

        $checkLogin = LoginModel::where('login', str_replace(['.', '-'], '', $data['data']['idt_mil']))->first();
        if (!empty($checkLogin)) {
            session()->flash('erro', 'Um perfil com essa IDT militar já existe.');
            return false;
        }

        if($data['data']['conf_password'] != $data['data']['password'])
        {
            session()->flash('erro', 'As senhas não coincidem.');
            return false;
        }

        $idt_mil = str_replace(['.', '-'], '', $data['data']['idt_mil']);

        $checkUser = UserModel::withTrashed()->where('idt_mil', str_replace(['.', '-'], '', $data['data']['idt_mil']))->first();
        if (empty($checkUser)) {
            // Criando dados do usuario
            $user_data = new UserModel();
            $user_data->photoUrl = 'img/img_profiles/img_profile_padrao.png';
            $user_data->backgroundUrl = 'img/img_background/bg3.jpg';
            $user_data->name = $data['data']['name'];
            $user_data->professionalName = $data['data']['professional_name'];
            $user_data->email = $data['data']['email'];
            $user_data->idt_mil = $idt_mil;
            $user_data->departament_id = $data['data']['departament_id'];
            $user_data->rank_id = $data['data']['rank_id'];
            $user_data->company_id = $data['data']['company_id'];
            $user_data->deleted_at = date('d-m-Y');
            $user_data->save();

            $userID = $user_data->id;
        }else{
            $userID = $checkUser->id;
        }

        // Criando login
        $pass = $data['data']['password'];
        $login = new LoginModel;
        $login->users_id = $userID;
        $login->status = 3;
        $login->login = $idt_mil;
        $login->password = Hash::make($pass);
        $login->save();

        //tornando sistao acessivel caso não tenha escolhido permissao
        if($data['permission'][6]['check'] == null)
        {
        $permission = new LoginApplicationModel();
        $permission->applications_id = 6;
        $permission->profileType = 0;
        $permission->notification = 1;
        $permission->login_id = $userID;
        $permission->save();
        }

        // Adicionando permissoes
        foreach ($data['permission'] as $permission) {
            $loginApp = LoginApplicationModel::where('login_id', $userID)->where('applications_id', $permission['appID'])->first();
            if (isset($permission['check']) && isset($permission['permission'])) {
                if (empty($loginApp)) {
                    $loginApp = new LoginApplicationModel();
                    $loginApp->applications_id = $permission['appID'];
                    $loginApp->profileType = $permission['permission'];
                    $loginApp->notification = 1;
                    $loginApp->login_id = $userID;
                    $loginApp->save();
                }
            }
        }

        session()->flash('erro', 'Pronto! Só aguardar um administrador aceitar sua solicitação.');
    }
    //============{ Ações de aceitar e recusar solicitação }=============//
    public function confirm_request(Request $request)
    {
         $permissions = $request->all();
        foreach ($permissions as $permission) {
            $loginApp = LoginApplicationModel::where('login_id', $permission['userID'])->where('applications_id', $permission['appID'])->first();
            if (isset($permission['check']) && isset($permission['permission'])) {
                if (empty($loginApp)) {
                    $loginApp = new LoginApplicationModel();
                    $loginApp->applications_id = $permission['appID'];
                    $loginApp->profileType = $permission['permission'];
                    $loginApp->notification = 1;
                    $loginApp->login_id = $permission['userID'];
                    $loginApp->save();
                } else {
                    $loginApp->applications_id = $permission['appID'];
                    $loginApp->profileType = $permission['permission'];
                    $loginApp->notification = 1;
                    $loginApp->login_id = $permission['userID'];
                    $loginApp->save();
                }
            } else {
                $loginApp = LoginApplicationModel::where('login_id', $permission['userID'])->where('applications_id', $permission['appID'])->first();
                if (isset($loginApp) && !isset($permission['check'])) {
                    $loginApp->delete();
                }
            }
        }


        $user = UserModel::withTrashed()->find($permission['userID']);
        $user->deleted_at = null;
        $user->save();

        $login = LoginModel::where('users_id', $permission['userID'])->first();
        $login->status = 1;
        $login->save();
    }
    //============{ Deletar requisição }=============//
    public function delete_request($id)
    {
        LoginModel::where('users_id', $id)->first()->forceDelete();
        $loginApp = LoginApplicationModel::where('login_id', $id)->get();
        foreach ($loginApp as $permission){
            $permission->delete();
        }

        $data = UserModel::onlyTrashed()->find($id);
        if ($data)
        {
            $data->forceDelete();
        }
    }
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//

}
