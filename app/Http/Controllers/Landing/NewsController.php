<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Menampilkan daftar seluruh berita & pengumuman.
     */
    public function index(Request $request)
    {
        $schoolProfile = SchoolProfile::first();
        $categories = Category::withCount('news')->get();

        $query = News::with('category')
            ->whereNotNull('published_at')
            ->latest('published_at');

        // Filter berdasarkan kategori jika ada
        if ($request->has('category') && !empty($request->category)) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category)->orWhere('id', $request->category);
            });
        }

        // Search query jika ada
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $newsList = $query->paginate(9)->withQueryString();

        return view('pages.landing.news.list', compact('newsList', 'categories', 'schoolProfile'));
    }

    /**
     * Menampilkan detail halaman berita.
     */
    public function show($slugOrId)
    {
        $schoolProfile = SchoolProfile::first();

        $news = News::with('category')
            ->where('slug', $slugOrId)
            ->orWhere('id', $slugOrId)
            ->firstOrFail();

        // Berita terkait / terbaru lainnya
        $relatedNews = News::with('category')
            ->where('id', '!=', $news->id)
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.landing.news.show', compact('news', 'relatedNews', 'schoolProfile'));
    }
}
