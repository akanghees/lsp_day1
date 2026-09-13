@extends('layouts.admin.app')
@section('content')
    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="bi bi-house-door-fill"></i> Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-6 g-3 mb-3">
            <div class="col">
                <div class="card radius-10 bg-tiffany mb-0">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        <h3 class="text-white">{{ $counts['news'] }}</h3>
                        <p class="mb-0 text-white">Berita</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-purple mb-0">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-tags-fill"></i>
                        </div>
                        <h3 class="text-white">{{ $counts['categories'] }}</h3>
                        <p class="mb-0 text-white">Kategori</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-orange mb-0">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <h3 class="text-white">{{ $counts['extracurriculars'] }}</h3>
                        <p class="mb-0 text-white">Ekstrakurikuler</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-success mb-0">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <h3 class="text-white">{{ $counts['teachers'] }}</h3>
                        <p class="mb-0 text-white">Guru</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-danger mb-0">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h3 class="text-white">{{ $counts['students'] }}</h3>
                        <p class="mb-0 text-white">Siswa</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-dark mb-0">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-images"></i>
                        </div>
                        <h3 class="text-white">{{ $counts['galleries'] }}</h3>
                        <p class="mb-0 text-white">Foto Galeri</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card radius-10">
                    <div class="card-header bg-transparent">
                        <div class="row g-3 align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Berita Terbaru</h5>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('ope.news.index') }}" class="btn btn-sm btn-primary">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Tanggal Terbit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($recentNews as $news)
                                        <tr>
                                            <td>{{ $news->title }}</td>
                                            <td>{{ $news->category->name ?? '-' }}</td>
                                            <td>
                                                {{ $news->published_at ? $news->published_at->translatedFormat('d M Y') : 'Belum terbit' }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Belum ada berita.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
