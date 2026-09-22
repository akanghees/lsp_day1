<!-- ============================================
                 GALERI FOTO SEKOLAH
     ============================================ -->
<style>
.gallery-card {
    position: relative;
    width: 100%;
    height: 320px;
    border-radius: 22px;
    overflow: hidden;
    background: #0f172a;
    box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.12);
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease;
}

.gallery-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.22);
}

.gallery-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.gallery-card:hover .gallery-card-img {
    transform: scale(1.08);
}

.gallery-card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(15, 23, 42, 0) 30%, rgba(15, 23, 42, 0.65) 65%, rgba(15, 23, 42, 0.95) 100%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 22px;
    color: #ffffff;
    z-index: 2;
    transition: background 0.3s ease;
}

.gallery-card:hover .gallery-card-overlay {
    background: linear-gradient(180deg, rgba(15, 23, 42, 0.1) 20%, rgba(15, 23, 42, 0.75) 60%, rgba(15, 23, 42, 0.98) 100%);
}

.gallery-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #ffffff;
    line-height: 1.35;
    margin-bottom: 6px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    word-break: break-word;
}

.gallery-desc {
    font-size: 0.85rem;
    color: #cbd5e1;
    opacity: 0.95;
    line-height: 1.5;
    word-break: break-word;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.gallery-badge-zoom {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    color: #059669;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    opacity: 0;
    transform: scale(0.8);
    transition: all 0.3s ease;
    z-index: 3;
}

.gallery-card:hover .gallery-badge-zoom {
    opacity: 1;
    transform: scale(1);
}

@media (max-width: 575.98px) {
    .gallery-card {
        height: 260px;
    }
    .gallery-card-overlay {
        padding: 16px;
    }
    .gallery-title {
        font-size: 1rem;
    }
}
</style>

<section class="section-pad bg-white" id="gallery">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width:640px;" data-aos="fade-up">
            <span class="sp-eyebrow"><i class="bi bi-images"></i> Dokumentasi</span>
            <h2 class="sp-title mt-3">Galeri Kegiatan Sekolah</h2>
            <p class="text-muted mx-auto mt-2">Kumpulan kebersamaan, suasana pembelajaran, dan momen berharga civitas akademika {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}.</p>
        </div>
        <div class="row g-4">
            @forelse($galleries as $index => $item)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                    <div class="gallery-card">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&h=500&fit=crop&auto=format' }}"
                            alt="{{ $item->title }}" class="gallery-card-img" loading="lazy">
                        <div class="gallery-badge-zoom">
                            <i class="bi bi-search"></i>
                        </div>
                        <div class="gallery-card-overlay">
                            <div class="gallery-title">{{ $item->title }}</div>
                            <div class="gallery-desc">{{ Str::limit($item->description ?? 'Dokumentasi kegiatan sekolah', 80) }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Fallback sample gallery items -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&h=500&fit=crop&auto=format" alt="Upacara Bendera" class="gallery-card-img" loading="lazy">
                        <div class="gallery-badge-zoom"><i class="bi bi-search"></i></div>
                        <div class="gallery-card-overlay">
                            <div class="gallery-title">Upacara Bendera Senin</div>
                            <div class="gallery-desc">Kedisiplinan &amp; Pembentukan Karakter Siswa</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="80">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=600&h=500&fit=crop&auto=format" alt="Praktikum Komputer" class="gallery-card-img" loading="lazy">
                        <div class="gallery-badge-zoom"><i class="bi bi-search"></i></div>
                        <div class="gallery-card-overlay">
                            <div class="gallery-title">Praktikum Komputer &amp; Lab</div>
                            <div class="gallery-desc">Pembelajaran Teknologi Berbasis Praktik</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="160">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600&h=500&fit=crop&auto=format" alt="Pembelajaran Di Kelas" class="gallery-card-img" loading="lazy">
                        <div class="gallery-badge-zoom"><i class="bi bi-search"></i></div>
                        <div class="gallery-card-overlay">
                            <div class="gallery-title">Suasana Belajar Mengajar</div>
                            <div class="gallery-desc">Interaksi Edukatif &amp; Kolaboratif</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=600&h=500&fit=crop&auto=format" alt="Kegiatan Pramuka" class="gallery-card-img" loading="lazy">
                        <div class="gallery-badge-zoom"><i class="bi bi-search"></i></div>
                        <div class="gallery-card-overlay">
                            <div class="gallery-title">Kegiatan Ekstrakulikuler</div>
                            <div class="gallery-desc">Pengembangan Kemampuan Karsa &amp; Karya</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="80">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=600&h=500&fit=crop&auto=format" alt="Perpustakaan Sekolah" class="gallery-card-img" loading="lazy">
                        <div class="gallery-badge-zoom"><i class="bi bi-search"></i></div>
                        <div class="gallery-card-overlay">
                            <div class="gallery-title">Perpustakaan &amp; Literasi</div>
                            <div class="gallery-desc">Fasilitas Penunjang Sumber Belajar Siswa</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="160">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&h=500&fit=crop&auto=format" alt="Gedung Sekolah" class="gallery-card-img" loading="lazy">
                        <div class="gallery-badge-zoom"><i class="bi bi-search"></i></div>
                        <div class="gallery-card-overlay">
                            <div class="gallery-title">Lingkungan Asri Sekolah</div>
                            <div class="gallery-desc">Suasana Lingkungan Belajar Nyaman &amp; Bersih</div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

