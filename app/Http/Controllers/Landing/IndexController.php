<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\News;
use App\Models\SchoolProfile;
use App\Models\Student;
use App\Models\Teacher;

class IndexController extends Controller
{
    public function index()
    {
        $schoolProfile = SchoolProfile::first();
        $extracurriculars = Extracurricular::latest()->take(4)->get();
        $newsList = News::with('category')->whereNotNull('published_at')->latest('published_at')->take(3)->get();
        $galleries = Gallery::latest()->take(6)->get();
        $teachers = Teacher::latest()->take(4)->get();

        $counts = [
            'teachers' => Teacher::count(),
            'students' => Student::count(),
            'extracurriculars' => Extracurricular::count(),
        ];

        return view('pages.landing.index', compact('schoolProfile', 'extracurriculars', 'newsList', 'galleries', 'counts', 'teachers'));
    }
}