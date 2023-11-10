<?php

use App\Http\Controllers\ForeignExchangeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(OrderController::class)->group(function () {
    Route::get('/', 'index')->name('index.order');
    Route::post('/orders', 'store')->name('store.order');
    Route::get('/orders/{order}', 'show')->name('show.order');
});

Route::get('foreign-exchange', [ForeignExchangeController::class, 'index'])->name('index.exchange');

