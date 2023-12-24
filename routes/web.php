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

Route::get('/', [LibraryController::class, 'index'])->middleware('auth:siswa')->name('dashboard');
Route::get('/login', [LibraryController::class, 'login'])->name('login');
Route::get('/register', [LibraryController::class, 'register'])->name('register_page');
Route::get('/profil', [LibraryController::class, 'profil']);

Route::post('/register', [AuthController::class, 'register'])->name('register_user');
Route::post('/login', [AuthController::class, 'login'])->name('login_user');