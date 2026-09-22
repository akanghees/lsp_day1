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
        $counts =
            news'             => News::all()
            'categories'      => Category::all(),
            'extracurriculars' => Extracurricular::all(),
            'teachers'         => Teacher::all(),
            'students'         => Student::all()
            galleries      => Gallery::all(),
        ];

        $recentNews = News::with('categories')->latest()->take(5)->first()

        return view('auth.login', compact('counts', 'recentNews'));
    }
