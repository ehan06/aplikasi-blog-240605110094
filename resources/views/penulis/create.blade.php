@extends('layouts.app')

@section('title', 'Tambah Penulis')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="mb-4">
        <h4 class="fw-bold text-dark">Daftarkan Penulis Baru</h4>
        <p class="text-muted small">Buat akun kontributor baru untuk mengelola konten artikel web blog.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="nama_depan" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Nama Depan</label>
                            <input type="text" class="form-control rounded-3 p-2.5 @error('nama_depan') is-invalid @enderror" id="nama_depan" name="nama_depan" value="{{ old('nama_depan') }}" placeholder="Contoh: Ahmad">
                            @error('nama_depan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nama_belakang" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Nama Belakang</label>
                            <input type="text" class="form-control rounded-3 p-2.5 @error('nama_belakang') is-invalid @enderror" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang') }}" placeholder="Contoh: Basuki">
                            @error('nama_belakang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="user_name" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Username Akun</label>
                        <input type="text" class="form-control rounded-3 p-2.5 @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ old('user_name') }}" placeholder="Masukkan username unik untuk login">
                        @error('user_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Password Default</label>
                        <input type="password" class="form-control rounded-3 p-2.5 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Minimal 8 karakter">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="form-label fw-semibold text-secondary" style="font-size: 13px;">Upload Foto Profil</label>
                        <input type="file" class="form-control rounded-3 p-2.5 @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                        <div class="form-text text-muted" style="font-size: 11px;">Format: JPG, JPEG, PNG. Maksimal 2 MB. Kosongkan jika ingin memakai foto default.</div>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 justify-content-end border-top pt-4">
                        <a href="{{ route('penulis.index') }}" class="btn btn-light border rounded-3 px-4 fw-medium">Batal</a>
                        <button type="submit" class="btn btn-success rounded-3 px-4 fw-semibold shadow-sm">Simpan Penulis</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection