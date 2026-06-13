@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<div class="card border-0 shadow-sm col-md-10">
    <div class="card-body p-4">
        <h6 class="fw-semibold mb-4" style="color: #333333;">Edit Artikel</h6>

        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label" style="font-size: 13px; color: #555555;">Judul Artikel</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_kategori" class="form-label" style="font-size: 13px; color: #555555;">Kategori Artikel</label>
                <select class="form-select @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori">
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}" {{ old('id_kategori', $artikel->id_kategori) == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('id_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label" style="font-size: 13px; color: #555555;">Isi Konten Artikel</label>
                <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="8">{{ old('isi', $artikel->isi) }}</textarea>
                @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="gambar" class="form-label" style="font-size: 13px; color: #555555;">Gambar Cover Artikel</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="Cover Sekarang" style="width: 120px; height: 80px; object-fit: cover; border-radius: 4px; border: 1px solid #e9ecef;">
                </div>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/jpg,image/jpeg,image/png">
                <div class="form-text" style="font-size: 12px;">Format: JPG, JPEG, PNG. Maksimal 2 MB. Kosongkan jika tidak ingin mengubah cover.</div>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('artikel.index') }}" class="btn btn-sm" style="background-color: #f0f0f0; color: #555555;">Batal</a>
                <button type="submit" class="btn btn-sm btn-success">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection