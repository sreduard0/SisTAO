<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Models\CitiesModel;
use Illuminate\Support\Facades\Cookie;

//========================================================================//
//========{                       PRINCIPAL                      }========//
//========================= ==============================================//
//======== INDEX
Route::get('/', [MainController::class, 'index'])->name('index');
//======== LOGIN/LOGOUT
Route::get('login', [MainController::class, 'login'])->name('login');
Route::post('login_submit', [MainController::class, 'login_submit'])->name('login_submit');
Route::get('logout', [MainController::class, 'logout'])->name('logout');
//======== PAINEL DE CONTROLE
Route::get('home', [MainController::class, 'home'])->name('home');
Route::get('profile', [MainController::class, 'profile'])->name('profile');
Route::get('edit_profile', [MainController::class, 'edit_profile'])->name('edit_profile');
Route::get('alt_password', [MainController::class, 'alt_password'])->name('alt_password');
//========Rotas de envio de formularios
Route::post('submit_alt_profile', [MainController::class, 'submit_alt_profile'])->name('submit_alt_profile');
Route::post('submit_alt_pwd', [MainController::class, 'submit_alt_pwd'])->name('submit_alt_pwd');
Route::post('upload_img_profile', [MainController::class, 'upload_img_profile'])->name('upload_img_profile');


//========================================================================//
//========{                      APLICAÇÕES                      }========//
//========================================================================//

//============================[Rota de teste]====================================
Route::get('/cookie', function () {
    return Cookie::get();
});
