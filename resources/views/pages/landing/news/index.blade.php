<!-- ============================================
                 BERITA & INFORMASI SEKOLAH
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

<section class="section-pad position-relative" id="news" style="background:#f8fafc;">
    <div class="container">
        <!-- Section Header with View All Button -->
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-5" data-aos="fade-up">
            <div>
                <span class="sp-eyebrow"><i class="bi bi-newspaper"></i> Informasi Terkini</span>
                <h2 class="sp-title mt-2 mb-0">Berita &amp; Pengumuman Terbaru</h2>
                <p class="text-muted mt-2 mb-0" style="max-width: 580px;">Dapatkan info terkini seputar kegiatan akademik, prestasi, dan agenda sekolah.</p>
            </div>
            <div class="mt-3 mt-md-0 d-none d-md-block">
                <a href="{{ route('news.index') }}" class="btn-hw-primary px-4 py-2 text-nowrap">
                    Lihat Semua Berita <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="row g-4">
            @forelse($newsList as $index => $news)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
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
                            <h5 class="fw-bold mb-3" style="font-size: 1.1rem; line-height: 1.4;">
                                <a href="{{ route('news.show', $news->slug ?? $news->id) }}" class="news-title-link">
                                    {{ $news->title }}
                                </a>
                            </h5>
                            <p class="text-muted small mb-4 flex-grow-1" style="line-height: 1.6;">
                                {{ Str::limit(strip_tags($news->content), 110) }}
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
                <!-- Fallback sample news when DB is empty -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="news-card h-100 d-flex flex-column shadow-sm">
                        <a href="{{ route('news.index') }}" class="news-card-img-box d-block">
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=600&h=400&fit=crop&auto=format"
                                alt="Penerimaan Siswa Baru" class="news-card-img" loading="lazy">
                            <span class="news-category-badge">Pengumuman</span>
                        </a>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="text-muted small mb-2"><i class="bi bi-calendar3 text-primary me-1"></i> {{ date('d F Y') }}</div>
                            <h5 class="fw-bold mb-3" style="font-size: 1.1rem;">
                                <a href="{{ route('news.index') }}" class="news-title-link">Informasi PPDB Tahun Ajaran Baru</a>
                            </h5>
                            <p class="text-muted small mb-4 flex-grow-1">Pendaftaran Peserta Didik Baru (PPDB) resmi dibuka. Simak persyaratan dan alur pendaftarannya di sini.</p>
                            <div>
                                <a href="{{ route('news.index') }}" class="news-read-link">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-card h-100 d-flex flex-column shadow-sm">
                        <a href="{{ route('news.index') }}" class="news-card-img-box d-block">
                            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=600&h=400&fit=crop&auto=format"
                                alt="Prestasi Siswa" class="news-card-img" loading="lazy">
                            <span class="news-category-badge">Prestasi</span>
                        </a>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="text-muted small mb-2"><i class="bi bi-calendar3 text-primary me-1"></i> {{ date('d F Y') }}</div>
                            <h5 class="fw-bold mb-3" style="font-size: 1.1rem;">
                                <a href="{{ route('news.index') }}" class="news-title-link">Siswa SMKN 1 Talaga Raih Juara LKS</a>
                            </h5>
                            <p class="text-muted small mb-4 flex-grow-1">Selamat atas keberhasilan perwakilan siswa yang meraih juara pada Lomba Kompetensi Siswa (LKS) Tingkat Kabupaten.</p>
                            <div>
                                <a href="{{ route('news.index') }}" class="news-read-link">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="news-card h-100 d-flex flex-column shadow-sm">
                        <a href="{{ route('news.index') }}" class="news-card-img-box d-block">
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=600&h=400&fit=crop&auto=format"
                                alt="Workshop Industri" class="news-card-img" loading="lazy">
                            <span class="news-category-badge">Kegiatan</span>
                        </a>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="text-muted small mb-2"><i class="bi bi-calendar3 text-primary me-1"></i> {{ date('d F Y') }}</div>
                            <h5 class="fw-bold mb-3" style="font-size: 1.1rem;">
                                <a href="{{ route('news.index') }}" class="news-title-link">Kunjungan Industri &amp; Guru Tamu</a>
                            </h5>
                            <p class="text-muted small mb-4 flex-grow-1">Kegiatan penyelarasan kurikulum bersama praktisi dunia kerja untuk meningkatkan kualitas lulusan.</p>
                            <div>
                                <a href="{{ route('news.index') }}" class="news-read-link">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        
        <!-- Bottom View All Button on Mobile -->
        <div class="text-center mt-5 d-md-none">
            <a href="{{ route('news.index') }}" class="btn-hw-primary px-4 py-2">
                Lihat Semua Berita <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

