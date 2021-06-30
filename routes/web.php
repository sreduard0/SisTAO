<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Cookie;

//========================================================================//
//========{                       PRINCIPAL                      }========//
//========================= ==============================================//
//======== INDEX
Route::get('/', [LoginController::class, 'index'])->name('index');
//======== LOGIN/LOGOUT
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login_submit', [LoginController::class, 'login_submit'])->name('login_submit');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//======== PAINEL DE CONTROLE
Route::get('home', [MainController::class, 'home'])->name('home');
Route::get('profile/{id?}', [MainController::class, 'profile'])->name('profile');
Route::get('edit_profile/{id?}', [MainController::class, 'edit_profile'])->name('edit_profile');
Route::get('password', [MainController::class, 'alt_password'])->name('alt_password');
Route::get('users_list', [MainController::class, 'users_list'])->name('users_list');
Route::get('create_user', [MainController::class, 'create_user'])->name('create_user');
//========Rotas de envio de formularios
Route::post('submit_create_user', [CrudController::class, 'submit_create_user'])->name('submit_create_user');
Route::post('submit_alt_profile', [CrudController::class, 'submit_alt_profile'])->name('submit_alt_profile');
Route::post('submit_alt_pwd', [CrudController::class, 'submit_alt_pwd'])->name('submit_alt_pwd');
Route::post('upload_img_profile', [CrudController::class, 'upload_img_profile'])->name('upload_img_profile');
Route::post('alt_img_bg', [CrudController::class, 'alt_img_bg'])->name('alt_img_bg');


//========================================================================//
//========{                      APLICAÇÕES                      }========//
//========================================================================//

//============================[Rota de teste]====================================
// Route::get('/cookie', function () {
//     return Cookie::get();
// });
