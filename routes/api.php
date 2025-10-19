<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/pessoas', App\Http\Controllers\PessoaController::class);
Route::apiResource('/categorias', App\Http\Controllers\CategoriaController::class);
Route::apiResource('/contas', App\Http\Controllers\ContaController::class);
Route::apiResource('/pagamentos', App\Http\Controllers\PagamentoController::class); 
Route::apiResource('/forma-pagamentos', App\Http\Controllers\FormaPagamentoController::class);
// Route::apiResource('/relatorios', App\Http\Controllers\RelatorioController::class)->only(['index']);

