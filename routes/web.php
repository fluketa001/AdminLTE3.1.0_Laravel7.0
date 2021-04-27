<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Admin
Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin-home');
Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin-home');

// Auth
// Route::get('/login', function () {
//     return view('admin.auth.login');
// })->name('admin-login');
Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'index'])->name('admin-login');
Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin-auth-login');
Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin-auth-logout');

Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
Route::get('/user-add', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user-add');
Route::post('/user-store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user-store');
Route::get('/user-edit/{data}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user-edit');
Route::post('/user-update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user-update');
Route::post('/user-delete/{data}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user-delete');
Route::post('/user-reset/{data}', [App\Http\Controllers\Admin\UserController::class, 'resetPassword'])->name('user-reset');

Route::get('/config-points', [App\Http\Controllers\Admin\ConfigPointController::class, 'index'])->name('config-points');
Route::get('/config-point-edit/{data}', [App\Http\Controllers\Admin\ConfigPointController::class, 'edit'])->name('config-point-edit');
Route::post('/config-point-update', [App\Http\Controllers\Admin\ConfigPointController::class, 'update'])->name('config-point-update');

Route::get('/rooms', [App\Http\Controllers\Admin\RoomController::class, 'index'])->name('rooms');
Route::get('/room-add', [App\Http\Controllers\Admin\RoomController::class, 'create'])->name('room-add');
Route::post('/room-store', [App\Http\Controllers\Admin\RoomController::class, 'store'])->name('room-store');
Route::get('/room-edit/{data}', [App\Http\Controllers\Admin\RoomController::class, 'edit'])->name('room-edit');
Route::get('/room-detail/{data}', [App\Http\Controllers\Admin\RoomController::class, 'show'])->name('room-detail');
Route::post('/room-update', [App\Http\Controllers\Admin\RoomController::class, 'update'])->name('room-update');
Route::post('/room-delete/{data}', [App\Http\Controllers\Admin\RoomController::class, 'destroy'])->name('room-delete');

Route::get('/equipments', [App\Http\Controllers\Admin\EquipmentController::class, 'index'])->name('equipments');
Route::get('/equipment-add', [App\Http\Controllers\Admin\EquipmentController::class, 'create'])->name('equipment-add');
Route::post('/equipment-store', [App\Http\Controllers\Admin\EquipmentController::class, 'store'])->name('equipment-store');
Route::get('/equipment-edit/{data}', [App\Http\Controllers\Admin\EquipmentController::class, 'edit'])->name('equipment-edit');
Route::post('/equipment-update', [App\Http\Controllers\Admin\EquipmentController::class, 'update'])->name('equipment-update');
Route::post('/equipment-delete/{data}', [App\Http\Controllers\Admin\EquipmentController::class, 'destroy'])->name('equipment-delete');

Route::get('/residents', [App\Http\Controllers\Admin\ResidentController::class, 'index'])->name('residents');
Route::get('/residents-notrent', [App\Http\Controllers\Admin\ResidentController::class, 'indexNotRent'])->name('residents-notrent');
Route::get('/resident-add', [App\Http\Controllers\Admin\ResidentController::class, 'create'])->name('resident-add');
Route::post('/resident-store', [App\Http\Controllers\Admin\ResidentController::class, 'store'])->name('resident-store');
Route::get('/resident-edit/{data}', [App\Http\Controllers\Admin\ResidentController::class, 'edit'])->name('resident-edit');
Route::post('/resident-update', [App\Http\Controllers\Admin\ResidentController::class, 'update'])->name('resident-update');
Route::post('/resident-delete/{data}', [App\Http\Controllers\Admin\ResidentController::class, 'destroy'])->name('resident-delete');

Route::get('/rents', [App\Http\Controllers\Admin\RentController::class, 'index'])->name('rents');
Route::get('/rent-add', [App\Http\Controllers\Admin\RentController::class, 'create'])->name('rent-add');
Route::post('/rent-store', [App\Http\Controllers\Admin\RentController::class, 'store'])->name('rent-store');
Route::get('/rent-detail/{data}', [App\Http\Controllers\Admin\RentController::class, 'show'])->name('rent-detail');
Route::get('/rent-edit/{data}', [App\Http\Controllers\Admin\RentController::class, 'edit'])->name('rent-edit');
Route::post('/rent-update', [App\Http\Controllers\Admin\RentController::class, 'update'])->name('rent-update');
Route::post('/rent-delete/{data}', [App\Http\Controllers\Admin\RentController::class, 'destroy'])->name('rent-delete');

Route::get('/lists', [App\Http\Controllers\Admin\ListDeleteController::class, 'index'])->name('lists');
Route::post('/list-delete/{data}', [App\Http\Controllers\Admin\ListDeleteController::class, 'destroy'])->name('list-delete');
Route::post('/list-cancel/{data}', [App\Http\Controllers\Admin\ListDeleteController::class, 'cancel'])->name('list-cancel');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});