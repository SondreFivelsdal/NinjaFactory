<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;

Route::get('/', function () {
    return view('welcome');
});


// Route for the logout function.
Route::Post('/logout', [AuthController::class, 'logout'])->name('logout');


// Routes for the Login and Register pages.
Route::middleware('guest')->controller()->group(function() {
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::Post('/register', 'register')->name('register');
    Route::Post('/login', 'login')->name('login');
});

// Routes for the NinjaController. with auth middleware.
Route::middleware('auth')->controller(NinjaController::class)->group(function() {
    Route::get('/sondre', 'index')->name('ninjas.index');
    Route::get('/sondre/create', 'create')->name('ninjas.create');
    Route::get('/sondre/{ninja}', 'show')->name('ninjas.show');
    Route::post('/sondre', 'store')->name('ninjas.store');
    Route::delete('/sondre/{ninja}', 'destroy')->name('ninjas.destroy');
});






