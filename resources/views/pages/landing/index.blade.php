@extends('layouts.landing.app')
@section('content')

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>{{ $schoolProfile->name ?? 'Nama Sekolah' }}</h2>
                                        <p>{{ Str::limit($schoolProfile->description ?? 'Selamat datang di website resmi sekolah kami.', 200) }}</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="white-button first-button scroll-to-section">
                                            <a href="#about">Profil Sekolah</a>
                                        </div>
                                        <div class="white-button scroll-to-section">
                                            <a href="#news">Berita Terbaru</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                @if ($schoolProfile && $schoolProfile->logo)
                                    <img src="{{ Storage::url($schoolProfile->logo) }}" alt="{{ $schoolProfile->name }}">
                                @else
                                    <img src="{{ asset('assets/images/slider-dec.png') }}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="extracurriculars" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4>Ekstrakurikuler <em>Unggulan</em> Kami</h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
                        <p>Kembangkan bakat dan minatmu lewat berbagai kegiatan ekstrakurikuler yang tersedia di sekolah
                            kami.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @forelse ($extracurriculars as $item)
                    <div class="col-lg-3">
                        <div class="service-item first-service">
                            <div class="icon"></div>
                            <h4>{{ $item->name }}</h4>
                            <p>{{ Str::limit($item->description ?? 'Kegiatan ekstrakurikuler sekolah.', 90) }}</p>
                            <div class="text-button">
                                <a href="{{ route('extracurriculars.public.index') }}">Lihat Semua <i
                                        class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 text-center">
                        <p>Belum ada data ekstrakurikuler.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="section-heading">
                        <h4>Profil <em>Sekolah Kami</em></h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
                        <p>{{ $schoolProfile->description ?? 'Belum ada deskripsi profil sekolah.' }}</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="javascript:;">{{ $counts['teachers'] }} Guru</a></h4>
                                <p>Tenaga pengajar aktif</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="javascript:;">{{ $counts['students'] }} Siswa</a></h4>
                                <p>Peserta didik aktif</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="javascript:;">{{ $counts['extracurriculars'] }} Ekskul</a></h4>
                                <p>Kegiatan tersedia</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="javascript:;">{{ $schoolProfile->address ?? '-' }}</a></h4>
                                <p>Alamat sekolah</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p>Hubungi kami di {{ $schoolProfile->phone ?? '-' }} atau
                                {{ $schoolProfile->email ?? '-' }} untuk informasi pendaftaran lebih lanjut.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-image">
                        <img src="{{ asset('assets/images/about-right-dec.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="news" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>Berita <em>Terbaru</em> Sekolah</h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
                        <p>Ikuti terus informasi dan kegiatan terbaru dari sekolah kami.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @forelse ($newsList as $news)
                    <div class="col-lg-4">
                        <div class="card h-100">
                            @if ($news->image)
                                <img src="{{ Storage::url($news->image) }}" class="card-img-top" alt="{{ $news->title }}"
                                    style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                @if ($news->category)
                                    <span class="badge bg-primary mb-2">{{ $news->category->name }}</span>
                                @endif
                                <h5 class="card-title">{{ $news->title }}</h5>
                                <p class="card-text text-muted small">
                                    {{ $news->published_at->translatedFormat('d M Y') }}
                                </p>
                                <a href="{{ route('news.public.show', $news->slug) }}" class="btn btn-sm btn-outline-primary">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 text-center">
                        <p>Belum ada berita.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div id="gallery" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>Galeri <em>Kegiatan</em> Sekolah</h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
                        <p>Dokumentasi momen dan kegiatan di lingkungan sekolah kami.</p>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                @forelse ($galleries as $item)
                    <div class="col-lg-4 col-md-6">
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}"
                            class="img-fluid rounded" style="height: 220px; width: 100%; object-fit: cover;">
                    </div>
                @empty
                    <div class="col-lg-12 text-center">
                        <p>Belum ada foto galeri.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection