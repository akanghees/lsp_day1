<!-- ============================================
                 PROFIL SEKOLAH / ABOUT
     ============================================ -->
<style>
/* School Profile Custom Styling */
.sp-collage-wrapper {
    position: relative;
    padding-bottom: 20px;
}

.sp-photo-frame {
    position: relative;
    width: 100%;
    height: 420px;
    border-radius: 24px;
    overflow: hidden;
    background: #f1f5f9;
    border: 4px solid #ffffff;
}

.sp-main-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.sp-photo-frame:hover .sp-main-img {
    transform: scale(1.03);
}

.sp-photo-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0) 60%, rgba(15,23,42,0.25) 100%);
    pointer-events: none;
}

/* Top Left Badge */
.sp-badge-npsn {
    position: absolute;
    top: 20px;
    left: 20px;
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 10px 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    z-index: 3;
    border: 1px solid rgba(255, 255, 255, 0.8);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1) !important;
}

.sp-npsn-icon {
    width: 38px;
    height: 38px;
    border-radius: 12px;
    background: #ecfdf5;
    color: #10b981;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.sp-badge-title {
    font-weight: 700;
    font-size: 0.88rem;
    color: #0f172a;
    line-height: 1.2;
}

.sp-badge-sub {
    font-size: 0.75rem;
    color: #64748b;
    font-weight: 500;
}

/* Bottom Right Logo Badge */
.sp-badge-logo {
    position: absolute;
    bottom: -15px;
    right: 15px;
    background: #ffffff;
    border-radius: 20px;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    gap: 14px;
    z-index: 3;
    border: 1px solid #e2e8f0;
    box-shadow: 0 20px 35px -10px rgba(15, 23, 42, 0.18) !important;
    max-width: 85%;
}

.sp-logo-box {
    width: 54px;
    height: 54px;
    min-width: 54px;
    border-radius: 14px;
    background: #f8fafc;
    border: 1px solid #f1f5f9;
    padding: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.sp-logo-box img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.sp-logo-name {
    font-weight: 700;
    font-size: 0.95rem;
    color: #0f172a;
    line-height: 1.2;
}

.sp-logo-tag {
    font-size: 0.78rem;
    color: #64748b;
    font-weight: 500;
    margin-top: 2px;
}

/* Right Content Styling */
.sp-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    background: #ecfdf5;
    color: #059669;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.82rem;
    text-transform: uppercase;
    letter-spacing: 0.04em;
}

.sp-title {
    font-size: clamp(1.8rem, 3.2vw, 2.5rem);
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.02em;
    line-height: 1.2;
}

.sp-history {
    color: #475569;
    font-size: 1.025rem;
    line-height: 1.75;
    white-space: pre-line;
}

/* Principal Executive Card */
.sp-principal-card {
    background: linear-gradient(135deg, #f0fdf4 0%, #eff6ff 100%);
    border-left: 4px solid #16a34a;
    border-radius: 16px;
    padding: 16px 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    border-top: 1px solid rgba(22, 163, 74, 0.1);
    border-right: 1px solid rgba(22, 163, 74, 0.1);
    border-bottom: 1px solid rgba(22, 163, 74, 0.1);
}

.sp-principal-avatar {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border-radius: 14px;
    background: #ffffff;
    color: #16a34a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    box-shadow: 0 4px 12px rgba(22, 163, 74, 0.15);
}

.sp-principal-label {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    color: #16a34a;
    text-transform: uppercase;
}

.sp-principal-name {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0f172a;
}

/* Feature Cards (Visi & Misi) */
.sp-feature-card {
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 18px;
    padding: 20px;
    transition: all 0.3s ease;
}

.sp-feature-card:hover {
    border-color: #cbd5e1;
    transform: translateY(-3px);
    box-shadow: 0 12px 25px -8px rgba(15, 23, 42, 0.08);
}

.sp-feature-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    margin-bottom: 12px;
}

.bg-primary-soft {
    background: #eff6ff;
}

.bg-success-soft {
    background: #ecfdf5;
}

.sp-feature-title {
    font-weight: 700;
    font-size: 1rem;
    color: #0f172a;
    margin-bottom: 8px;
}

.sp-feature-text {
    font-size: 0.88rem;
    color: #64748b;
    line-height: 1.6;
    white-space: pre-line;
}

/* Contact Bar */
.sp-contact-bar {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 14px 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 16px 24px;
    align-items: center;
}

.sp-contact-item {
    font-size: 0.88rem;
    color: #475569;
    display: flex;
    align-items: center;
}

.sp-contact-item a {
    color: #475569;
    text-decoration: none;
    transition: color 0.2s ease;
}

.sp-contact-item a:hover {
    color: #16a34a;
}

@media (max-width: 767.98px) {
    .sp-photo-frame {
        height: 300px;
    }
    .sp-badge-logo {
        position: relative;
        bottom: auto;
        right: auto;
        margin-top: 15px;
        max-width: 100%;
    }
    .sp-badge-npsn {
        top: 12px;
        left: 12px;
        padding: 8px 12px;
    }
}
</style>

<section class="section-pad bg-white position-relative" id="profile">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left Column: Visual Media Collage -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="sp-collage-wrapper">
                    <!-- Main Photo Frame -->
                    <div class="sp-photo-frame shadow-lg">
                        <img src="{{ $schoolProfile && $schoolProfile->school_photo ? asset('storage/' . $schoolProfile->school_photo) : 'https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?w=800&h=650&fit=crop&auto=format' }}"
                            alt="Foto {{ $schoolProfile->school_name ?? 'Sekolah' }}" 
                            class="sp-main-img" 
                            loading="lazy">
                        <div class="sp-photo-overlay"></div>
                    </div>

                    <!-- Top Left Badge: NPSN & Accreditation -->
                    <div class="sp-badge-npsn shadow-sm">
                        <div class="sp-npsn-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div>
                            <div class="sp-badge-title">NPSN: {{ $schoolProfile->npsn ?? '20213845' }}</div>
                            <div class="sp-badge-sub">Terakreditasi A</div>
                        </div>
                    </div>

                    <!-- Bottom Right Badge: Official Logo & School Name -->
                    <div class="sp-badge-logo shadow-lg">
                        <div class="sp-logo-box">
                            <img src="{{ $schoolProfile && $schoolProfile->logo ? asset('storage/' . $schoolProfile->logo) : 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=500&h=500&fit=crop&auto=format' }}"
                                alt="Logo {{ $schoolProfile->school_name ?? 'Sekolah' }}" 
                                loading="lazy">
                        </div>
                        <div class="sp-logo-info">
                            <div class="sp-logo-name">{{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}</div>
                            <div class="sp-logo-tag"><i class="bi bi-patch-check-fill text-primary me-1"></i> Profil Resmi</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Profile Information & Details -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="ps-lg-2">
                    <!-- Eyebrow Badge -->
                    <span class="sp-eyebrow">
                        <i class="bi bi-building"></i> Profil Sekolah
                    </span>
                    
                    <!-- School Name Title -->
                    <h2 class="sp-title mt-3 mb-3">
                        {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}
                    </h2>
                    
                    <!-- History / Description -->
                    <div class="sp-history mb-4">
                        {{ $schoolProfile->history ?? 'Sekolah kami berkomitmen untuk memberikan pendidikan berkualitas tinggi dan membekali siswa dengan keterampilan mandiri yang siap kerja di dunia industri.' }}
                    </div>
                    
                    <!-- Principal Executive Card -->
                    @if($schoolProfile && $schoolProfile->principal_name)
                        <div class="sp-principal-card mb-4 shadow-sm">
                            <div class="sp-principal-avatar">
                                <i class="bi bi-person-workspace"></i>
                            </div>
                            <div>
                                <div class="sp-principal-label">KEPALA SEKOLAH</div>
                                <div class="sp-principal-name">{{ $schoolProfile->principal_name }}</div>
                            </div>
                        </div>
                    @endif

                    <!-- Vision & Mission Feature Cards -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="sp-feature-card h-100">
                                <div class="sp-feature-icon bg-primary-soft text-primary">
                                    <i class="bi bi-compass-fill"></i>
                                </div>
                                <h5 class="sp-feature-title">Visi Sekolah</h5>
                                <p class="sp-feature-text mb-0">
                                    {{ $schoolProfile->vision ?? 'Mewujudkan lulusan yang beriman, bertakwa, berakhlak mulia, cerdas, dan kompetitif.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="sp-feature-card h-100">
                                <div class="sp-feature-icon bg-success-soft text-success">
                                    <i class="bi bi-rocket-takeoff-fill"></i>
                                </div>
                                <h5 class="sp-feature-title">Misi Sekolah</h5>
                                <p class="sp-feature-text mb-0">
                                    {{ $schoolProfile->mission ?? 'Menyelenggarakan pembelajaran berbasis kompetensi dan karakter yang relevan dengan kebutuhan industri.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Location & Contact Info Bar -->
                    <div class="sp-contact-bar">
                        <div class="sp-contact-item">
                            <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                            <span>{{ $schoolProfile->address ?? 'Jl. Raya Talaga No. 1, Majalengka' }}</span>
                        </div>
                        @if(!empty($schoolProfile->phone))
                            <div class="sp-contact-item">
                                <i class="bi bi-telephone-fill text-primary me-2"></i>
                                <a href="tel:{{ $schoolProfile->phone }}">{{ $schoolProfile->phone }}</a>
                            </div>
                        @endif
                        @if(!empty($schoolProfile->email))
                            <div class="sp-contact-item">
                                <i class="bi bi-envelope-fill text-warning me-2"></i>
                                <a href="mailto:{{ $schoolProfile->email }}">{{ $schoolProfile->email }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>