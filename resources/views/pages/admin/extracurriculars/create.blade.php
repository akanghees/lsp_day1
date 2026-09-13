@extends('layouts.admin.app')

@section('content')
    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ekstrakurikuler</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('ope.dashboard') }}"><i
                                    class="bi bi-house-door-fill"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ope.extracurriculars.index') }}">Ekstrakurikuler</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card radius-10">
            <div class="card-body">
                <h5 class="mb-3">Tambah Ekstrakurikuler</h5>

                <form action="{{ route('ope.extracurriculars.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Ekstrakurikuler</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pembina</label>
                            <input type="text" name="coach" class="form-control @error('coach') is-invalid @enderror"
                                value="{{ old('coach') }}" placeholder="Nama pembina/pelatih">
                            @error('coach')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jadwal</label>
                            <input type="text" name="schedule"
                                class="form-control @error('schedule') is-invalid @enderror" value="{{ old('schedule') }}"
                                placeholder="Contoh: Setiap Sabtu, 08.00 - 10.00">
                            @error('schedule')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar</label>
                        <input type="file" name="image" id="formFile"
                            class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Format JPG, JPEG, PNG, atau WEBP. Maks 2MB.</small>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('ope.extracurriculars.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
