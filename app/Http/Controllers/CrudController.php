<?php

namespace App\Http\Controllers;

use App\Classes\Tools;
use App\Http\Controllers\Controller;
use App\Http\Requests\AltPwdRequest;
use App\Http\Requests\EditProfileRequest;
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
    public function submit_create_user(EditProfileRequest $request)
    {
        $request->validated();
        $data = $request->all();

        $this->Tools->crud_user($data, 'create');

        session()->flash('success', 'Perfil criado com sucesso.');

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
    //======={ SUBMIT ALT SENHA }======//
    public function submit_alt_pwd(AltPwdRequest $request)
    {

        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $user_id = session('user')['id'];
        $old_pwd = trim($request->input('oldPwd'));
        $new_pwd = trim($request->input('newPwd'));
        $rep_new_pwd = trim($request->input('confNewPwd'));

        $user = LoginModel::where('id', $user_id)->first();


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
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//
    //============{  }=============//

}
