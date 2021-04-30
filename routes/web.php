<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

//========================================================================//
//========{                       PRINCIPAL                      }========//
//========================= ==============================================//
//======== INDEX
Route::get('/', [MainController::class, 'index'])->name('index');
//======== LOGIN
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/login_submit', [MainController::class, 'login_submit'])->name('login_submit');
//======== PAINEL
Route::get('/control_panel', [MainController::class, 'control_panel'])->name('control_panel');
