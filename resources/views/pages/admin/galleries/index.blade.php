@extends('layouts.admin.app')

@section('content')
    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Galeri</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('ope.dashboard') }}"><i
                                    class="bi bi-house-door-fill"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                    </ol>
                </nav>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Daftar Galeri</h5>
                    <a href="{{ route('ope.galleries.create') }}" class="btn btn-primary ms-auto">
                        <i class="bi bi-plus-lg"></i> Tambah Foto
                    </a>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Terkait Berita</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($galleries->currentPage() - 1) * $galleries->perPage() }}
                                    </td>
                                    <td>
                                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}"
                                            width="60" height="40" class="rounded object-fit-cover">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if ($item->news)
                                            <span class="badge bg-info-subtle text-info">
                                                {{ $item->news->title }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                            <a href="{{ route('ope.galleries.show', $item) }}" class="text-info"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="{{ route('ope.galleries.edit', $item) }}" class="text-warning"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteGalleryModal{{ $item->id }}"
                                                data-bs-tooltip="tooltip" title="Hapus">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Modal konfirmasi hapus — satu per baris, dibedakan lewat id galeri --}}
                                <div class="modal fade" id="deleteGalleryModal{{ $item->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin mau hapus foto <strong>{{ $item->title }}</strong>? Tindakan
                                                ini tidak bisa dibatalkan.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('ope.galleries.destroy', $item) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada foto galeri.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection