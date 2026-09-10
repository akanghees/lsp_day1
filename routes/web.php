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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
       Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
       Route::get('/profil-sekolah', [SchoolProfileController::class, 'edit'])->name('school-profile.edit');
       Route::resource('berita', NewsController::class)->names('news');
       Route::resource('kategori', CategoryController::class)->names('categories');
       Route::resource('ekstrakurikuler', ExtracurricularController::class)->names('extracurriculars');
       Route::resource('galeri', GalleryController::class)->names('galleries');
       Route::resource('guru', TeacherController::class)->names('teachers');
       Route::resource('siswa', StudentController::class)->names('students');
   });