<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\RegisterController;

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
    return view('home');
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/account', [AccountController::class, 'index']);
Route::get('/account-add', [AccountController::class, 'create']);
Route::post('/account', [AccountController::class, 'store']);
Route::get('/account-delete/{id}', [AccountController::class, 'delete']);
Route::delete('/account-destroy/{id}', [AccountController::class, 'destroy']);

Route::get('/devices', [DeviceController::class, 'index'])->middleware('auth');
Route::get('/device-add', [DeviceController::class, 'create'])->middleware('auth');
Route::post('/device', [DeviceController::class, 'store'])->middleware('auth');
Route::get('/device-delete/{id}', [DeviceController::class, 'delete'])->middleware('auth');
Route::delete('/device-destroy/{id}', [DeviceController::class, 'destroy'])->middleware('auth');

