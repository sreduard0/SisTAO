<?php

namespace App\Http\Controllers;

use App\Classes\Tools;
use App\Http\Controllers\Controller;
use App\Http\Requests\AltPwdRequest;
use App\Http\Requests\EditProfileRequest;
use App\Models\LoginModel;
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
    //======={ SUBMIT ALT PERFIL }======//
    public function submit_alt_profile(EditProfileRequest $request)
    {
        $request->validated();

        $user_data = $this->Tools->user_data(session('user')['id']);


        $user_data->name = $request->input('name');
        $user_data->professionalName = $request->input('professional_name');
        $user_data->email = $request->input('email');
        $user_data->phone1 = str_replace(['(', ')', '-', ' '], '', $request->input('phone1'));
        $user_data->phone2 = str_replace(['(', ')', '-', ' '], '', $request->input('phone2'));
        $user_data->born_at = substr($request->input('born_at'), 6, 4) . "-" . substr($request->input('born_at'), 3, 2) . "-" . substr($request->input('born_at'), 0, 2);
        $user_data->motherName = $request->input('mother_name');
        $user_data->fatherName = $request->input('father_name');
        $user_data->militaryId = $request->input('military_id');
        $user_data->cpf = str_replace(['.', '-'], '', $request->input('cpf'));
        $user_data->street = $request->input('street');
        $user_data->house_number = $request->input('house_number');
        $user_data->district = $request->input('district');
        $user_data->city_id = $request->input('city');
        $user_data->cep = str_replace('-', '', $request->input('cep'));
        $user_data->departament_id = $request->input('departament_id');
        $user_data->rank_id = $request->input('rank_id');
        $user_data->company_id = $request->input('company_id');
        $user_data->save();
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
        $data = $request->img_profile;
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = 'img_profile_user_' . session('user')['login'] . '-' . date('d-m-Y-H-m-s') . '.png';
        $fileDir = 'img/img_profiles/' . session('user')['login'] . '/';

        if (!is_dir($fileDir)) {
            mkdir($fileDir, 0777, true); //444
        }
        file_put_contents($fileDir . $imageName, $data);

        $user_data = $this->Tools->user_data(session('user')['id']);
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
