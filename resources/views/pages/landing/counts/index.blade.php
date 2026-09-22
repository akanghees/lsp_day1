<!-- ============================================
                 STATISTIK SEKOLAH
            ============================================ -->
<section class="section-pad pt-0" id="stats">
    <div class="container">
        <div class="stats-band" data-aos="zoom-in">
            <div class="row g-0">
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-num"><span class="counter" data-target="{{ $counts['students'] ?? 0 }}">{{ $counts['students'] ?? 0 }}</span>+</div>
                    <div class="stat-label">Peserta Didik</div>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-num"><span class="counter" data-target="{{ $counts['teachers'] ?? 0 }}">{{ $counts['teachers'] ?? 0 }}</span>+</div>
                    <div class="stat-label">Guru &amp; Staf</div>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-num"><span class="counter" data-target="{{ $counts['extracurriculars'] ?? 0 }}">{{ $counts['extracurriculars'] ?? 0 }}</span>+</div>
                    <div class="stat-label">Ekstrakulikuler</div>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-num">100%</div>
                    <div class="stat-label">Terakreditasi A</div>
                </div>
            </div>
        </div>
    </div>
</section>
