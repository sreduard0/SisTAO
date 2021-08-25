<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Classes\Tools;
use App\Models\ApplicationsModel;
use App\Models\CitiesModel;
use App\Models\CompanyModel;
use App\Models\DepartamentModel;
use App\Models\LoginApplicationModel;
use App\Models\LoginModel;
use App\Models\RanksModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class ViewController extends Controller
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
        $data = [
            'apps' => LoginApplicationModel::with('apps')->where('login_id', session('user')['id'])->get(),
        ];
        return view('control-panel.home', $data);
    }
    //==========={ PERFIL }===========//
    public function profile($id = '')
    {
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
        //Buscando todas cidades
        $all_cities = CitiesModel::all();
        //Buscando toda tabela hierárquica
        $all_ranks = RanksModel::all();
        //Buscando companias
        $all_company = CompanyModel::all();
        //Buscando companias
        $all_departament = DepartamentModel::all();

        if ($id) {

            session()->flash('id', $id);
            $data = [
                'apps' => ApplicationsModel::with('profiles')->get(),
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
                'apps' => LoginApplicationModel::with('app')->where('login_id', session('user')['id'])->get(),
            ];
            return view('control-panel.edit_profile', $data);
        };
    }
    //======={ ALTERAR SENHA }========//
    public function alt_password()
    {

        $data = [
            'user_data' => $this->Tools->user_data(session('user')['id']),
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
        //Buscando todas cidades
        $all_cities = CitiesModel::all();
        //Buscando toda tabela hierárquica
        $all_ranks = RanksModel::all();
        //Buscando companias
        $all_company = CompanyModel::all();
        //Buscando companias
        $all_departament = DepartamentModel::all();



        $data = [
            'all_ranks' => $all_ranks,
            'all_departament' => $all_departament,
            'all_company' => $all_company,
            'all_cities' => $all_cities
        ];

        return view('control-panel.create-profile', $data);
    }
    //================================={ CADASTRO }====================================//
    public function register()
    {
        // Verifica se o usuário esta logado
        if (session()->has('user')) {
            return redirect()->route('home');
        }
        $data = [
            'erro' => session('erro'),
            'apps' => ApplicationsModel::all(),
            'all_ranks' => RanksModel::all(),
            'all_departament' => DepartamentModel::all(),
            'all_company' => CompanyModel::all(),
            'all_cities' => CitiesModel::all(),
        ];
        return view('register', $data);
    }
    //====AÇÕES NA VIEW
    //================================={ Salvar alteraçao de tema }====================================//
    public function theme($sts)
    {
        $user = LoginModel::where('users_id',session('user')['id'])->first();

        switch ($sts) {
            case '1':
                $user->theme = 1;
                $user->save();
                session(['theme' => 1]);
                break;

            default:
                $user->theme = 0;
                $user->save();
                session(['theme' => 0]);
                break;
        }

    }
    //================================={ Lista de aplicativos }====================================//
    public function app_list()
    {
        return view('control-panel.app_list');
    }
    //================================{ lista registe }====================================//
    public function register_list()
    {
        $data = [
              'apps' => ApplicationsModel::all(),
        ];
        return view('control-panel.register-list',$data);
    }
      //============{ Registers }=============//
    public function get_register(Request $request)
    {
       //Receber a requisão da pesquisa
       $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0=> 'id',
            1=> 'id',
            2 =>'login',
            3 => 'login',
            4 => 'created_at',
            5 => 'created_at',
            6=> 'created_at',
            7=> 'created_at',
        );

       //Obtendo registros de número total sem qualquer pesquisa
       $rows = count(LoginModel::where('status', 3)->get());

       //Se há pesquisa ou não
        if( $requestData['search']['value'] )
        {
           $requests = LoginModel::with('data')->orWhere('login', 'LIKE', '%'.$requestData['search']['value'] .'%')->where('status', 3)->get();
            $filtered = count($requests);
        }
        else
        {
            $requests = LoginModel::with('data')->where('status', 3)->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'] )->offset( $requestData['start'])->take($requestData['length'])->get();
            $filtered = count($requests);
        }

        // Ler e criar o array de dados
        $dados = array();
        $i = 1;
        foreach ($requests as $request){
            $dado = array();
            $dado[] = $i++;
            $dado[] = $request->data->rank->rankAbbreviation;
            $dado[] = $request->data->professionalName;
            $dado[] = $request->data->name;
            $dado[] = $request->data->departament->name;
            $dado[] = $request->data->company->name;
               if ($request->email == '') {
                   $dado[] = '-';
               }else{
                   $dado[] = $request->email;
               }
            $dado[] = "
                        <button class='btn btn-success btn-md' title='Aceitar' data-toggle='modal' data-target='#confirm_request'
                         data-id='".$request->data->id."'>
                            <i class='fas fa-check'></i>
                        </button>

                        <button class='btn btn-danger btn-md' title='Excluir' onclick='return cancel_request(".$request->data->id.",".'"'.$request->data->professionalName.'"'.")'>
                            <i class='fas fa-times'></i>
                        </button>";
            $dados[] = $dado;
        }


        //Cria o array de informações a serem retornadas para o Javascript
        $json_data = array(
            "draw" => intval($requestData['draw']),//para cada requisição é enviado um número como parâmetro
            "recordsTotal" => intval( $filtered ),  //Quantidade de registros que há no banco de dados
            "recordsFiltered" => intval($rows ), //Total de registros quando houver pesquisa
            "data" => $dados   //Array de dados completo dos dados retornados da tabela
        );

        return json_encode($json_data);  //enviar dados como formato json
    }
    //================================={ Mostrar info das solicitções }====================================//
    public function register_info($id)
    {
    $permission = LoginApplicationModel::with('app')->where('login_id',$id)->get();
    $permissions = null;
    foreach ($permission as $value)
    {
        $permissions['id'.$value->app->id] = $value;
    }

    return $permissions;
    }
    //================{ Area do SGTTE "PLANO DE CHAMADA" }===============//
    //==============================={Lista de militares}=================================//
    public function callplan($company)
    {
      $data = [
          'users' =>  UserModel::where('company_id',$company)->get(),
          'active' => $company
        ];

      return view('control-panel.callplan',$data);
    }
    //================================={ Editar informações do militar }====================================//
    public function edit_military($id)
    {
        //Buscando informações do usuario
        $user = $this->Tools->user_data($id);

        if (session('user')['company'] != $user->company) {
           return redirect()->route('callplan',['company'=> session('user')['company']]);
        }

        session()->flash('id', $id);
        $data = [
            'apps' => ApplicationsModel::with('profiles')->get(),
            'all_ranks' => RanksModel::all(),
            'all_departament' => DepartamentModel::all(),
            'all_company' => CompanyModel::all(),
            'all_cities' => CitiesModel::all(),
            'active' => $user->company_id,
            'user_data' => $user, //Buscando informações do usuário
        ];
        return view('control-panel.edit_user_profile', $data);
    }

    //================================={ Ver informações do militar }====================================//
       public function military($id)
    {
        $user = $this->Tools->user_data($id);
        $data = [
            'user_data' => $user,
            'active' => $user->company_id
        ];
            return view('control-panel.military-info', $data);
    }
    //=========================================================================//
}
