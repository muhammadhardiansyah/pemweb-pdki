<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SigninController;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/login', [LoginController::class, 'index'])->middleware(('guest')); 
Route::post('/login', [LoginController::class, 'authenticate']); 
Route::post('/logout', [LoginController::class, 'logout']); 

Route::get('/signin', [SigninController::class, 'index'])->middleware('guest');
Route::post('/signin', [SigninController::class, 'store'])->middleware('guest');
