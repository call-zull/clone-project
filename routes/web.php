<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BatchController as AdminBatchController;
use App\Http\Controllers\Admin\LearningOutComeController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Dosen\DosenController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\Mentor\MentorController;
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
    Route::resource('batch/{batch}/position', PositionController::class);
    Route::resource('learning-outcomes', LearningOutComeController::class);
    Route::get('/learning-outcomes/batch/{batch}/position/{position}/create', [LearningOutComeController::class, 'create'])->name('learning-outcomes.create');
    Route::post('/learning-outcomes/batch/{batch}/position/{position}/store', [LearningOutComeController::class, 'store'])->name('learning-outcomes.store');
    Route::get('/learning-outcomes/batch/{batch}/position/{position}/edit/{learning_outcome}', [LearningOutComeController::class, 'edit'])->name('learning-outcomes.edit');
    Route::put('/learning-outcomes/batch/{batch}/position/{position}/{learning_outcome}', [LearningOutComeController::class, 'update'])->name('learning-outcomes.update');
});


Route::prefix('mentor')->middleware(['auth', 'role:mentor'])->group(function () {
    // Route::get('/', function () {
    //     return view('mentor.index');
    // })->name('mentor.dashbord');
    Route::get('/', [MentorController::class, 'index'])->name('mentor.dashboard');
    Route::get('/profile', [MentorController::class, 'profile'])->name('mentor.profile');


    //     Route::put('/approve-report/{reportId}', [MentorController::class, 'approveReport'])->name('mentor.approveReport');
    //     Route::put('/revise-report/{reportId}', [MentorController::class, 'reviseReport'])->name('mentor.reviseReport');
});

// Route::prefix('mentor')->middleware(['auth', 'role:mentor'])->group(function () {
//     Route::get('/', [MentorController::class, 'index'])->name('mentor.dashboard');

//     Route::put('/approve-report/{reportId}', [MentorController::class, 'approveReport'])->name('mentor.approveReport');
//     Route::put('/revise-report/{reportId}', [MentorController::class, 'reviseReport'])->name('mentor.reviseReport');
// });


Route::prefix('dosen')->middleware(['auth', 'role:dosen'])->group(function () {
    // Route::get('/', function () {
    //     return view('dosen.index');
    // })->name('dosen.dashboard');
    Route::get('/', [DosenController::class, 'index'])->name('dosen.dashboard');
});

Route::prefix('mahasiswa')->middleware(['auth', 'role:mahasiswa'])->group(function () {

    // Route::get('/', function () {
    //     return view('mahasiswa.index');
    // })->name('mahasiswa.dashboard');

    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
    Route::post('activity/report/store', [MahasiswaController::class, 'storeActivityReport'])->name('activity.report.store');
    Route::put('activity/report/update{report}', [MahasiswaController::class, 'updateActivityReport'])->name('activity.report.update');
});

Route::prefix('admin')->middleware(['auth', 'role:admin,mentor,dosen'])->group(function () {
    route::get('/batch', [AdminBatchController::class, 'index'])->name('bacth.index');
    route::get('/batch/batch-{batch}/learning-outcomes', [LearningOutComeController::class, 'index'])->name('bacth.cpl.index');
    route::get('/batch/batch-{batch}/learning-outcomes/position-{position}', [LearningOutComeController::class, 'show'])->name('bacth.cpl.show');
});
