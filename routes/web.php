<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/mahasiswa', function () {
    return view('mahasiswa.index');
})->name('mahasiswa.dashboard')->middleware('role:mahasiswa');

// Route::middleware(['auth', 'role:admin'])->group(function () {
// });
// Route::resource('admin/users', UserController::class);

Route::get('/mentor', function () {
    return view('mentor.index');
})->name('mentor.dashboard')->middleware('role:mentor');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('role:admin');

Route::get('/dosen', function () {
    return view('dosen.index');
})->name('dosen.dashboard')->middleware('role:dosen');