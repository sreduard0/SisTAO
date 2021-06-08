<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Classes\Tools;
use App\Http\Requests\AltPwdRequest;
use App\Http\Requests\EditProfileRequest;
use App\Models\CitiesModel;
use App\Models\CompanyModel;
use App\Models\DepartamentModel;
use App\Models\RanksModel;
use App\Models\UserModel;

class MainController extends Controller
{
    //###################{Classe Tools}###################//
    private $Tools;
    public function __construct()
    {
        $this->Tools = new Tools();
    }
    //####################################################//
    //==============================={ INDEX }=================================//
    public function index()
    {
        if (session()->has('user')) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }
    //=============================={ LOGIN/LOGOUT }==================================//
    //======={ VIEW / LOGIN }=============//
    public function login()
    {
        return view('form-login');
    }
    //======={ AÇÃO / LOGOUT }=============//
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }

    //======={ AÇÃO / LOGIN SUBMIT }=======//
    public function login_submit(LoginRequest $request)
    {

        //Validação
        $request->validated();

        //Verificar dados de login
        $login = trim($request->input('login'));
        $password = trim($request->input('password'));

        $user = LoginModel::where('login', $login)->first();

        //Retorna mensagem de erro
        if (!$user) {
            session()->flash('erro', 'Este usuário não existe.');
            return redirect()->route('login');
        }

        // //Verifica se a senha ta correta
        // if(!Hash::check($password, $user->password)){

        //     session()->flash('erro','Senha incorreta.');
        //     return redirect()->route('login');
        // }

        //Inicia uma sessao
        session()->put([
            'user' => $user,
            'user_data' => $this->Tools->user_data($user->id)

        ]);


        return redirect()->route('home');
    }

    //========================{ PAINEL DE CONTROLE }===========================//
    //======={ VIEW / HOME }===============//
    public function home()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $user_data = $this->Tools->user_data(session('user')['id']);
        $data = [
            'user_data' => $user_data,
        ];

        return view('control-panel.home', $data);
    }
    //==========={ VIEW / PERFIL }===========//
    public function profile()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        //Buscando companias
        $all_company = CompanyModel::all();
        //Buscando toda tabela hierárquica
        $all_ranks = RanksModel::all();
        //Buscando informações do usuário
        $user_data = $this->Tools->user_data(session('user')['id']);

        $data = [
            'user_data' => $user_data,
            'all_ranks' => $all_ranks,
            'all_company' => $all_company,

        ];
        return view('control-panel.profile', $data);
    }
    //======={ VIEW / EDITAR PERFIL }========//
    public function edit_profile()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        //Buscando todas cidades
        $all_cities = CitiesModel::all();
        //Buscando toda tabela hierárquica
        $all_ranks = RanksModel::all();
        //Buscando companias
        $all_company = CompanyModel::all();
        //Buscando companias
        $all_departament = DepartamentModel::all();
        //Buscando informações do usuário
        $user_data = $this->Tools->user_data(session('user')['id']);


        $data = [
            'user_data' => $user_data,
            'all_ranks' => $all_ranks,
            'all_departament' => $all_departament,
            'all_company' => $all_company,
            'all_cities' => $all_cities
        ];

        return view('control-panel.edit_profile', $data);
    }

    //======={ VIEW / ALTERAR SENHA }========//
    public function alt_password()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $user_data = $this->Tools->user_data(session('user')['id']);


        $data = [
            'user_data' => $user_data,
        ];

        return view('control-panel.alt_password', $data);
    }




    //======={ AÇÃO / SUBMIT ALT PERFIL }======//
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

        return back();
    }

    //======={ AÇÃO / SUBMIT ALT SENHA }======//
    public function submit_alt_pwd(AltPwdRequest $request)
    {

        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $user_id = session('user_id');
        $old_pwd = trim($request->input('oldPwd'));
        $new_pwd = trim($request->input('newPwd'));
        $rep_new_pwd = trim($request->input('confNewPwd'));

        $user = UserModel::where('id', $user_id)->first();


        //Verifica se a senha antiga ta correta
        if (!Hash::check($old_pwd, $user->password)) {
            session()->flash('erro', 'Senha atual incorreta.');

            if (session('profile') == 1) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('panel');
            }
        }

        if ($new_pwd == $rep_new_pwd) {

            $user = User::find($user_id);
            $user->password = Hash::make($new_pwd);
            $user->save();
            session()->flash('erro', 'Sua senha foi alterada com sucesso.');
            if (session('profile') == 1) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('panel');
            }
        } else {
            session()->flash('erro', 'Os campos "Nova senha" e "Confirmar senha" devem ser iguais.');
            if (session('profile') == 1) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('panel');
            }
        }
    }

    //================================={  }====================================//
    //================================={  }====================================//
    //================================={  }====================================//
    //================================={  }====================================//
    //================================={  }====================================//
    //================================={  }====================================//
    //================================={  }====================================//
    //================================={  }====================================//
    //================================={  }====================================//
    //================================={  }====================================//
    //=========================================================================//

}
