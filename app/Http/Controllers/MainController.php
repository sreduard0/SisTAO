<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Classes\Tools;
use App\Models\CitiesModel;
use App\Models\CompanyModel;
use App\Models\DepartamentModel;
use App\Models\RanksModel;

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
