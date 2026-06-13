@extends('layouts.app')

@section('title', 'Kelola Kategori')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold text-dark mb-1">Daftar Kategori</h4>
        <p class="text-muted small mb-0">Kelola pengelompokan topik tulisan blog Anda.</p>
    </div>
    <a href="{{ route('kategori.create') }}" class="btn btn-gojek px-4 py-2.5">
        + Tambah Kategori
    </a>
</div>

@if(session('sukses'))
<div class="alert alert-success border-0 rounded-3 shadow-sm mb-4" style="background-color: #E6F6E8; color: #00AA13;">
    <strong>Berhasil!</strong> {{ session('sukses') }}
</div>
@endif

<div class="card card-gojek overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr class="text-muted small" style="font-size: 12px;">
                    <th class="ps-4 py-3">NAMA KATEGORI</th>
                    <th class="py-3">KETERANGAN / DESKRIPSI</th>
                    <th class="pe-4 py-3 text-end">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategori as $item)
                <tr>
                    <td class="ps-4 py-3">
                        <span class="badge px-3 py-2 rounded-pill fw-bold" style="background-color: #E6F6E8; color: #00AA13; font-size: 12px;">
                            {{ $item->nama_kategori }}
                        </span>
                    </td>
                    <td class="py-3 text-secondary small">{{ $item->keterangan ?? 'Tidak ada deskripsi.' }}</td>
                    <td class="pe-4 py-3 text-end">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-light border rounded-3 px-3 text-primary fw-semibold">Edit</a>
                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light border rounded-3 px-3 text-danger fw-semibold">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-5 text-muted">Belum ada kategori.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection