<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
//==============================={ INDEX }=================================//
    public function index()
    {
        if(session()->has('login'))
        {
           return redirect()->route('control_panel');
        }
        else
        {
            return redirect()->route('login');
        }
    }
//========================{ PAINEL DE CONTROLE }===========================//
    public function control_panel()
    {
        return view('control-panel');
    }
//=============================={ LOGIN }==================================//
    public function login()
    {
        return view('form-login');
    }
//==========================={ LOGIN SUBMIT }==============================//
    public function login_submit(LoginRequest $request){

        //Validação
        $request->validated();

        //Verificar dados de login
        $login = trim($request->input('login'));
        $password = trim($request->input('password'));

        $user = LoginModel::where('login', $login)->with('user_info')->first();

        //Retorna mensagem de erro
        if(!$user){
            session()->flash('erro','Este usuário não existe.');
            return redirect()->route('login');
        }

        // //Verifica se a senha ta correta
        // if(!Hash::check($password, $user->password)){

        //     session()->flash('erro','Senha incorreta.');
        //     return redirect()->route('login');
        // }

        //Buscando informções do Usuário

        //Inicia uma sessao
        session()->put([
            'login'    => $user->login,
            'user'    => $user,

        ]);


        return redirect()->route('index');


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
//================================={  }====================================//

}
