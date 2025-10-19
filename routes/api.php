<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\FormaPagamentoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PessoaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('pessoas', PessoaController::class);
    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('formas-pagamento', FormaPagamentoController::class);
    Route::apiResource('contas', ContaController::class);
    Route::apiResource('pagamentos', PagamentoController::class);
});