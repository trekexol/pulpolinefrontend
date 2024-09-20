<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TokenController;
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

Route::get('/', [UserController::class, 'index'])->name('users');



Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/login', [UserController::class, 'login'])->name('users.login');
Route::post('/users/storeLogin', [UserController::class, 'storeLogin'])->name('users.storeLogin');


Route::get('/tokens/{userId}', [TokenController::class, 'index'])->name('tokens');
Route::get('/tokens/create/{userId}', [TokenController::class, 'create'])->name('tokens.create');
Route::post('/tokens/store', [TokenController::class, 'store'])->name('tokens.store');


