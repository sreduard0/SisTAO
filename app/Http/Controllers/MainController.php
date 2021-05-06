<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Classes\Tools;
use App\Models\CompanyModel;
use App\Models\RanksModel;
use App\Models\UserModel;

class MainController extends Controller
{
    //============================{Classe Tools}===============================//
    private $Tools;
    public function __construct()
    {
        $this->Tools = new Tools();
    }
    //==============================={ INDEX }=================================//
    public function index()
    {
        if (session()->has('user')) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }
    //========================{ PAINEL DE CONTROLE }===========================//
    //======={ home }===============//
    public function home()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $data = [
            'rank' => session('user_data')['rank']['rankAbbreviation'],
            'professionalname' => session('user_data')['name']
        ];

        return view('control-panel.home', $data);
    }
    //======={ Editar Perfil }=============//
    public function edit_profile()
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

        return view('control-panel.edit_profile', $data);
    }
    //=============================={ LOGIN/LOGOUT }==================================//
    //======={ LOGOUT }=============//
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
