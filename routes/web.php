<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CashesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\PurchasesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('/clientes')->group(function () {
    Route::get('/', [ClientsController::class, 'index']);
    Route::get('/create', [ClientsController::class, 'create']);
    Route::post('/', [ClientsController::class, 'store']);
    Route::get('/{id}/show', [ClientsController::class, 'show']);
    Route::get('/{id}/edit', [ClientsController::class, 'edit']);
    Route::put('/{id}', [ClientsController::class, 'update']);
    Route::delete('/{id}', [ClientsController::class, 'delete']);
});

Route::prefix('/proveedores')->group(function () {
    Route::get('/', [ProvidersController::class, 'index']);
    Route::get('/create', [ProvidersController::class, 'create']);
    Route::post('/', [ProvidersController::class, 'store']);
    Route::get('/{id}/show', [ProvidersController::class, 'show']);
    Route::get('/{id}/edit', [ProvidersController::class, 'edit']);
    Route::put('/{id}', [ProvidersController::class, 'update']);
    Route::delete('/{id}', [ProvidersController::class, 'delete']);
});

Route::prefix('/productos')->group(function () {
    Route::get('/', [ProductsController::class, 'index']);
    Route::get('/create', [ProductsController::class, 'create']);
    Route::post('/', [ProductsController::class, 'store']);
    Route::get('/{id}/show', [ProductsController::class, 'show']);
    Route::get('/{id}/edit', [ProductsController::class, 'edit']);
    Route::put('/{id}', [ProductsController::class, 'update']);
    Route::delete('/{id}', [ProductsController::class, 'delete']);
});

Route::prefix('/cajas')->group(function () {
    Route::get('/', [CashesController::class, 'index']);
    Route::get('/create', [CashesController::class, 'create']);
    Route::post('/', [CashesController::class, 'store']);
    Route::get('/{id}/show', [CashesController::class, 'show']);
    Route::get('/{id}/edit', [CashesController::class, 'edit']);
    Route::put('/{id}', [CashesController::class, 'update']);
    Route::delete('/{id}', [CashesController::class, 'delete']);
});

Route::prefix('/ventas')->group(function () {
    Route::get('/', [OrdersController::class, 'index']);
    Route::get('/create', [OrdersController::class, 'create']);
    Route::post('/', [OrdersController::class, 'store']);
    Route::get('/{id}/show', [OrdersController::class, 'show']);
    Route::get('/{id}/edit', [OrdersController::class, 'edit']);
    Route::put('/{id}', [OrdersController::class, 'update']);
    Route::delete('/{id}', [OrdersController::class, 'delete']);
});

Route::prefix('/promociones')->group(function () {
    Route::get('/', [PromotionsController::class, 'index']);
    Route::get('/create', [PromotionsController::class, 'create']);
    Route::post('/', [PromotionsController::class, 'store']);
    Route::get('/{id}/show', [PromotionsController::class, 'show']);
    Route::get('/{id}/edit', [PromotionsController::class, 'edit']);
    Route::put('/{id}', [PromotionsController::class, 'update']);
    Route::delete('/{id}', [PromotionsController::class, 'delete']);
});

Route::prefix('/compras')->group(function () {
    Route::get('/', [PurchasesController::class, 'index']);
    Route::get('/create', [PurchasesController::class, 'create']);
    Route::post('/', [PurchasesController::class, 'store']);
    Route::get('/{id}/show', [PurchasesController::class, 'show']);
    Route::get('/{id}/edit', [PurchasesController::class, 'edit']);
    Route::put('/{id}', [PurchasesController::class, 'update']);
    Route::delete('/{id}', [PurchasesController::class, 'delete']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
