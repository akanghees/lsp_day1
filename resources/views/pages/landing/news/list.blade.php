@extends('layouts.landing.app')

@section('content')
<!-- ============================================
     BLOG HERO / PAGE HEADER
============================================ -->
<style>
.news-card {
    border-radius: 20px;
    overflow: hidden;
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}

.news-card:hover {
    transform: translateY(-6px);
    border-color: #cbd5e1;
    box-shadow: 0 20px 35px -10px rgba(15, 23, 42, 0.12) !important;
}

.news-card-img-box {
    position: relative;
    height: 220px;
    overflow: hidden;
    background: #f1f5f9;
}

.news-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.news-card:hover .news-card-img {
    transform: scale(1.06);
}

.news-category-badge {
    position: absolute;
    top: 14px;
    right: 14px;
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    color: #059669;
    font-weight: 700;
    font-size: 0.75rem;
    padding: 6px 14px;
    border-radius: 50px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.news-title-link {
    color: #0f172a;
    text-decoration: none;
    transition: color 0.2s ease;
}

.news-card:hover .news-title-link,
.news-title-link:hover {
    color: #16a34a;
}

.news-read-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #16a34a;
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    margin-top: auto;
    transition: gap 0.2s ease;
}

.news-card:hover .news-read-link {
    gap: 10px;
}
</style>

<header class="blog-hero pt-5 pb-4" style="background: linear-gradient(180deg, #effdf4 0%, #ffffff 100%); margin-top: 70px;">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-up">
                <span class="sp-eyebrow"><i class="bi bi-journal-richtext"></i> Informasi &amp; Berita</span>
                <h1 class="sp-title mt-3 mb-3">Kabar Terbaru &amp; Pengumuman Sekolah</h1>
                <p class="text-muted fs-5 mb-0">Dapatkan informasi terkini mengenai kegiatan, prestasi, pengumuman, dan berita resmi {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}.</p>
            </div>
        </div>

        <!-- Filter Categories & Search Bar -->
        <div class="mt-4 pt-3 d-flex flex-wrap align-items-center justify-content-between gap-3" data-aos="fade-up" data-aos-delay="100">
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('news.index') }}" class="btn {{ !request('category') ? 'btn-success text-white' : 'btn-outline-secondary bg-white' }} rounded-pill px-3 py-2 text-sm fw-semibold">
                    Semua Kategori
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('news.index', ['category' => $cat->slug ?? $cat->id]) }}" 
                       class="btn {{ request('category') == ($cat->slug ?? $cat->id) ? 'btn-success text-white' : 'btn-outline-secondary bg-white' }} rounded-pill px-3 py-2 text-sm fw-semibold">
                        {{ $cat->name }} <span class="badge bg-light text-dark rounded-circle ms-1">{{ $cat->news_count }}</span>
                    </a>
                @endforeach
            </div>

            <!-- Search Form -->
            <form action="{{ route('news.index') }}" method="GET" class="d-flex gap-2 position-relative" style="min-width: 280px;">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded-pill pe-5 ps-4 py-2 border" placeholder="Cari berita..." value="{{ request('search') }}">
                    <button class="btn btn-success rounded-circle position-absolute end-0 top-0 bottom-0 m-1 z-3" type="submit" style="width: 36px; height: 36px; padding: 0;">
                        <i class="bi bi-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</header>

<!-- ============================================
     NEWS GRID LISTING
============================================ -->
<section class="section-pad pt-4 pb-5 bg-white">
    <div class="container">
        @if(request('search'))
            <div class="alert alert-info rounded-4 mb-4 d-flex align-items-center justify-content-between">
                <span>Hasil pencarian untuk: <strong>"{{ request('search') }}"</strong></span>
                <a href="{{ route('news.index') }}" class="btn btn-sm btn-outline-danger rounded-pill px-3">Hapus Filter</a>
            </div>
        @endif

        <div class="row g-4">
            @forelse($newsList as $index => $news)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                    <div class="news-card h-100 d-flex flex-column shadow-sm">
                        <a href="{{ route('news.show', $news->slug ?? $news->id) }}" class="news-card-img-box d-block">
                            <img src="{{ $news->image ? asset('storage/' . $news->image) : 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=600&h=400&fit=crop&auto=format' }}"
                                alt="{{ $news->title }}" class="news-card-img" loading="lazy">
                            @if($news->category)
                                <span class="news-category-badge">
                                    {{ $news->category->name }}
                                </span>
                            @endif
                        </a>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="text-muted small mb-2 d-flex align-items-center gap-1">
                                <i class="bi bi-calendar3 text-primary"></i>
                                <span>{{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') : \Carbon\Carbon::parse($news->created_at)->translatedFormat('d F Y') }}</span>
                            </div>
                            <h5 class="fw-bold mb-3" style="font-size: 1.15rem; line-height: 1.4;">
                                <a href="{{ route('news.show', $news->slug ?? $news->id) }}" class="news-title-link">
                                    {{ $news->title }}
                                </a>
                            </h5>
                            <p class="text-muted small mb-4 flex-grow-1" style="line-height: 1.6;">
                                {{ Str::limit(strip_tags($news->content), 120) }}
                            </p>
                            <div>
                                <a href="{{ route('news.show', $news->slug ?? $news->id) }}" class="news-read-link">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 py-5 text-center">
                    <div class="mb-3 display-1 text-muted"><i class="bi bi-newspaper"></i></div>
                    <h4 class="fw-bold text-dark">Belum Ada Berita</h4>
                    <p class="text-muted">Maaf, belum ada berita atau informasi yang dipublikasikan untuk kategori/pencarian ini.</p>
                    <a href="{{ route('news.index') }}" class="btn btn-success rounded-pill px-4 mt-2">Kembali ke Semua Berita</a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $newsList->links() }}
        </div>
    </div>
</section>
@endsection
