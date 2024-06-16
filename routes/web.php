<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\UserController;
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





Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/upload', [ExcelController::class, 'upload'])->name('upload');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::post('/import-excel', [ExcelController::class, 'importExcel'])->name('import.excel');
});

Route::middleware(['rauth'])->group(function () {
    Route::get('/', [UserController::class, 'home'])->name('home');

    // Route to show login form
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

    // Route to handle login form submission
    Route::post('/login', [UserController::class, 'login']);

    // Route to show registration form
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');

    // Route to handle registration form submission
    Route::post('/register', [UserController::class, 'register']);
});
