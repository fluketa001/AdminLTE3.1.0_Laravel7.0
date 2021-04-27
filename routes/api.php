<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/check-point', [App\Http\Controllers\API\PointController::class, 'checkPoint'])->name('check-point');
Route::get('/list-num', [App\Http\Controllers\API\ListDeleteController::class, 'listNum'])->name('list-num');
Route::post('/room-month', [App\Http\Controllers\API\RentController::class, 'roomMonth'])->name('room-month');