<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/dosen', function () {
    return view('dosen.index');
});

Route::get('/mentor', function () {
    return view('mentor.index');
});

Route::get('/mahasiswa', function () {
    return view('mahasiswa.index');
});
