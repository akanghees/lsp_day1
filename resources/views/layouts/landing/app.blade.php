@extend('layoutslanding.heads')

<!-- ***** Preloader Start ***** -->
<div id="preloader" aria-hidden="true">
    <div class="preload-ring"><i class="bi bi-mortarboard-fill preload-heart"></i></div>
    <div class="preload-text">MEMUAT HALAMAN&hellip;</div>
</div>
<!-- ***** Preloader End ***** -->

@include('partials.landing.navbar')
@yild('content')
@include('layouts')
