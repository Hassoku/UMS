<?php

use Illuminate\Support\Facades\Route;

Route::prefix('users')->namespace('Users')->group(function(){

    Route::get('/',[App\Http\Controllers\User\UserController::class, 'getData']);
    Route::post('/',[App\Http\Controllers\User\UserController::class, 'addData']);


});