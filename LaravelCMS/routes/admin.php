<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;

Route::middleware("guest:admin")->group(function(){
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
    Route::post('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
});





Route::middleware("auth:admin")->group(function(){
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    Route::resource('admin_users', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
});

