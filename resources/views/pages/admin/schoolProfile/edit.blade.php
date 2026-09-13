@extends('layouts.admin.app')
@section('content')

@section('content')
    <main class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Profil Sekolah</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('ope.dashboard') }}"><i
                                    class="bi bi-house-door-fill"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profil Sekolah</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('ope.school-profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xl-9 mx-auto">

                    <h6 class="mb-0 text-uppercase">Informasi Umum</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="school_name" class="form-label">Nama Sekolah</label>
                                <input type="text" class="form-control @error('school_name') is-invalid @enderror"
                                    id="school_name" name="school_name"
                                    value="{{ old('school_name', $schoolProfile->school_name) }}"
                                    placeholder="Contoh: SMK Negeri 1 Contoh">
                                @error('school_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="npsn" class="form-label">NPSN</label>
                                <input type="text" class="form-control @error('npsn') is-invalid @enderror"
                                    id="npsn" name="npsn" value="{{ old('npsn', $schoolProfile->npsn) }}"
                                    placeholder="Nomor Pokok Sekolah Nasional">
                                @error('npsn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="principal_name" class="form-label">Nama Kepala Sekolah</label>
                                <input type="text" class="form-control @error('principal_name') is-invalid @enderror"
                                    id="principal_name" name="principal_name"
                                    value="{{ old('principal_name', $schoolProfile->principal_name) }}"
                                    placeholder="Nama lengkap kepala sekolah">
                                @error('principal_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                                    placeholder="Alamat lengkap sekolah">{{ old('address', $schoolProfile->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-0 text-uppercase">Kontak</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone', $schoolProfile->phone) }}"
                                        placeholder="08xxxxxxxxxx">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $schoolProfile->email) }}"
                                        placeholder="sekolah@contoh.sch.id">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="website" class="form-label">Website</label>
                                    <input type="text" class="form-control @error('website') is-invalid @enderror"
                                        id="website" name="website" value="{{ old('website', $schoolProfile->website) }}"
                                        placeholder="www.contoh.sch.id">
                                    @error('website')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-0 text-uppercase">Profil Naratif</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="history" class="form-label">Sejarah Sekolah</label>
                                <textarea class="form-control @error('history') is-invalid @enderror" id="history" name="history" rows="4">{{ old('history', $schoolProfile->history) }}</textarea>
                                @error('history')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="vision" class="form-label">Visi</label>
                                <textarea class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision" rows="3">{{ old('vision', $schoolProfile->vision) }}</textarea>
                                @error('vision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="mission" class="form-label">Misi</label>
                                <textarea class="form-control @error('mission') is-invalid @enderror" id="mission" name="mission" rows="4">{{ old('mission', $schoolProfile->mission) }}</textarea>
                                @error('mission')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-0 text-uppercase">Logo & Foto Sekolah</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="logo" class="form-label">Logo Sekolah</label>
                                    @if ($schoolProfile->logo)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $schoolProfile->logo) }}" alt="Logo sekolah"
                                                class="img-thumbnail" style="max-height: 120px;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                        id="logo" name="logo" accept="image/*">
                                    <small class="text-secondary">Kosongkan jika tidak ingin mengganti logo. Maks.
                                        2MB.</small>
                                    @error('logo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="school_photo" class="form-label">Foto Sekolah</label>
                                    @if ($schoolProfile->school_photo)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $schoolProfile->school_photo) }}"
                                                alt="Foto sekolah" class="img-thumbnail" style="max-height: 120px;">
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="form-control @error('school_photo') is-invalid @enderror"
                                        id="school_photo" name="school_photo" accept="image/*">
                                    <small class="text-secondary">Kosongkan jika tidak ingin mengganti foto. Maks.
                                        2MB.</small>
                                    @error('school_photo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-5">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check2-circle me-1"></i> Simpan Perubahan
                        </button>
                    </div>

                </div>
            </div>
        </form>

    </main>
@endsection
@endsection
