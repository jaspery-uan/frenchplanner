<?php

/**
 * French Learning Tracker Application
 * ICS4U
 * Laura, Joshua, Jasper
 * 
 * Web routes definition for the Reflexions app:
 * - Defines guest-only routes for registration and login
 * - Defines authenticated routes for managing reflections (CRUD)
 * - Provides a home route serving the welcome page
 * - Protects sensitive routes with middleware ('guest' and 'auth')
 * History:
 * February 12: File creation
 * April 21: Added all specific adjustments
 * May 22: Added comments
 */

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReflectionsController;

Route::get('/', function () { // Home route: displays the welcome page
    return view('welcome');
});

// Routes only accessible by guests (not logged in users)
Route::middleware('guest')->controller(AuthController::class)->group(function () {

    Route::get('/register', 'showRegister')->name('show.register'); // Registration form

    Route::get('/login', 'showLogin')->name('show.login'); // Login form

    Route::post('/register', 'register')->name('register'); // Handles registration form submission

    Route::post('/login', 'login')->name('login'); // Handles login form submission
});

// Logout only available for authenticated users
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes only accessilbe by authenticated users
Route::middleware('auth')->controller(ReflectionsController::class)->group(function () {
    Route::get('/reflections', 'index')->name('reflections.index'); // Reflections list

    Route::get('/reflections/create', 'create')->name('reflections.create'); // Reflection creation

    Route::get('/reflections/{id}', 'show')->name('reflections.show'); // Show reflection by ID

    Route::post('/reflections', 'store')->name('reflections.store'); // Handle form submission to store reflection

    Route::delete('/reflections/{id}', 'destroy')->name('reflections.destroy'); // Delete reflection by ID
});