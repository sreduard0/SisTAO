<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Classes\Tools;
use App\Http\Requests\EditProfileRequest;
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
    //======={ LOGIN }=============//
    public function login()
    {
        return view('form-login');
    }
    //======={ LOGIN SUBMIT }=======//
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
    //======={ LOGOUT }=============//
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
    //========================{ PAINEL DE CONTROLE }===========================//
    //======={ home }===============//
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
    //==========={ Perfil }===========//
    public function profile()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        //Buscando toda tabela hierárquica
        $all_ranks = RanksModel::all();
        //Buscando informações do usuário
        $user_data = $this->Tools->user_data(session('user')['id']);
        //Buscando companias
        $all_company = CompanyModel::all();

        $data = [
            'user_data' => $user_data,
            'all_ranks' => $all_ranks,
            'all_company' => $all_company
        ];
        return view('control-panel.profile', $data);
    }
    //======={ Editar Perfil }========//
    public function edit_profile()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

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
            'all_company' => $all_company
        ];

        return view('control-panel.edit_profile', $data);
    }
    //======={ submit_profile }======//
    public function submit_profile(EditProfileRequest $request)
    {
        $request->validated();

        $info_user = [
            'name' => $request->input('name'),
            'professionalName' => $request->input('professionel_name'),
            'email' => $request->input('email'),
            'phone1' => str_replace(['(', ')', '-', ' '], '', $request->input('phone1')),
            'phone2' => str_replace(['(', ')', '-', ' '], '', $request->input('phone2')),
            'born_at' => $request->input('born_at'),
            'motherName' => $request->input('mother_name'),
            'fatherName' => $request->input('father_name'),
            'militaryId' => $request->input('military_id'),
            'cpf' => str_replace(['.', '-'], '', $request->input('cpf')),
            'street' => $request->input('street'),
            'house_number' => $request->input('house_number'),
            'district' => $request->input('district'),
            'city' => $request->input('city'),
            'cep' => str_replace('-', '', $request->input('cep')),
            'departament_id' => $request->input('departament_id'),
            'rank_id' => $request->input('rank_id'),
            'company_id' => $request->input('company_id')
        ];


        print_r($info_user);
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
