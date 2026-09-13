<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ExtracurricularController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Landing\IndexController;

Route::get('/', [IndexController::class, 'index'])->name('landing.index'); 

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->prefix('ope')->name('ope.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profil-sekolah', [SchoolProfileController::class, 'index'])->name('school-profile.index');
    Route::get('/profil-sekolah/edit', [SchoolProfileController::class, 'edit'])->name('school-profile.edit');
    Route::put('/profil-sekolah', [SchoolProfileController::class, 'update'])->name('school-profile.update');
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('extracurriculars', ExtracurricularController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('students', StudentController::class);
});
