<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//ADMIN
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/vendas', [VendaController::class, 'listSales'])->name('admin.vendas.index');
    Route::get('/admin/vendas/create', [VendaController::class, 'createSale'])->name('admin.vendas.create');
    Route::post('/admin/vendas', [VendaController::class, 'storeSale'])->name('admin.vendas.store');
    Route::get('/admin/vendas/{venda}/edit', [VendaController::class, 'editSale'])->name('admin.vendas.edit');
    Route::put('/admin/vendas/{venda}', [VendaController::class, 'updateSale'])->name('admin.vendas.update');
    Route::delete('/admin/vendas/{venda}', [VendaController::class, 'deleteSale'])->name('admin.vendas.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/relatorios', [RelatorioController::class, 'index'])->name('admin.relatorios.index');
});

//CATEGORIAS
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
    Route::get('/admin/categorias/create', [CategoriaController::class, 'create'])->name('admin.categorias.create');
    Route::post('/admin/categorias', [CategoriaController::class, 'store'])->name('admin.categorias.store');
    Route::get('/admin/categorias/{id}', [CategoriaController::class, 'show'])->name('admin.categorias.show');
    Route::get('/admin/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('admin.categorias.edit');
    Route::put('/admin/categorias/{id}', [CategoriaController::class, 'update'])->name('admin.categorias.update');
    Route::delete('/admin/categorias/{id}', [CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');
});

//PRODUTOS
    Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos.index');
    Route::get('/admin/produtos/create', [ProdutoController::class, 'create'])->name('admin.produtos.create');
    Route::post('/admin/produtos', [ProdutoController::class, 'store'])->name('admin.produtos.store');
    Route::get('/admin/produtos/{id}', [ProdutoController::class, 'show'])->name('admin.produtos.show');
    Route::get('/admin/produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('admin.produtos.edit');
    Route::put('/admin/produtos/{id}', [ProdutoController::class, 'update'])->name('admin.produtos.update');
    Route::delete('/admin/produtos/{id}', [ProdutoController::class, 'destroy'])->name('admin.produtos.destroy');
});

//USUÁRIOS
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
});