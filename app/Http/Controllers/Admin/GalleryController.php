<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\News;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('news')->latest()->paginate(10);

        return view('pages.admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $newsList = News::orderBy('title')->get();

        return view('pages.admin.galleries.create', compact('newsList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'news_id'     => 'nullable|exists:news,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['school_profile_id'] = SchoolProfile::firstOrFail()->id;
        $validated['image'] = $request->file('image')->store('galleries', 'public');

        Gallery::create($validated);

        return redirect()
            ->route('ope.galleries.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function show(Gallery $gallery)
    {
        $gallery->load('news');

        return view('pages.admin.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        $newsList = News::orderBy('title')->get();

        return view('pages.admin.galleries.edit', compact('gallery', 'newsList'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'news_id'     => 'nullable|exists:news,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);
            $validated['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($validated);

        return redirect()
            ->route('ope.galleries.index')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()
            ->route('ope.galleries.index')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }
}
