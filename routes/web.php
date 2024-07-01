<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatasiswaController;

Route::get('/', function () {
    return view('welcome');
});

// Define resource routes for DatasiswaController
Route::get('/datasiswa', [DatasiswaController::class, 'index'])->name('datasiswa.index');
Route::post('/datasiswa/store', [DatasiswaController::class, 'store'])->name('datasiswa.store');
Route::get('/datasiswa/{id}', [DatasiswaController::class, 'destroy'])->name('datasiswa.destroy');
Route::put('/datasiswa/{id}', [DatasiswaController::class, 'update'])->name('datasiswa.update');
Route::get('/datasiswa/search', [DatasiswaController::class, 'search'])->name('datasiswa.search');

