<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationAddRequest;
use App\Models\ApplicationsModel;
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
//======================={ Adicionar app no DB }==========================//
    public function add_application(ApplicationAddRequest $request)
    {
        $newApp = $request->all();
        if (empty($newApp['special']))
        {
            $newApp['special'] = null;
        }
        $app = new ApplicationsModel();
        $app->name = $newApp['abbreviation_app'];
        $app->fullName = $newApp['full_name'];
        $app->link = 'http://' . str_replace('http://', '', $newApp['link']);
        $app->special = $newApp['special'] ;
        $app->save();
        return back();
    }
//===================={ Apagar aplicativo  do DB }=========================//
    public function del_application($id)
    {
        ApplicationsModel::find($id)->delete();
    }
//================================={ DataTables }====================================//
    public function get_apps(Request $request){
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
            $apps = ApplicationsModel::orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'] ) ->offset( $requestData['start'])->take($requestData['length'])->get();
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

                    default:
                            $dado[] = 'Simples';
                        break;
            }
            $dado[] = " <a class='btn btn-success btn-md' href='#' title='Editar'>
                            <i class='fas fa-pen'></i>
                        </a>
                        <button class='btn btn-danger btn-md'
                            onclick='return confirm_delete_app(".$app->id.",".'"'.$app->name.'"'.")'
                            title='Editar'>
                            <i class='fas fa-trash'></i>
                        </button>";
            $dados[] = $dado;
        }


        //Cria o array de informações a serem retornadas para o Javascript
        $json_data = array(
            "draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
            "recordsTotal" => intval( $rows ),  //Quantidade de registros que há no banco de dados
            "recordsFiltered" => intval( $filtered ), //Total de registros quando houver pesquisa
            "data" => $dados   //Array de dados completo dos dados retornados da tabela
        );

        echo json_encode($json_data);  //enviar dados como formato json
    }
//================================={  }====================================//
//================================={  }====================================//
//================================={  }====================================//
//================================={  }====================================//
//================================={  }====================================//
//================================={  }====================================//
//================================={  }====================================//

}
