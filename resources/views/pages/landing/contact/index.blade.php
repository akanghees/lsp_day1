<!-- ============================================
                 KONTAK SEKOLAH
            ============================================ -->
<section class="section-pad bg-white" id="contact">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width:640px;" data-aos="fade-up">
            <span class="eyebrow"><i class="bi bi-envelope-fill"></i> Hubungi Kami</span>
            <h2 class="section-title mt-3" style="font-size:clamp(1.8rem,3.2vw,2.5rem);">Kontak &amp; Informasi Sekolah</h2>
            <p class="section-sub mx-auto mt-2">Punya pertanyaan seputar informasi sekolah atau pendaftaran? Silakan hubungi kami.</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-5 contact-card" data-aos="fade-right">
                <div class="contact-info-item">
                    <span class="ic"><i class="bi bi-geo-alt-fill"></i></span>
                    <div>
                        <strong>Alamat Sekolah</strong>
                        <div class="text-muted small">{{ $schoolProfile->address ?? 'Jl. Raya Talaga No. 1, Kecamatan Talaga, Kabupaten Majalengka, Jawa Barat' }}</div>
                    </div>
                </div>
                <div class="contact-info-item">
                    <span class="ic"><i class="bi bi-envelope-fill"></i></span>
                    <div>
                        <strong>Email Resmi</strong>
                        <div class="text-muted small">{{ $schoolProfile->email ?? 'info@smkn1talaga.sch.id' }}</div>
                    </div>
                </div>
                <div class="contact-info-item">
                    <span class="ic"><i class="bi bi-telephone-fill"></i></span>
                    <div>
                        <strong>Telepon / WhatsApp</strong>
                        <div class="text-muted small">{{ $schoolProfile->phone ?? '(0233) 888-1234' }}</div>
                    </div>
                </div>
                <div class="contact-info-item">
                    <span class="ic"><i class="bi bi-globe"></i></span>
                    <div>
                        <strong>Website</strong>
                        <div class="text-muted small">{{ $schoolProfile->website ?? 'www.smkn1talaga.sch.id' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="contact-card">
                    <form id="contactForm" onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah terkirim.');">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold" for="cf-name">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-hw" id="cf-name"
                                    placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold" for="cf-email">Alamat Email</label>
                                <input type="email" class="form-control form-control-hw" id="cf-email"
                                    placeholder="nama@email.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold" for="cf-subject">Subjek / Perihal</label>
                                <input type="text" class="form-control form-control-hw" id="cf-subject"
                                    placeholder="Contoh: Pertanyaan PPDB / Informasi Sekolah">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold" for="cf-message">Pesan Anda</label>
                                <textarea class="form-control form-control-hw" id="cf-message" rows="4" placeholder="Tuliskan pesan atau pertanyaan Anda secara rinci..."
                                    required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-hw-primary w-100 justify-content-center">
                                    Kirim Pesan <i class="bi bi-send ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
