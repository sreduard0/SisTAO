<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationAddRequest;
use App\Models\ApplicationsModel;
use App\Models\LoginApplicationModel;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{

    //Controle de login nas Aplicações
    function login_apps($id)
    {
        $app = ApplicationsModel::with('profiles')->find($id);

        if (!$app->profiles ) {
            return back();
        }

        session()->put([
            $app->name => [
                'profileType' => $app->profiles->profileType,
                'notification' => $app->profiles->notification,
                'loginID' => $app->profiles->login_id,
            ]
        ]);

        return redirect($app->link);
    }

//================================={ DataTables }====================================//
    public function get_apps(Request $request)
    {
        //Receber a requisão da pesquisa
       $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0=> 'id',
            1 =>'name',
            2 => 'fullName',
            3=> 'link',
            4=> 'special',
            5=> 'created_at',
        );

       //Obtendo registros de número total sem qualquer pesquisa
       $rows = count(ApplicationsModel::all());

       //Se há pesquisa ou não
        if( $requestData['search']['value'] )
        {
           $apps = ApplicationsModel::orWhere('name', 'LIKE', '%'.$requestData['search']['value'] .'%')
            ->orWhere('fullName', 'LIKE', '%'.$requestData['search']['value'].'%')
            ->orWhere('link', 'LIKE', '%' .$requestData['search']['value'] . '%')
            ->orWhere('special', 'LIKE', '%'.$requestData['search']['value'].'%')->get();
            $filtered = count($apps);
        }
        else
        {
            $apps = ApplicationsModel::orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'] )->offset($requestData['start'])
                ->take($requestData['length'])
                ->get();
            $filtered = count($apps);
        }

        // Ler e criar o array de dados
        $dados = array();
        $i = 1;
        foreach ($apps as $app){
            if ($app->id == 6) {
                continue;
            }
            $dado = array();
            $dado[] = $i++;
            $dado[] = $app->name;
            $dado[] = $app->fullName;
            $dado[] = $app->link;
                switch ($app->special) {
                    case 1:
                            $dado[] = 'Especial';
                        break;

                        case 2:
                            $dado[] = 'Link';
                        break;
                         case 3:
                            $dado[] = 'Vinculado';
                        break;

                    default:
                            $dado[] = 'Simples';
                        break;
            }
            $dado[] = "
                        <button type='button'  class='btn btn-success btn-md' data-toggle='modal' data-target='#edit_app'
                         data-id='".$app->id."'><i class='fas fa-pen'></i></button>

                        <button class='btn btn-danger btn-md'
                            onclick='return confirm_delete_app(".$app->id.",".'"'.$app->name.'"'.")'
                            title='Editar'>
                            <i class='fas fa-trash'></i>
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

//================================={ find app info }====================================//
public function find_app_info($id)
{
    $app = ApplicationsModel::find($id);
    return $app;

}

//================================={ vincula usuario e senha }============================//
public function link_login(Request $request)
{
    $data = $request->all();

    $loginApp = LoginApplicationModel::find($data['id']);
    $loginApp->user = $data['user'];
    $loginApp->password = $data['password'];
    $loginApp->save();
}

//================================={ vincula usuario e senha }============================//
public function info_link($id)
{
    return LoginApplicationModel::where('id', $id)->where('login_id', session('user')['id'])->first();

}
// =======================================================================//
//                             CRUD APPS                                  //
//======================={ Adicionar app no DB }==========================//
    public function add_application(Request $request)
    {
        $newApp = $request->all();

        if (empty($newApp['special']))
        {
            $newApp['special'] = null;
        }
          if (empty($newApp['loading']))
        {
            $newApp['loading'] = 0;
        }
        $app = new ApplicationsModel();
        $app->name = $newApp['abbreviation_app'];
        $app->fullName = $newApp['full_name'];
        $app->link = 'http://' . str_replace(['http://','https://'], '', $newApp['urlpost']);
        $app->linkHome = 'http://' . str_replace(['http://','https://'], '', $newApp['urlhome']);
        $app->loading = $newApp['loading'];
        $app->special = $newApp['special'] ;
        $app->inputUser = $newApp['inputUser'];
        $app->inputPass = $newApp['inputPass'];
        $app->save();

    }
//===================={ Apagar aplicativo  do DB }=========================//
    public function del_application($id)
    {
        ApplicationsModel::find($id)->delete();
        LoginApplicationModel::where('applications_id', $id)->delete();
    }
//================================={ Editar app no DB }====================================//
public function edit_application(Request $request)
{
    $infoApp = $request->all();

    if ($infoApp['special'] == 0)
    {
        $infoApp['special'] = null;
    }

    if (empty($infoApp['loading']))
    {
        $infoApp['loading'] = 0;
    }
    $app = ApplicationsModel::find($infoApp['id']);
    $app->name = $infoApp['abbreviation_app'];
    $app->fullName = $infoApp['full_name'];
    $app->link = 'http://' . str_replace(['http://','https://'], '', $infoApp['urlpost']);
    $app->linkHome = 'http://' . str_replace(['http://','https://'], '', $infoApp['urlhome']);
    $app->loading = $infoApp['loading'];
    $app->special = $infoApp['special'] ;
    $app->inputUser = $infoApp['inputUser'];
    $app->inputPass = $infoApp['inputPass'];
    $app->save();

}
// =======================================================================//
//                            / CRUD APPS                                  //
// =======================================================================//



//================================={  }====================================//
//================================={  }====================================//
//================================={  }====================================//
//================================={  }====================================//

}
