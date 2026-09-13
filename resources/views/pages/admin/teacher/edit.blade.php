@extends('layouts.admin.app')

@section('content')
    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Guru</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('ope.dashboard') }}"><i
                                    class="bi bi-house-door-fill"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ope.teacher.index') }}">Guru</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card radius-10">
            <div class="card-body">
                <h5 class="mb-3">Edit Guru</h5>

                <form action="{{ route('ope.teacher.update', $teacher) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIP</label>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror"
                                value="{{ old('nip', $teacher->nip) }}">
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $teacher->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                <option value="L" @selected(old('gender', $teacher->gender) === 'L')>Laki-laki</option>
                                <option value="P" @selected(old('gender', $teacher->gender) === 'P')>Perempuan</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Mata Pelajaran</label>
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                                value="{{ old('subject', $teacher->subject) }}" placeholder="Contoh: Matematika">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" name="position"
                                class="form-control @error('position') is-invalid @enderror"
                                value="{{ old('position', $teacher->position) }}"
                                placeholder="Contoh: Wali Kelas XII RPL 1">
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto</label>

                        @if ($teacher->photo)
                            <div class="mb-2">
                                <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}" width="100"
                                    height="100" class="rounded-circle object-fit-cover d-block">
                                <small class="text-muted">Foto saat ini. Pilih file baru di bawah kalau mau
                                    ganti.</small>
                            </div>
                        @endif

                        <input type="file" name="photo" id="formFile"
                            class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Format JPG, JPEG, PNG, atau WEBP. Maks 2MB. Kosongkan kalau tidak
                            ingin mengganti foto.</small>
                        @error('photo')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('ope.teacher.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
