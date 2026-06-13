@extends('layouts.app')

@section('title', 'Edit Penulis')

@section('content')
<div class="card border-0 shadow-sm col-md-8">
    <div class="card-body p-4">
        <h6 class="fw-semibold mb-4" style="color: #333333;">Edit Data Penulis</h6>

        <form action="{{ route('penulis.update', $penulis->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nama_depan" class="form-label" style="font-size: 13px; color: #555555;">Nama Depan</label>
                    <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan" name="nama_depan" value="{{ old('nama_depan', $penulis->nama_depan) }}">
                    @error('nama_depan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="nama_belakang" class="form-label" style="font-size: 13px; color: #555555;">Nama Belakang</label>
                    <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang', $penulis->nama_belakang) }}">
                    @error('nama_belakang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="user_name" class="form-label" style="font-size: 13px; color: #555555;">Username</label>
                <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ old('user_name', $penulis->user_name) }}">
                @error('user_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label" style="font-size: 13px; color: #555555;">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                <div class="form-text" style="font-size: 12px;">Kosongkan jika tidak ingin mengubah password.</div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="foto" class="form-label" style="font-size: 13px; color: #555555;">Foto Profil</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/foto/' . $penulis->foto) }}" alt="Foto Sekarang" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 1px solid #e9ecef;">
                </div>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/jpg,image/jpeg,image/png">
                <div class="form-text" style="font-size: 12px;">Format yang diizinkan: JPG, JPEG, PNG. Ukuran maksimal 2 MB. Kosongkan jika tidak ingin mengubah foto. [cite: 1453]</div>
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('penulis.index') }}" class="btn btn-sm" style="background-color: #f0f0f0; color: #555555;">Batal [cite: 1453, 1462]</a>
                <button type="submit" class="btn btn-sm btn-success">Simpan Perubahan [cite: 1462]</button>
            </div>
        </form>
    </div>
</div>
@endsection