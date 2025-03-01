<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/eventos/listagem',[EventoController::class,'listagem']);
Route::get('/eventos/cadastrar',[EventoController::class,'cadastro']);
Route::post('/eventos/salvar',[EventoController::class,'salvar']);
Route::get('/eventos/excluir/{id}',[EventoController::class,'exclusao']);
