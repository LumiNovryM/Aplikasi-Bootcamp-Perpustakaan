<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\TransactionController;
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

Route::get('/login', [LibraryController::class, 'login'])->name('login');
Route::get('/register', [LibraryController::class, 'register'])->name('register');
Route::get('/profil', [LibraryController::class, 'profil'])->name('profil');

Route::post('/register', [AuthController::class, 'register'])->name('register_user');
Route::post('/login', [AuthController::class, 'login'])->name('login_user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout_user');


Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/dashboard', [LibraryController::class, 'index_admin'])->name('dashboard_admin');

    Route::get('/buku', [LibraryController::class, 'buku'])->name('buku');
    Route::post('/buku', [LibraryController::class, 'store_buku'])->name('buku.store');
    Route::put('/buku/{id}', [LibraryController::class, 'edit_buku'])->name('buku.edit');
    Route::delete('/buku/{id}', [LibraryController::class, 'delete_buku'])->name('buku.delete');

    Route::post('/dashboard', [LibraryController::class, 'store_siswa'])->name('siswa.store');
    Route::put('/dashboard/{id}', [LibraryController::class, 'edit_siswa'])->name('siswa.edit');
    Route::delete('/dashboard/{id}', [LibraryController::class, 'delete_siswa'])->name('siswa.delete');
});

Route::prefix('siswa')->middleware('auth:siswa')->group(function() {
    Route::get('/dashboard', [TransactionController::class, 'index_get_siswa'])->name('dashboard_siswa');

    Route::get('/trx', [TransactionController::class, 'pinjam_buku_view'])->name('pinjam_buku');
    Route::post('/trx/{id}', [TransactionController::class, 'store'])->name('store_trx');
});