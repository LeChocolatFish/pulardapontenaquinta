<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\InstituicoesController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\UsuariosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/admin',[AdminController::class, 'store']);

Route::post('/formulario',[FormularioController::class, 'store']);

Route::post('/instituicoes',[InstituicoesController::class, 'store']);

Route::post('/servicos',[ServicosController::class, 'store']);

Route::post('/usuarios',[UsuariosController::class, 'store']);