<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']);
// Redirect ke /buku setelah login
Route::get('/dashboard', fn() => redirect('/buku'))->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Peminjam bisa meminjam buku
    Route::post('/pinjam/{book}', [LoanController::class, 'store'])->name('pinjam');
});

// Pustakawan: Kelola buku dan lihat pinjaman
Route::middleware(['auth', 'isPustakawan'])->group(function () {
    Route::resource('admin/books', BookController::class);
    Route::get('/admin/loans', [LoanController::class, 'index'])->name('loans.index');
    Route::delete('/admin/loans/{id}', [LoanController::class, 'destroy'])->name('loans.destroy');
});

// Daftar buku terbuka untuk umum
Route::get('/buku', [BookController::class, 'index']);

require __DIR__.'/auth.php';
