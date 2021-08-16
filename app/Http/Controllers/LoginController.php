<?php

namespace App\Http\Controllers;

use App\Classes\Tools;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\ApplicationsModel;
use App\Models\LoginApplicationModel;
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
    //=============================={ LOGIN/LOGOUT }==================================//
    //======={ VIEW / LOGIN }=============//
    public function login()
    {
        //Verifica se o usuário esta logado
        if (session()->has('user')) {
            return redirect()->route('home');
        }

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
    //======={ LOGOUT }=============//
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }

    //======={ LOGIN SUBMIT }=======//
    public function login_submit(LoginRequest $request)
    {

        //Verifica se o usuário esta logado
        if (session()->has('user')) {
            return redirect()->route('home');
        }

        //Validação
        $request->validated();

        //Verificar dados de login
        $login = trim($request->input('login'));
        $password = trim($request->input('password'));

        $user = LoginModel::with('data')->where('login', $login)->first();
        //Retorna mensagem de erro
        if (!$user) {
            session()->flash('erro', 'Este usuário não existe.');
            return redirect()->route('login');
        }

         if ($user->status == 3) {
            session()->flash('erro', 'Aguarde até que um administrador aceite seu cadastro.');
            return redirect()->route('login');
        }

        // //Verifica se a senha ta correta
        if (!Hash::check($password, $user->password)) {
            session()->flash('erro', 'Usuário ou senha incorreto.');
            return redirect()->route('login');
        }

        session()->flash('id', $user->users_id); //Insere ID na session para ApplicationsModel filtar permissoes
        $login = LoginApplicationModel::where('applications_id', 6)->where('login_id', $user->users_id)->first();; // buscando permissoes do usuario
        if (!$login)
        {
            session()->flash('erro', 'Este usuário não tem permissão para acessar esta aplicação.');
            return redirect()->route('login');
        }

        //Inserindo permissoes na sessionecho $login;
        session()->put([
            'SisTAO' => [
                'profileType' => $login->profileType,
                'notification' => $login->notification,
                'loginID' => $login->login_id,
            ],

            'user' => [
                'id' => $user->data->id,
                'name' => $user->data->name,
                'professionalName' => $user->data->professionalName,
                'email' => $user->data->email,
                'rank' => $user->data->rank->rankAbbreviation,
            ],

            'theme' => $user->theme,

        ]);




        return redirect()->route('home');
    }
    //================================={  }===========================//
}
