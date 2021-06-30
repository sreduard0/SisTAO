<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Classes\Tools;
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
    //========================{ PAINEL DE CONTROLE }===========================//
    //======={ HOME }===============//
    public function home()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }
        return view('control-panel.home');
    }
    //==========={ PERFIL }===========//
    public function profile($id = '')
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        if ($id) {
            $data = [
                'user_data' => $this->Tools->user_data($id), //Buscando informações do usuário
            ];
            return view('control-panel.user_profile', $data);
        } else {
            $data = [
                'user_data' => $this->Tools->user_data(session('user')['id']), //Buscando informações do usuário logado
            ];
            return view('control-panel.profile', $data);
        };
    }
    //======={  EDITAR PERFIL }========//
    public function edit_profile($id = '')
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

        if ($id) {
            $data = [
                'all_ranks' => $all_ranks,
                'all_departament' => $all_departament,
                'all_company' => $all_company,
                'all_cities' => $all_cities,
                'user_data' => $this->Tools->user_data($id), //Buscando informações do usuário
            ];
            return view('control-panel.edit_user_profile', $data);
        } else {
            $data = [
                'all_ranks' => $all_ranks,
                'all_departament' => $all_departament,
                'all_company' => $all_company,
                'all_cities' => $all_cities,
                'user_data' => $this->Tools->user_data(session('user')['id']), //Buscando informações do usuário logado
            ];
            return view('control-panel.edit_profile', $data);
        };
    }

    //======={ ALTERAR SENHA }========//
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
    //========================={ LISTA USUÁRIOS }==============================//
    public function users_list()
    {
        $data = [
            'users' => $this->Tools->user_data('all'),
        ];

        return view('control-panel.users_list', $data);
    }
    //==========={ CRIAR USUÁRIO }=============//
    public function create_user()
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

        return view('control-panel.create-profile', $data);
    }
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
