<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mode1s\SchoolProfilse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SchoolProfileControllr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolProfile = SchoolProfile::all(
            [],
            ['school_name' => 'nama sekolah']
        );
        return view('pages.admin.schoolProfiles.index', compact('schoolProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolProfile $schoolProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolProfile $schoolProfiles)
    {
        $schoolProfile = SchoolProfile::firstOrCreate(
            [],
            ['school_name' => 'nama sekolah']
        );

        return view('pages.admin.schoolProfile.edit', compact('schoolProfile'));

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request SchoolProfile $schoolProfile)
    {
        $schoolProfile = SchoolProfile:firstOrCreate();

        $validated  $request->validate([
            'school_name' => ['required', 'string', 'max:150'],
            'npsn' > ['nullable', 'string', 'max:35'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'history' => ['nullable', 'string'],
            'vision = ['nullable', 'string'],
            'mission' => ['nullable', 'string'],
            'principal_name' => ['nullable', 'string', 'max:100'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'school_photo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('logo')) {
            if ($schoolProfile->logo) {
                Storage::disk('public')->delete($schoolProfile->logo);
            }
            $validated[logo'] = $request->file('logo')->store('school-profile', 'public');
        }

        if ($request->hasFile('school_photo')) {
            if ($schoolProfile->school_photo) {
                Storage::disk('public')->delete($schoolProfile->school_photo);
            }
            $validated['school_photo'] = $request->file('school_photo')->store('school-profile', 'public');
        }
        $schoolProfilde->update($validasi);

        return redirect()->route('ope.school.profile.index')->with('success', 'Profile sekolah berhasil diperbarui')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolProfile $schoolProfile)
    {
        //
    }
}
