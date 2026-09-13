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
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0">Detail Foto Galeri</h5>
                    <a href="{{ route('ope.galleries.edit', $gallery) }}" class="btn btn-warning btn-sm ms-auto">
                        <i class="bi bi-pencil-fill"></i> Edit
                    </a>
                </div>

                <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}" class="rounded mb-3"
                    style="max-width: 400px; width: 100%;">

                <table class="table table-borderless">
                    <tr>
                        <th style="width: 180px;">Judul</th>
                        <td>: {{ $gallery->title }}</td>
                    </tr>
                    <tr>
                        <th>Terkait Berita</th>
                        <td>:
                            @if ($gallery->news)
                                <a href="{{ route('ope.news.show', $gallery->news) }}">
                                    {{ $gallery->news->title }}
                                </a>
                            @else
                                <span class="text-muted">Tidak terkait berita</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>: {{ $gallery->description ?? '-' }}</td>
                    </tr>
                </table>

                <a href="{{ route('ope.galleries.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </main>
@endsection
