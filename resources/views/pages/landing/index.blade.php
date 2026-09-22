@extends('layouts.landing.app')

@section('content')
    {{-- Section Hero --}}
    @include('pages.landing.home.index')

    {{-- Section Profil Sekolah --}}
    @include('pages.landing.schoolProfile.index')

    {{-- Section Data & Statistik --}}
    @include('pages.landing.counts.index')

    {{-- Section Ekstrakulikuler --}}
    @include('pages.landing.extracurricular.index')

    {{-- Section Berita & Pengumuman --}}
    @include('pages.landing.news.index')

    {{-- Section Galeri Foto --}}
    @include('pages.landing.gallery.index')

    {{-- Section Guru & Staf --}}
    @include('pages.landing.teacher.index')

    {{-- Section Kontak --}}
    @include('pages.landing.contact.index')
@endsection
