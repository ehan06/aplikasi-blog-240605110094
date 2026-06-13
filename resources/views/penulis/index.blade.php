@extends('layouts.app')

@section('title', 'Kelola Penulis')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold text-dark mb-1">Daftar Penulis</h4>
        <p class="text-muted small mb-0">Manajemen profil akun kontributor penulis artikel blog.</p>
    </div>
    <a href="{{ route('penulis.create') }}" class="btn btn-gojek px-4 py-2.5">
        + Daftar Penulis Baru
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
                    <th class="ps-4 py-3">PROFIL</th>
                    <th class="py-3">NAMA LENGKAP</th>
                    <th class="py-3">USERNAME</th>
                    <th class="pe-4 py-3 text-end">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penulis as $item)
                <tr>
                    <td class="ps-4 py-3">
                        <img src="{{ asset('storage/foto/' . $item->foto) }}" class="rounded-circle border shadow-sm" style="width: 45px; height: 45px; object-fit: cover;" onerror="this.src='https://placehold.co/45x45';">
                    </td>
                    <td class="py-3 fw-bold text-dark">{{ $item->nama_depan }} {{ $item->nama_belakang }}</td>
                    <td class="py-3"><span class="text-muted">@</span><span class="text-dark fw-medium">{{ $item->user_name }}</span></td>
                    <td class="pe-4 py-3 text-end">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('penulis.edit', $item->id) }}" class="btn btn-sm btn-light border rounded-3 px-3 text-primary fw-semibold">Edit</a>
                            <form action="{{ route('penulis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus akun penulis ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light border rounded-3 px-3 text-danger fw-semibold">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5 text-muted">Belum ada data penulis.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection