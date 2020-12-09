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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('user')->namespace('user')->name('user.')->middleware(['web','auth'])->group(function(){
    Route::get('/',[App\Http\Controllers\User\UserController::class,'index'])->name('dashboard');

});


Route::prefix('data')->namespace('data')->name('data.')->middleware(['web','auth'])->group(base_path('routes/data.php'));
