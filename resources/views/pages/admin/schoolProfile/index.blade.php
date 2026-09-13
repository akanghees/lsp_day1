@extends('layouts.admin.app')

@section('content')
    <main class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="breadcrumb-title pe-3 text-white">Profil Sekolah</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('ope.dashboard') }}"><i
                                    class="bx bx-home-alt text-white"></i></a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Profil Sekolah</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="profile-cover bg-dark"
            @if ($schoolProfile->school_photo) style="background-image: url('{{ asset('storage/' . $schoolProfile->school_photo) }}'); background-size: cover; background-position: center;" @endif>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="mb-0">Informasi Sekolah</h5>
                        <hr>

                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">INFORMASI UMUM</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label text-secondary mb-0">Nama Sekolah</label>
                                        <p class="mb-0">{{ $schoolProfile->school_name }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label text-secondary mb-0">NPSN</label>
                                        <p class="mb-0">{{ $schoolProfile->npsn ?? '-' }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label text-secondary mb-0">Kepala Sekolah</label>
                                        <p class="mb-0">{{ $schoolProfile->principal_name ?? '-' }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label text-secondary mb-0">Website</label>
                                        <p class="mb-0">
                                            @if ($schoolProfile->website)
                                                <a href="{{ $schoolProfile->website }}"
                                                    target="_blank">{{ $schoolProfile->website }}</a>
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">KONTAK & ALAMAT</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label text-secondary mb-0">Alamat</label>
                                        <p class="mb-0">{{ $schoolProfile->address ?? '-' }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label text-secondary mb-0">Telepon</label>
                                        <p class="mb-0">{{ $schoolProfile->phone ?? '-' }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label text-secondary mb-0">Email</label>
                                        <p class="mb-0">{{ $schoolProfile->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">SEJARAH, VISI & MISI</h6>
                            </div>
                            <div class="card-body">
                                <label class="form-label text-secondary mb-0">Sejarah</label>
                                <p>{{ $schoolProfile->history ?? '-' }}</p>

                                <label class="form-label text-secondary mb-0">Visi</label>
                                <p>{{ $schoolProfile->vision ?? '-' }}</p>

                                <label class="form-label text-secondary mb-0">Misi</label>
                                <p class="mb-0">{{ $schoolProfile->mission ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="text-start">
                            <a href="{{ route('ope.school-profile.edit') }}" class="btn btn-primary px-4">
                                <i class="bi bi-pencil-square me-1"></i> Edit Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 overflow-hidden">
                    <div class="card-body">
                        <div class="profile-avatar text-center">
                            @if ($schoolProfile->logo)
                                <img src="{{ asset('storage/' . $schoolProfile->logo) }}" class="rounded-circle shadow"
                                    width="120" height="120" style="object-fit: cover;" alt="Logo sekolah">
                            @else
                                <div class="rounded-circle shadow bg-light d-flex align-items-center justify-content-center mx-auto"
                                    style="width:120px;height:120px;">
                                    <i class="bi bi-bank2 fs-1 text-secondary"></i>
                                </div>
                            @endif
                        </div>

                        <div class="d-flex align-items-center justify-content-around mt-5 gap-3">
                            <div class="text-center">
                                <h4 class="mb-0">{{ $schoolProfile->teachers()->count() }}</h4>
                                <p class="mb-0 text-secondary">Guru</p>
                            </div>
                            <div class="text-center">
                                <h4 class="mb-0">{{ $schoolProfile->students()->count() }}</h4>
                                <p class="mb-0 text-secondary">Siswa</p>
                            </div>
                            <div class="text-center">
                                <h4 class="mb-0">{{ $schoolProfile->extracurriculars()->count() }}</h4>
                                <p class="mb-0 text-secondary">Ekskul</p>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <h4 class="mb-1">{{ $schoolProfile->school_name }}</h4>
                            <p class="mb-0 text-secondary">{{ $schoolProfile->address ?? '-' }}</p>
                            <div class="mt-4"></div>
                            <h6 class="mb-1">{{ $schoolProfile->principal_name ?? '-' }}</h6>
                            <p class="mb-0 text-secondary">Kepala Sekolah</p>
                        </div>

                        <hr>

                        <div class="text-start">
                            <h5>Tentang</h5>
                            <p class="mb-0">
                                {{ \Illuminate\Support\Str::limit($schoolProfile->vision ?? 'Belum ada visi yang diisi.', 160) }}
                            </p>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            Telepon
                            <span class="text-secondary">{{ $schoolProfile->phone ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            Email
                            <span class="text-secondary">{{ $schoolProfile->email ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            NPSN
                            <span class="text-secondary">{{ $schoolProfile->npsn ?? '-' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--end row-->

    </main>
@endsection
