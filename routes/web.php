<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return redirect()->route('index');
});

Route::get('/mahasiswas', [MahasiswaController::class, 'index'])->name('index');
Route::get('/mahasiswas/create', [MahasiswaController::class, 'create'])->name('create');
Route::post('/mahasiswas', [MahasiswaController::class, 'store'])->name('store');
Route::get('/mahasiswas/{mahasiswa}', [MahasiswaController::class, 'show'])->name('show');
Route::get('/mahasiswas/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('edit');
Route::put('/mahasiswas/{mahasiswa}', [MahasiswaController::class, 'update'])->name('update');
Route::delete('/mahasiswas/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('destroy');
