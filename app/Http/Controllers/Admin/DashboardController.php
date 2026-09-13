<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Student;
use App\Models\Teacher;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'news'             => News::count(),
            'categories'       => Category::count(),
            'extracurriculars' => Extracurricular::count(),
            'teachers'         => Teacher::count(),
            'students'         => Student::count(),
            'galleries'        => Gallery::count(),
        ];

        $recentNews = News::with('category')->latest()->take(5)->get();

        return view('pages.admin.dashboard', compact('counts', 'recentNews'));
    }
}