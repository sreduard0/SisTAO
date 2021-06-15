<?php

namespace App\Http\Controllers;

use App\Classes\Tools;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
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
        $erro = session('erro');
        $data = [];
        if (!empty($erro)) {
            $data = [
                'erro' => $erro,
            ];
        }

        //Apresenta o formulario de login
        return view('form-login', $data);
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
        if (!Hash::check($password, $user->password)) {
            session()->flash('erro', 'Usuário ou senha incorreto.');
            return redirect()->route('login');
        }

        //Inicia uma sessao
        session()->put([
            'user' => $user,
            'user_data' => $this->Tools->user_data($user->id)

        ]);


        return redirect()->route('home');
    }
    //================================={  }===========================//
}
