<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReflectionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->controller(AuthController::class)->group(function () {

    Route::get('/register', 'showRegister')->name('show.register');

    Route::get('/login', 'showLogin')->name('show.login');

    Route::post('/register', 'register')->name('register');

    Route::post('/login', 'login')->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->controller(ReflectionsController::class)->group(function () {
    Route::get('/reflections', 'index')->name('reflections.index');

    Route::get('/reflections/create', 'create')->name('reflections.create'); 

    Route::get('/reflections/{id}', 'show')->name('reflections.show'); 

    Route::post('/reflections', 'store')->name('reflections.store');

    Route::delete('/reflections/{id}', 'destroy')->name('reflections.destroy');
});