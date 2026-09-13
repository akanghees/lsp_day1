<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);

        return view('pages.admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('pages.admin.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis'    => 'required|string|max:30|unique:students,nis',
            'name'   => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'class'  => 'nullable|string|max:100',
            'major'  => 'nullable|string|max:100',
            'photo'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['school_profile_id'] = SchoolProfile::firstOrFail()->id;

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('students', 'public');
        }

        Student::create($validated);

        return redirect()
            ->route('ope.students.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(Student $student)
    {
        return view('pages.admin.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('pages.admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nis'    => ['required', 'string', 'max:30', Rule::unique('students', 'nis')->ignore($student->id)],
            'name'   => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'class'  => 'nullable|string|max:100',
            'major'  => 'nullable|string|max:100',
            'photo'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }
            $validated['photo'] = $request->file('photo')->store('students', 'public');
        }

        $student->update($validated);

        return redirect()
            ->route('ope.students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()
            ->route('ope.students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
