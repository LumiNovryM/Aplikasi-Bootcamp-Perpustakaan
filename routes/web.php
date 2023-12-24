<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibraryController;
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

Route::get('/', [LibraryController::class, 'index']);
Route::get('/login', [LibraryController::class, 'login'])->name('login_page');
Route::get('/register', [LibraryController::class, 'register'])->name('register_page');
Route::get('/profil', [LibraryController::class, 'profil']);

Route::post('/register', [AuthController::class, 'register'])->name('register_user');