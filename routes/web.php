<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

//========================================================================//
//========{                    PAINEL PRINCIPAL                  }========//
//========================= ==============================================//
Route::get('/', [MainController::class, 'index'])->name('index');
