<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }} - Website Resmi</title>
    <meta name="description"
        content="Website Resmi {{ $schoolProfile->school_name ?? 'SMKN 1 Talaga' }}. Media informasi profil sekolah, berita, kegiatan ekstrakulikuler, galeri, dan civitas akademika.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Nunito+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('landing/assets/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('landing/assets/style.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ $schoolProfile && $schoolProfile->logo ? asset('storage/' . $schoolProfile->logo) : asset('landing/assets/hand-heart.png') }}">
</head>

<body>
