<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//arquivo responsável por registrar rotas que correspodem a diferentes ações nos produtos


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

    // Route::get('products', [ProductController::class, 'index']);//retorna uma lista de todos os produtos cadastrados
    // Route::get('products/{id}', [ProductController::class, 'show']);//retorna os detalhes de um produto especifico com base no seu id
    // Route::post('products', [ProductController::class, 'store']);//cria um novo produto usando o método store
    // Route::put('update/{id}', [ProductController::class, 'update']);//rota usada para atualizar um produto existente com base no seu id usando o método update
    // Route::delete('delete/{id}', [ProductController::class, 'destroy']);//rota usada para deletar um produto existente com base no seu id e no método destroy

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // Grupo de rotas para produtos com Middleware de Cache
    Route::middleware(['cache.headers'])->group(function () {
        Route::get('products', [ProductController::class, 'index']); // Lista todos os produtos
        Route::get('products/{id}', [ProductController::class, 'show']); // Detalhes de um produto específico
    });

    // Rotas para criar, atualizar e deletar produtos
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('products', [ProductController::class, 'store']); // Cria um novo produto
        Route::put('products/{id}', [ProductController::class, 'update']); // Atualiza um produto existente
        Route::delete('products/{id}', [ProductController::class, 'destroy']); // Deleta um produto
    });
