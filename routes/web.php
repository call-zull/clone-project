<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BatchController as AdminBatchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    
    Route::resource('admin/users', UserController::class);
});

Route::prefix('mentor')->middleware(['auth', 'role:mentor'])->group(function () {
    Route::get('/', function () {
        return view('mentor.index');
    })->name('mentor.dashboard');
});

Route::prefix('dosen')->middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/', function () {
        return view('dosen.index');
    })->name('dosen.dashboard');
});

Route::prefix('mahasiswa')->middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/', function () {
        return view('mahasiswa.index');
    })->name('mahasiswa.dashboard');
});

Route::prefix('batch')->middleware(['auth', 'role:admin,mentor,dosen'])->group(function () {
    route::get('/bacth', [AdminBatchController::class, 'index'])->name('admin.bacth.index');
});
