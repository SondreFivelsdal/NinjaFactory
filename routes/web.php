<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;

Route::get('/', function () {
    return view('welcome');
});

// Routes for the Login and Register pages.
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::Post('/register', [AuthController::class, 'register'])->name('register');
Route::Post('/login', [AuthController::class, 'login'])->name('login');
Route::Post('/logout', [AuthController::class, 'logout'])->name('logout');


// Routes for the NinjaController. 
Route::get('/sondre', [NinjaController::class, 'index'])->name('ninjas.index');
Route::get('/sondre/create', [NinjaController::class, 'create'])->name('ninjas.create');
Route::get('/sondre/{ninja}', [NinjaController::class, 'show'])->name('ninjas.show');
Route::post('/sondre', [NinjaController::class, 'store'])->name('ninjas.store');
Route::delete('/sondre/{ninja}', [NinjaController::class, 'destroy'])->name('ninjas.destroy');





