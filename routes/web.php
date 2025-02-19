<?php

use App\Http\Controllers\AuthController;
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


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/resource', \App\Http\Controllers\TableController::class);


Route::controller(AuthController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::get('signup', 'signup')->name('signup');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_signup', 'validate_signup')->name('validate_signup');

    Route::post('validate_login', 'validate_login')->name('validate_login');

    Route::get('dashboard', 'dashboard')->name('dashboard');

});

Route::resource('/posts', \App\Http\Controllers\PostsController::class);

