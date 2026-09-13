@extends('layouts.admin.app')

@section('content')
    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ekstrakurikuler</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('ope.dashboard') }}"><i
                                    class="bi bi-house-door-fill"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ope.extracurriculars.index') }}">Ekstrakurikuler</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0">Detail Ekstrakurikuler</h5>
                    <a href="{{ route('ope.extracurriculars.edit', $extracurricular) }}"
                        class="btn btn-warning btn-sm ms-auto">
                        <i class="bi bi-pencil-fill"></i> Edit
                    </a>
                </div>

                @if ($extracurricular->image)
                    <img src="{{ Storage::url($extracurricular->image) }}" alt="{{ $extracurricular->name }}"
                        class="rounded mb-3" style="max-width: 300px;">
                @endif

                <table class="table table-borderless">
                    <tr>
                        <th style="width: 180px;">Nama</th>
                        <td>: {{ $extracurricular->name }}</td>
                    </tr>
                    <tr>
                        <th>Pembina</th>
                        <td>: {{ $extracurricular->coach ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jadwal</th>
                        <td>: {{ $extracurricular->schedule ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>: {{ $extracurricular->description ?? '-' }}</td>
                    </tr>
                </table>

                <a href="{{ route('ope.extracurriculars.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </main>
@endsection
