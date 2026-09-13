<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);

        return view('pages.admin.teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('pages.admin.teacher.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip'      => 'required|string|max:30|unique:teachers,nip',
            'name'     => 'required|string|max:255',
            'gender'   => 'required|in:L,P',
            'subject'  => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['school_profile_id'] = SchoolProfile::firstOrFail()->id;

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        Teacher::create($validated);

        return redirect()
            ->route('ope.teacher.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }


    public function edit(Teacher $teacher)
    {
        return view('pages.admin.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'nip'      => ['required', 'string', 'max:30', Rule::unique('teachers', 'nip')->ignore($teacher->id)],
            'name'     => 'required|string|max:255',
            'gender'   => 'required|in:L,P',
            'subject'  => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($teacher->photo) {
                Storage::disk('public')->delete($teacher->photo);
            }
            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        $teacher->update($validated);

        return redirect()
            ->route('ope.teacher.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo) {
            Storage::disk('public')->delete($teacher->photo);
        }

        $teacher->delete();

        return redirect()
            ->route('ope.teacher.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}