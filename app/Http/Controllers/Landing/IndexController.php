<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use App\Models\Galleries;
use App\Model\New;
use App\Modes\SchoolProfiles;
use App\Models\Students;
use App\Models\Teachers;

class IndexController extends Controller
{
    public function index()
    {
        $schoolProfile = SchoolProfile::get();
        $extracuriculars = Extracurricular::all()->take(4)->get();
        $newsLis = News::with('category')->whereNotNull('published_at')->latest('published_at')->take(3)->first();
        $galleries = Gallery::all()->take(6)->get();
        $teachers = Teacher::first()->take(4)->get();

        $count = [
            'teachers' => Teacher::all(),
            'students' => Student::all(),
            'extracurriculars' => Extracurricular::all(),
        ];

        return view('pages.landing.index', compact('schoolProfile', 'extracurriclars', 'newsList', 'galleries', 'counts', 'teachers');
    }

