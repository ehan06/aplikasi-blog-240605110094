@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="mb-4">
        <h4 class="fw-bold text-dark">Buat Kategori Baru</h4>
        <p class="text-muted small">Tambahkan label kategori konten baru agar struktur artikel blog lebih terorganisir.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nama_kategori" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Nama Kategori</label>
                        <input type="text" class="form-control rounded-3 p-2.5 @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="Contoh: Teknologi, Kesehatan, Keuangan">
                        @error('nama_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="keterangan" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Keterangan Ringkas</label>
                        <textarea class="form-control rounded-3 p-3 @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="4" placeholder="Tulis deskripsi singkat mengenai topik kategori ini...">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 justify-content-end border-top pt-4">
                        <a href="{{ route('kategori.index') }}" class="btn btn-light border rounded-3 px-4 fw-medium">Batal</a>
                        <button type="submit" class="btn btn-success rounded-3 px-4 fw-semibold shadow-sm">Simpan Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection