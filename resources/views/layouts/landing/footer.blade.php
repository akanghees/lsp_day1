<!-- ============================================
     FOOTER
============================================ -->
<footer class="footer-hw">
    <svg class="footer-wave" viewBox="0 0 1440 70" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
        aria-hidden="true">
        <path fill="#0B1220" d="M0,32 C240,70 480,0 720,18 C960,36 1200,70 1440,26 L1440,70 L0,70 Z"></path>
    </svg>
    <span class="footer-glow"></span>
    <span class="footer-glow-2"></span>
    <div class="container footer-top">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <a class="hw-logo text-white" href="#home">
                    @if(isset($schoolProfile) && $schoolProfile->logo)
                        <img src="{{ asset('storage/' . $schoolProfile->logo) }}" alt="Logo" style="height: 36px; margin-right: 8px;">
                    @else
                        <span class="hw-logo-mark"><i class="bi bi-mortarboard-fill"></i></span>
                    @endif
                    <span>{{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}</span>
                </a>
                <p class="mt-3">
                    Website Resmi {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}. Media publikasi informasi sekolah, berita, agenda kegiatan, galeri, dan layanan sistem informasi akademik.
                </p>
                <div class="footer-social mt-3">
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
                <div class="footer-badges mt-3">
                    <span class="footer-badge"><i class="bi bi-patch-check-fill"></i> NPSN: {{ $schoolProfile->npsn ?? '20213845' }}</span>
                    <span class="footer-badge"><i class="bi bi-shield-check"></i> Terakreditasi A</span>
                </div>
            </div>

            <div class="col-6 col-md-3 col-lg-2">
                <h6>Menu Utama</h6>
                <ul>
                    <li><a class="footer-link" href="#home"><i class="bi bi-caret-right-fill"></i>Beranda</a></li>
                    <li><a class="footer-link" href="#profile"><i class="bi bi-caret-right-fill"></i>Profil Sekolah</a></li>
                    <li><a class="footer-link" href="#stats"><i class="bi bi-caret-right-fill"></i>Statistik</a></li>
                    <li><a class="footer-link" href="#extracurricular"><i class="bi bi-caret-right-fill"></i>Ekstrakulikuler</a></li>
                    <li><a class="footer-link" href="#news"><i class="bi bi-caret-right-fill"></i>Berita</a></li>
                    <li><a class="footer-link" href="#gallery"><i class="bi bi-caret-right-fill"></i>Galeri</a></li>
                    <li><a class="footer-link" href="#teachers"><i class="bi bi-caret-right-fill"></i>Guru &amp; Staf</a></li>
                    <li><a class="footer-link" href="#contact"><i class="bi bi-caret-right-fill"></i>Kontak</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3 col-lg-2">
                <h6>Akses Layanan</h6>
                <ul>
                    @auth
                        <li><a class="footer-link" href="{{ route('dashboard') }}"><i class="bi bi-caret-right-fill"></i>Dashboard Admin</a></li>
                    @else
                        <li><a class="footer-link" href="{{ route('login') }}"><i class="bi bi-caret-right-fill"></i>Login Operator / Admin</a></li>
                    @endauth
                    <li><a class="footer-link" href="#contact"><i class="bi bi-caret-right-fill"></i>Pusat Bantuan</a></li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-4">
                <h6>Kontak Kami</h6>
                <div class="footer-contact-item">
                    <span class="ic"><i class="bi bi-geo-alt-fill"></i></span>
                    <span>{{ $schoolProfile->address ?? 'Jl. Raya Talaga No. 1, Majalengka, Jawa Barat' }}</span>
                </div>
                <div class="footer-contact-item">
                    <span class="ic"><i class="bi bi-envelope-fill"></i></span>
                    <span>{{ $schoolProfile->email ?? 'info@smkn1talaga.sch.id' }}</span>
                </div>
                <div class="footer-contact-item">
                    <span class="ic"><i class="bi bi-telephone-fill"></i></span>
                    <span>{{ $schoolProfile->phone ?? '(0233) 888-1234' }}</span>
                </div>
            </div>
        </div>

        <div class="footer-divider"></div>
        <div class="footer-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <div>&copy; {{ date('Y') }} {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}. All rights reserved.</div>
            </div>
            <div class="text-md-end">
                <div>Dikembangkan untuk LSP Ujikom &bull; Media Informasi Sekolah</div>
            </div>
        </div>
    </div>
</footer>

<!-- ============================================
     SCROLL TO TOP
============================================ -->
<div id="scrollTop" role="button" aria-label="Scroll to top" tabindex="0">
    <svg viewBox="0 0 52 52">
        <circle cx="26" cy="26" r="23"></circle>
        <circle class="progress" cx="26" cy="26" r="23"></circle>
    </svg>
    <i class="bi bi-arrow-up"></i>
</div>

<!-- Bootstrap Bundle -->
<script src="{{ asset('landing/assets/bootstrap.bundle.min.js') }}"></script>
<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('landing/assets/script.js') }}"></script>

</body>

</html>
