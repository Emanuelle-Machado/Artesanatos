<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaApiController;
use App\Http\Controllers\ProdutoApiController;
use App\Http\Controllers\VendaApiController;
use App\Http\Controllers\UserApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::post('/categorias', [CategoriaApiController::class, 'store']);
    Route::get('/categorias', [CategoriaApiController::class, 'index']);
    Route::get('/categorias/{id}', [CategoriaApiController::class, 'show']);
    Route::put('/categorias/{id}', [CategoriaApiController::class, 'update']);
    Route::delete('/categorias/{id}', [CategoriaApiController::class, 'destroy']);
});

Route::middleware('api')->group(function () {
    Route::post('/produtos', [ProdutoApiController::class, 'store']);
    Route::get('/produtos', [ProdutoApiController::class, 'index']);
    Route::get('/produtos/{id}', [ProdutoApiController::class, 'show']);
    Route::put('/produtos/{id}', [ProdutoApiController::class, 'update']);
    Route::delete('/produtos/{id}', [ProdutoApiController::class, 'destroy']);
});

Route::middleware('api')->group(function () {
    Route::post('/vendas', [VendaApiController::class, 'store']);
    Route::get('/vendas', [VendaApiController::class, 'index']);
    Route::get('/vendas/{id}', [VendaApiController::class, 'show']);
    Route::put('/vendas/{id}', [VendaApiController::class, 'update']);
    Route::delete('/vendas/{id}', [VendaApiController::class, 'destroy']);
});

Route::middleware('api')->group(function () {
    Route::post('/users', [UserApiController::class, 'store']);
    Route::get('/users', [UserApiController::class, 'index']);
    Route::get('/users/{id}', [UserApiController::class, 'show']);
    Route::put('/users/{id}', [UserApiController::class, 'update']);
    Route::delete('/users/{id}', [UserApiController::class, 'destroy']);
});
