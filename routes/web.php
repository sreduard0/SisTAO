<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

//========================================================================//
//========{                       PRINCIPAL                      }========//
//========================= ==============================================//
//======== INDEX
Route::get('/', [MainController::class, 'index'])->name('index');
//======== LOGIN/LOGOUT
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/login_submit', [MainController::class, 'login_submit'])->name('login_submit');
Route::get('/logout',[MainController::class, 'logout'])->name('logout');
//======== PAINEL DE CONTROLE
Route::get('/home', [MainController::class, 'home'])->name('home');
Route::get('/edit_profile', [MainController::class, 'edit_profile'])->name('edit_profile');
