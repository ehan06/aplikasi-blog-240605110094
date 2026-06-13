@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="mb-4">
        <h4 class="fw-bold text-dark">Buat Artikel Baru</h4>
        <p class="text-muted small">Tuliskan ide kreatif Anda dan publikasikan ke halaman blog.</p>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="judul" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Judul Artikel</label>
                        <input type="text" class="form-control rounded-3 p-2.5 @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul artikel yang menarik...">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="id_kategori" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Kategori Konten</label>
                            <select class="form-select rounded-3 p-2.5 @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori">
                                <option value="" selected disabled>-- Pilih Kategori --</option>
                                @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}" {{ old('id_kategori') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="gambar" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Upload Cover Gambar</label>
                            <input type="file" class="form-control rounded-3 p-2.5 @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                            <div class="form-text text-muted" style="font-size: 11px;">Format: JPG, JPEG, PNG. Maksimal 2 MB.</div>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Konten Artikel</label>
                        <textarea class="form-control rounded-4 p-3 @error('isi') is-invalid @enderror" id="isi" name="isi" rows="10" placeholder="Tuliskan isi lengkap artikel di sini...">{{ old('isi') }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 justify-content-end border-top pt-4">
                        <a href="{{ route('artikel.index') }}" class="btn btn-light border rounded-3 px-4 fw-medium">Batal</a>
                        <button type="submit" class="btn btn-success rounded-3 px-4 fw-semibold shadow-sm">Terbitkan Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection