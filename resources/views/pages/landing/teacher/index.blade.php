<!-- ============================================
                 GURU & TENAGA KEPENDIDIKAN
     ============================================ -->
<style>
/* Teacher Card Full Photo Styling */
.teacher-card {
    position: relative;
    width: 100%;
    height: 360px;
    border-radius: 22px;
    overflow: hidden;
    background: #0f172a;
    box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.12);
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease;
}

.teacher-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.22);
}

.teacher-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.teacher-card:hover .teacher-card-img {
    transform: scale(1.06);
}

.teacher-card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(15, 23, 42, 0) 35%, rgba(15, 23, 42, 0.65) 65%, rgba(15, 23, 42, 0.95) 100%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 20px;
    color: #ffffff;
    z-index: 2;
}

.teacher-name {
    font-size: 1.05rem;
    font-weight: 700;
    color: #ffffff;
    line-height: 1.3;
    margin-bottom: 4px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.teacher-subject {
    font-size: 0.85rem;
    color: #fbbf24;
    font-weight: 600;
    margin-bottom: 2px;
}

.teacher-nip {
    font-size: 0.78rem;
    color: #cbd5e1;
    opacity: 0.9;
}

@media (max-width: 575.98px) {
    .teacher-card {
        height: 290px;
    }
    .teacher-card-overlay {
        padding: 14px;
    }
    .teacher-name {
        font-size: 0.92rem;
    }
}
</style>

<section class="section-pad" id="teachers" style="background:var(--clr-bg);">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width:640px;" data-aos="fade-up">
            <span class="eyebrow"><i class="bi bi-person-workspace"></i> Tenaga Pendidik</span>
            <h2 class="section-title mt-3" style="font-size:clamp(1.8rem,3.2vw,2.5rem);">Guru &amp; Staf Pengajar</h2>
            <p class="section-sub mx-auto mt-2">Didedikasikan oleh para pengajar profesional dan berpengalaman untuk membimbing siswa {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}.</p>
        </div>
        <div class="row g-4">
            @forelse($teachers as $index => $teacher)
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                    <div class="teacher-card">
                        <img src="{{ $teacher->photo ? asset('storage/' . $teacher->photo) : ($teacher->gender == 'P' ? 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&h=480&fit=crop&auto=format' : 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=480&fit=crop&auto=format') }}"
                            alt="{{ $teacher->name }}" class="teacher-card-img" loading="lazy">
                        <div class="teacher-card-overlay">
                            <div class="teacher-name">{{ $teacher->name }}</div>
                            <div class="teacher-subject">{{ $teacher->subject ?? $teacher->position ?? 'Tenaga Pendidik' }}</div>
                            <div class="teacher-nip">NIP: {{ $teacher->nip ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Fallback sample teachers -->
                <div class="col-6 col-md-3" data-aos="fade-up">
                    <div class="teacher-card">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=480&fit=crop&auto=format" alt="Guru 1" class="teacher-card-img" loading="lazy">
                        <div class="teacher-card-overlay">
                            <div class="teacher-name">Dra. Hj. Siti Nurjanah, M.Pd</div>
                            <div class="teacher-subject">Guru Bahasa Indonesia</div>
                            <div class="teacher-nip">NIP: 19750412 200003 2 001</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="80">
                    <div class="teacher-card">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=480&fit=crop&auto=format" alt="Guru 2" class="teacher-card-img" loading="lazy">
                        <div class="teacher-card-overlay">
                            <div class="teacher-name">Budi Santoso, S.Kom, M.T</div>
                            <div class="teacher-subject">Guru Produktif RPL &amp; TKJ</div>
                            <div class="teacher-nip">NIP: 19820815 200801 1 005</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="160">
                    <div class="teacher-card">
                        <img src="https://images.unsplash.com/photo-1580894732468-058401433556?w=400&h=480&fit=crop&auto=format" alt="Guru 3" class="teacher-card-img" loading="lazy">
                        <div class="teacher-card-overlay">
                            <div class="teacher-name">Rina Marlina, S.Pd</div>
                            <div class="teacher-subject">Guru Matematika</div>
                            <div class="teacher-nip">NIP: 19881102 201402 2 003</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="240">
                    <div class="teacher-card">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&h=480&fit=crop&auto=format" alt="Guru 4" class="teacher-card-img" loading="lazy">
                        <div class="teacher-card-overlay">
                            <div class="teacher-name">Ani Wijaya, S.Pd</div>
                            <div class="teacher-subject">Guru Bahasa Inggris</div>
                            <div class="teacher-nip">NIP: 19910320 201903 2 010</div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

