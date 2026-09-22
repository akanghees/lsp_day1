<!-- ============================================
                 EKSTRAKULIKULER
            ============================================ -->
<section class="section-pad bg-white" id="extracurricular">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width:640px;" data-aos="fade-up">
            <span class="eyebrow"><i class="bi bi-star-fill"></i> Kegiatan Siswa</span>
            <h2 class="section-title mt-3" style="font-size:clamp(1.8rem,3.2vw,2.5rem);">Ekstrakulikuler &amp; Pengembangan Diri</h2>
            <p class="section-sub mx-auto mt-2">Wadah pembentukan karakter, bakat, dan jiwa kepemimpinan siswa {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}.</p>
        </div>
        <div class="row g-4">
            @forelse($extracurriculars as $index => $item)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="cause-card">
                        <div class="cause-img">
                            <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=600&h=420&fit=crop&auto=format' }}"
                                alt="{{ $item->name }}" loading="lazy">
                            <span class="cause-tag"><i class="bi bi-people-fill me-1"></i> Ekskul</span>
                        </div>
                        <div class="cause-body">
                            <h5 class="font-display fw-bold">{{ $item->name }}</h5>
                            <p class="text-muted small mb-3">
                                {{ Str::limit($item->description ?? 'Kegiatan pembinaan bakat dan minat siswa secara berkelanjutan.', 100) }}
                            </p>
                            @if($item->schedule)
                                <div class="small text-secondary mb-1">
                                    <i class="bi bi-calendar-event me-1"></i> <strong>Jadwal:</strong> {{ $item->schedule }}
                                </div>
                            @endif
                            @if($item->coach)
                                <div class="small text-secondary mb-3">
                                    <i class="bi bi-person-badge me-1"></i> <strong>Pembina:</strong> {{ $item->coach }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <!-- Fallback items when DB is empty -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="cause-card">
                        <div class="cause-img">
                            <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=600&h=420&fit=crop&auto=format"
                                alt="Pramuka" loading="lazy">
                            <span class="cause-tag">Kepanduan</span>
                        </div>
                        <div class="cause-body">
                            <h5 class="font-display fw-bold">Pramuka (Praja Muda Karana)</h5>
                            <p class="text-muted small mb-3">Membentuk karakter kepemimpinan, kedisiplinan, dan kepedulian sosial siswa.</p>
                            <div class="small text-secondary mb-1"><i class="bi bi-calendar-event me-1"></i> <strong>Jadwal:</strong> Jumat Sore</div>
                            <div class="small text-secondary mb-3"><i class="bi bi-person-badge me-1"></i> <strong>Pembina:</strong> Pembina Pramuka</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="cause-card">
                        <div class="cause-img">
                            <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?w=600&h=420&fit=crop&auto=format"
                                alt="Paskibra" loading="lazy">
                            <span class="cause-tag">Paskibra</span>
                        </div>
                        <div class="cause-body">
                            <h5 class="font-display fw-bold">Paskibraka Sekolah</h5>
                            <p class="text-muted small mb-3">Latihan baris-berbaris dan penanaman jiwa nasionalisme tinggi.</p>
                            <div class="small text-secondary mb-1"><i class="bi bi-calendar-event me-1"></i> <strong>Jadwal:</strong> Sabtu Pagi</div>
                            <div class="small text-secondary mb-3"><i class="bi bi-person-badge me-1"></i> <strong>Pembina:</strong> Pembina Paskibra</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="cause-card">
                        <div class="cause-img">
                            <img src="https://images.unsplash.com/photo-1526676037777-05a232554f77?w=600&h=420&fit=crop&auto=format"
                                alt="Futsal & Olahraga" loading="lazy">
                            <span class="cause-tag">Olahraga</span>
                        </div>
                        <div class="cause-body">
                            <h5 class="font-display fw-bold">Futsal &amp; Sepak Bola</h5>
                            <p class="text-muted small mb-3">Mengembangkan potensi keolahragaan dan semangat sportivitas bertanding.</p>
                            <div class="small text-secondary mb-1"><i class="bi bi-calendar-event me-1"></i> <strong>Jadwal:</strong> Rabu &amp; Sabtu</div>
                            <div class="small text-secondary mb-3"><i class="bi bi-person-badge me-1"></i> <strong>Pembina:</strong> Guru Olahraga</div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
