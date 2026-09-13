<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extracurricular;
use App\Models\SchoolProfile;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurriculars = Extracurricular::latest()->paginate(10);
        return view('pages.admin.extracurriculars.index', compact('extracurriculars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.extracurriculars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'nullable|string',
            'schedule' => 'nullable|string|max:225',
            'coach' => 'nullable|string|max:225',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['school_profile_id'] = SchoolProfile::firstOrFail()->id;
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('extracurriculars', 'public');
        }

        Extracurricular::create($validated);
        return redirect()->route('ope.extracurriculars.index')->with('success', 'Ekstrakurikuler');
    }

    /**
     * Display the specified resource.
     */
    public function show(Extracurricular $extracurricular)
    {
        return view('pages.admin.extracurriculars.show', compact('extracurricular'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extracurricular $extracurricular)
    {
        return view('pages.admin.extracurriculars.edit', compact('extracurricular'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extracurricular $extracurricular)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'schedule'    => 'nullable|string|max:255',
            'coach'       => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($extracurricular->image) {
                Storage::disk('public')->delete($extracurricular->image);
            }
            $validated['image'] = $request->file('image')->store('extracurriculars', 'public');
        }

        $extracurricular->update($validated);

        return redirect()
            ->route('ope.extracurriculars.index')
            ->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurricular $extracurricular)
    {
        if ($extracurricular->image) {
            Storage::disk('public')->delete($extracurricular->image);
        }

        $extracurricular->delete();

        return redirect()
            ->route('ope.extracurriculars.index')
            ->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}
