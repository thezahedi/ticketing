<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/users')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::post('/', [UserController::class, 'store'])->name('user.store');

    Route::prefix('/{user}')->group(function () {

        Route::get('/', [UserController::class, 'show'])->name('user.show');

        Route::patch('/', [UserController::class, 'update'])->name('user.update');

        Route::delete('/', [UserController::class, 'destroy'])->name('user.destroy');

    });

});

Route::prefix('/units')->group(function () {

    Route::get('/', [UnitController::class, 'index'])->name('unit.index');

    Route::post('/', [UnitController::class, 'store'])->name('unit.store');

    Route::prefix('/{unit}')->group(function () {

        Route::get('/', [UnitController::class, 'show'])->name('unit.show');

        Route::patch('/', [UnitController::class, 'update'])->name('unit.update');

        Route::delete('/', [UnitController::class, 'destroy'])->name('unit.destroy');

    });

});

Route::prefix('/tickets')->group(function () {

    Route::post('/', [TicketController::class, 'store'])->name('ticket.store');

});
