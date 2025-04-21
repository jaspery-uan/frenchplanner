<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReflectionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reflections', [ReflectionsController::class, 'index'])->name('reflections.index');

Route::get('/reflections/create', [ReflectionsController::class, 'create'])->name('reflections.create'); 

Route::get('/reflections/{id}', [ReflectionsController::class, 'show'])->name('reflections.show'); 

Route::post('/reflections', [ReflectionsController::class, 'store'])->name('reflections.store');

Route::delete('/reflections/{id}', [ReflectionsController::class, 'destroy'])->name('reflections.destroy');