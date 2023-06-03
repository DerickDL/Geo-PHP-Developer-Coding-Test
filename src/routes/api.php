<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/user')->group(function () {
    Route::post('/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/{id}', [UserController::class, 'getById'])->name('users.getById');
    Route::put('/{id}', [UserController::class, 'updateUserName'])->name('users.updateUserName');
});

Route::prefix('/order')->group(function () {
    Route::post('/create', [OrderController::class, 'create'])->name('orders.create');
});
