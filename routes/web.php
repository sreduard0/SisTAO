<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Models\CitiesModel;

//========================================================================//
//========{                       PRINCIPAL                      }========//
//========================= ==============================================//
//======== INDEX
Route::get('/', [MainController::class, 'index'])->name('index');
//======== LOGIN/LOGOUT
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/login_submit', [MainController::class, 'login_submit'])->name('login_submit');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');
//======== PAINEL DE CONTROLE
Route::get('/home', [MainController::class, 'home'])->name('home');
Route::get('profile', [MainController::class, 'profile'])->name('profile');
Route::get('/edit_profile', [MainController::class, 'edit_profile'])->name('edit_profile');
Route::get('/session', function () {
    print_r(session()->all());
});

//========================================================================//
//========{                      APLICAÇÕES                      }========//
//========================================================================//

//======== DESPACHO
Route::get('/dispatch', function () {
    return redirect('http://despacho.3bsup.eb.mil.br/home');
})->name('dispatch');
