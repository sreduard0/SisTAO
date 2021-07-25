<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApplicationsModel;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    //Controle de login nas Aplicações
    function login_apps($id)
    {
        $app = ApplicationsModel::with('profiles')->find($id);

        if (!$app->profiles) {
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
}
