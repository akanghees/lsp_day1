@extends('layouts.landing.app')

@section('content')
<style>
.article-header {
    background: linear-gradient(180deg, #effdf4 0%, #ffffff 100%);
    padding-top: 110px;
    padding-bottom: 40px;
}

.article-cover {
    width: 100%;
    max-height: 480px;
    border-radius: 24px;
    overflow: hidden;
    background: #f1f5f9;
    box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.12);
}

.article-cover img {
    width: 100%;
    height: 100%;
    max-height: 480px;
    object-fit: cover;
}

.article-body {
    color: #334155;
    font-size: 1.1rem;
    line-height: 1.85;
    white-space: pre-line;
}

.article-body p {
    margin-bottom: 1.5rem;
}

.share-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    text-decoration: none;
    transition: transform 0.2s ease, opacity 0.2s ease;
}

.share-btn:hover {
    transform: translateY(-3px);
    color: #ffffff;
    opacity: 0.9;
}
</style>

<!-- ============================================
     ARTICLE HERO HEADER
============================================ -->
<header class="article-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-3" data-aos="fade-up">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news.index') }}" class="text-decoration-none text-muted">Berita</a></li>
                        <li class="breadcrumb-item active text-success fw-semibold" aria-current="page">{{ Str::limit($news->title, 35) }}</li>
                    </ol>
                </nav>

                <!-- Category Badge -->
                @if($news->category)
                    <span class="sp-eyebrow mb-3" data-aos="fade-up" data-aos-delay="60">
                        <i class="bi bi-tag-fill"></i> {{ $news->category->name }}
                    </span>
                @endif

                <!-- Article Title -->
                <h1 class="sp-title my-3 display-5" data-aos="fade-up" data-aos-delay="100">
                    {{ $news->title }}
                </h1>

                <!-- Article Meta -->
                <div class="d-flex flex-wrap align-items-center gap-4 text-muted small mt-3 pb-2" data-aos="fade-up" data-aos-delay="140">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-success-subtle text-success p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                            <i class="bi bi-person-fill fs-5"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark">Humas {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}</div>
                            <div class="text-muted" style="font-size: 0.75rem;">Tim Redaksi</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <i class="bi bi-calendar3 text-primary fs-6"></i>
                        <span>{{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y, H:i') : \Carbon\Carbon::parse($news->created_at)->translatedFormat('d F Y') }} WIB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ============================================
     ARTICLE COVER & CONTENT
============================================ -->
<section class="pb-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Cover Image -->
                <div class="article-cover mb-5" data-aos="fade-up">
                    <img src="{{ $news->image ? asset('storage/' . $news->image) : 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=1200&h=700&fit=crop&auto=format' }}"
                        alt="{{ $news->title }}" loading="lazy">
                </div>

                <!-- Article Content Body -->
                <div class="row">
                    <div class="col-lg-8" data-aos="fade-up">
                        <div class="article-body">
                            {!! strip_tags($news->content) == $news->content ? nl2br(e($news->content)) : $news->content !!}
                        </div>

                        <!-- Share & Tag Footer -->
                        <div class="mt-5 pt-4 border-top d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div class="fw-bold text-dark">
                                <i class="bi bi-share me-1 text-success"></i> Bagikan Berita Ini:
                            </div>
                            <div class="d-flex gap-2">
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($news->title . ' - ' . url()->current()) }}" target="_blank" class="share-btn bg-success" title="Bagikan ke WhatsApp">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="share-btn bg-primary" title="Bagikan ke Facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->title) }}" target="_blank" class="share-btn bg-dark" title="Bagikan ke Twitter/X">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('news.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Berita
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar: Related News -->
                    <div class="col-lg-4 mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="p-4 rounded-4 bg-light border">
                            <h5 class="fw-bold mb-4 text-dark pb-2 border-bottom">
                                <i class="bi bi-newspaper text-success me-1"></i> Berita Terbaru Lainnya
                            </h5>
                            <div class="d-flex flex-column gap-3">
                                @forelse($relatedNews as $rel)
                                    <a href="{{ route('news.show', $rel->slug ?? $rel->id) }}" class="text-decoration-none text-dark d-flex gap-3 align-items-center group">
                                        <img src="{{ $rel->image ? asset('storage/' . $rel->image) : 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=200&h=200&fit=crop&auto=format' }}" 
                                             alt="{{ $rel->title }}" 
                                             class="rounded-3" 
                                             style="width: 70px; height: 70px; object-fit: cover;">
                                        <div>
                                            <div class="fw-bold small text-dark hover-text-success" style="line-height: 1.3;">
                                                {{ Str::limit($rel->title, 45) }}
                                            </div>
                                            <div class="text-muted small mt-1" style="font-size: 0.75rem;">
                                                <i class="bi bi-calendar3 me-1"></i>
                                                {{ $rel->published_at ? \Carbon\Carbon::parse($rel->published_at)->translatedFormat('d M Y') : \Carbon\Carbon::parse($rel->created_at)->translatedFormat('d M Y') }}
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-muted small mb-0">Belum ada berita lainnya.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
