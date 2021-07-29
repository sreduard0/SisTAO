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
