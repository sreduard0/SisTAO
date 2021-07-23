<?php
//C:\Windows\System32\drivers\etc\hosts
use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Cookie;

//========================================================================//
//========{                         ROTAS                        }========//
//=======================================================================//
//======== LOGIN/LOGOUT
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login_submit', [LoginController::class, 'login_submit'])->name('login_submit');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    //======== INDEX
    Route::get('/', [ViewController::class, 'home'])->name('index');
    //======== PAINEL DE CONTROLE
    Route::get('panel', [ViewController::class, 'home'])->name('home');
    Route::get('profile/view/{id?}', [ViewController::class, 'profile'])->name('profile');
    Route::get('profile/edit/', [ViewController::class, 'edit_profile'])->name('edit_profile');
    Route::get('profile/edit/{id}', [ViewController::class, 'edit_profile'])->middleware('CheckProfile')->name('edit_user_profile');
    Route::get('profile/password', [ViewController::class, 'alt_password'])->name('alt_password');
    Route::get('users/list', [ViewController::class, 'users_list'])->middleware('CheckProfile')->name('users_list');
    Route::get('profile/create', [ViewController::class, 'create_user'])->middleware('CheckProfile')->name('create_user');

    //======== ações
    Route::get('profile/delete/{id}', [CrudController::class, 'delete_profile'])->middleware('CheckProfile')->name('delete_profile');
    Route::get('profile/login/{f}/{id}', [CrudController::class, 'password'])->middleware('CheckProfile')->name('password');

    //========Rotas de envio de formularios
    Route::post('submit_create_user', [CrudController::class, 'submit_create_user'])->middleware('CheckProfile')->name('submit_create_user');
    Route::post('submit_alt_profile', [CrudController::class, 'submit_alt_profile'])->name('submit_alt_profile');
    Route::post('submit_alt_pwd', [CrudController::class, 'submit_alt_pwd'])->name('submit_alt_pwd');
    Route::post('upload_img_profile', [CrudController::class, 'upload_img_profile'])->name('upload_img_profile');
    Route::post('alt_img_bg', [CrudController::class, 'alt_img_bg'])->name('alt_img_bg');
    Route::post('alt_permissions', [CrudController::class, 'alt_permissions'])->middleware('CheckProfile')->name('alt_permissions');
});


//========================================================================//
//========{                      APLICAÇÕES                      }========//
//========================================================================//

//============================[Rota de teste]====================================
// Route::get('/cookie', function () {
//     return Cookie::get();
// });
