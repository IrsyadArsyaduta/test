<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataSiswaController;

Route::get('/', function () {
    return view('welcome');
});

// Route resource for DataSiswa
Route::resource('datasiswa', DataSiswaController::class);