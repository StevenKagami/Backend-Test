<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParkirController;
use App\Http\Controllers\AdminController;

// Masuk dan keluar parkir
Route::post('/parkir/masuk', [ParkirController::class, 'masuk']);
Route::post('/parkir/keluar', [ParkirController::class, 'keluar']);

// Laporan admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/laporan', [AdminController::class, 'laporan']);
    Route::get('/admin/export-laporan', [AdminController::class, 'exportLaporan']);
});
