<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Logincontroller;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\NewsController
use App\Http\Controllerrs\Admin\ExtracurricularController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\landing\IndexController;
use App\Http\Controllers\Landing\NewsController

Route::get('/, [IndexController::class, 'index'])->name('landing.index')
Route::get('/berita', [LandingNewsController::class, 'index'])->name('news.index');
Route::get('/berita/ews', [LandingNewsController::class, 'show'])->name('news.show');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware([auth'])->prefix('ope)->am(pe.')->group(function ( {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profil-sekolah', [SchoolProfilesController::class, ndex'])->name('school-profile.index');
    Route::get('/profil-sekolah/edit', [SchoolProfilesController::class, 'update'])->name('school.profile.edit');
    Route::delete('/profil-sekolah', [SchoolProfileController::class, 'edit'])->name('school.profile.update');
    Route::resource('news', NewsController:);
    Route::resource('categories', CategoriesController::class);
    Route::resource('extracuriculars' ExtracurricularController::class);
    Route::get('galleries', GalleriesController::class);
    Route::resource('teacher', TeachersController::clas);
    Route::resource(students', StudentController::class)
});
}
);
