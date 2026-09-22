<header class="hero" id="home">
    <div class="hero-glow"></div>
    <span class="blob blob-1"></span>
    <span class="blob blob-2"></span>
    <span class="blob blob-3"></span>
    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="eyebrow"><i class="bi bi-award-fill"></i> NPSN: {{ $schoolProfile->npsn ?? '20213845' }}
                    &bull; Terakreditasi A</span>
                <h1 class="hero-title mt-4">Mencetak Generasi <span class="accent-underline">Unggul<svg
                            viewBox="0 0 200 14" preserveAspectRatio="none">
                            <path d="M2 10 Q 50 2 100 8 T 198 6" stroke="#F59E0B" stroke-width="5" fill="none"
                                stroke-linecap="round" />
                        </svg></span> &amp; Berkarakter.</h1>
                <p class="hero-lead mt-4">
                    {{ $schoolProfile->vision ?? 'Mewujudkan sekolah unggulan yang menghasilkan lulusan berakhlak mulia, cerdas, kreatif, dan siap bersaing di dunia industri.' }}
                </p>
                <div class="d-flex align-items-center gap-3 mt-5">
                    <div class="hero-avatars">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop&auto=format"
                            alt="Siswa">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&auto=format"
                            alt="Guru">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop&auto=format"
                            alt="Alumni">
                    </div>
                    <div>
                        <div class="fw-bold font-display" style="font-size:.9rem;">{{ $counts['students'] ?? 0 }}+
                            Peserta Didik</div>
                        <div class="text-muted" style="font-size:.8rem;">Terdaftar &amp; Aktif di
                            {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="120">
                <div class="hero-media">
                    <div class="hero-media-frame">
                        <img src="{{ $schoolProfile && $schoolProfile->school_photo ? asset('storage/' . $schoolProfile->school_photo) : 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=900&h=1000&fit=crop&auto=format' }}"
                            alt="Gedung Sekolah {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}" loading="lazy">
                    </div>
                    <div class="float-card float-card-1">
                        <span class="fc-icon"><i class="bi bi-person-workspace"></i></span>
                        <div>
                            <div class="fc-val">{{ $counts['teachers'] ?? 0 }}</div>
                            <div class="fc-label">Guru &amp; Staf</div>
                        </div>
                    </div>
                    <div class="float-card float-card-2">
                        <span class="fc-icon"><i class="bi bi-patch-check-fill"></i></span>
                        <div>
                            <div class="fc-val">100%</div>
                            <div class="fc-label">Terakreditasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
