<?php

use App\Http\Controllers\API\CalculatorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/calculator', [CalculatorController::class, 'index'])->name('calculator');
Route::post('/calculator-info', [CalculatorController::class, 'info'])->name('calculator-info');
