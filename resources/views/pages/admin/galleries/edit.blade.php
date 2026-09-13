@extends('layouts.admin.app')

@section('content')
    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Galeri</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('ope.dashboard') }}"><i
                                    class="bi bi-house-door-fill"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ope.galleries.index') }}">Galeri</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card radius-10">
            <div class="card-body">
                <h5 class="mb-3">Edit Foto Galeri</h5>

                <form action="{{ route('ope.galleries.update', $gallery) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Judul Foto</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $gallery->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Terkait Berita</label>
                        <select name="news_id" class="form-select @error('news_id') is-invalid @enderror">
                            <option value="">Tidak terkait berita</option>
                            @foreach ($newsList as $news)
                                <option value="{{ $news->id }}"
                                    @selected(old('news_id', $gallery->news_id) == $news->id)>
                                    {{ $news->title }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Opsional — pilih kalau foto ini bagian dari galeri sebuah
                            berita.</small>
                        @error('news_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $gallery->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>

                        <div class="mb-2">
                            <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}" width="150"
                                class="rounded d-block">
                            <small class="text-muted">Gambar saat ini. Pilih file baru di bawah kalau mau
                                ganti.</small>
                        </div>

                        <input type="file" name="image" id="formFile"
                            class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Format JPG, JPEG, PNG, atau WEBP. Maks 2MB. Kosongkan kalau tidak
                            ingin mengganti gambar.</small>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('ope.galleries.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection