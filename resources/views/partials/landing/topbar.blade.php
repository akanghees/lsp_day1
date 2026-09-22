<nav class="navbar navbar-expand-lg navbar-hw" id="mainNav">
    <div class="container">
        <a class="hw-logo" href="{{ route('landing.index') }}">
            @if (isset($schoolProfile) && $schoolProfile->logo)
                <img src="{{ asset('storage/' . $schoolProfile->logo) }}" alt="Logo"
                    style="height: 36px; margin-right: 8px;">
            @else
                <span class="hw-logo-mark"><i class="bi bi-mortarboard-fill"></i></span>
            @endif
            <span>{{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
            aria-label="Toggle navigation">
            <i class="bi bi-list fs-2"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav nav-hw mx-auto mt-3 mt-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.index') }}#home">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.index') }}#profile">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.index') }}#stats">Statistik</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.index') }}#extracurricular">Ekstrakulikuler</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('news.index') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.index') }}#gallery">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.index') }}#teachers">Guru</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.index') }}#contact">Kontak</a></li>
            </ul>

        </div>
    </div>
</nav>
