@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden position-relative text-white" 
         style="background: linear-gradient(135deg, #00AA13 0%, #008F10 100%);">
        <div class="position-absolute end-0 bottom-0 opacity-10" style="width: 200px; height: 200px; background: #FFF; border-radius: 50%; transform: translate(50%, 50%);"></div>
        <div class="position-absolute end-0 top-0 opacity-10" style="width: 120px; height: 120px; background: #FFF; border-radius: 50%; transform: translate(20%, -20%);"></div>
        
        <div class="card-body p-4 p-md-5 position-relative z-1">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <span class="badge bg-white text-success px-3 py-2 rounded-pill mb-3 small fw-bold shadow-sm" style="color: #00AA13 !important;">👋 Selamat Datang Kembali!</span>
                    <h2 class="fw-bold mb-2">Halo, {{ Auth::user()->nama_depan ?? 'Admin Blog' }}!</h2>
                    <p class="mb-0 opacity-75">Sistem CMS Anda siap digunakan. Pantau statistik portal dan kelola konten artikel Anda dengan mudah di sini.</p>
                </div>
                <div class="col-md-4 text-md-end mt-4 mt-md-0">
                    <div class="bg-white bg-opacity-10 d-inline-block p-3 rounded-4 border border-white border-opacity-10 text-start">
                        <small class="d-block opacity-75 small">Waktu Sesi Login Anda:</small>
                        <span class="fw-bold fs-6"><i class="bi bi-clock me-2"></i>{{ date('d M Y - H:i') }} WIB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card card-gojek p-4 position-relative overflow-hidden border-0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="text-muted small fw-bold text-uppercase mb-1">Total Artikel</h6>
                        <h3 class="fw-bold text-dark mb-0">{{ \App\Models\Artikel::count() }}</h3>
                    </div>
                    <div class="rounded-3 p-3" style="background-color: #E6F6E8; color: #00AA13;">
                        <span class="fs-4">📰</span>
                    </div>
                </div>
                <a href="{{ route('artikel.index') }}" class="text-decoration-none small fw-semibold d-flex align-items-center gap-1 text-gojek-green" style="color: #00AA13;">
                    Lihat Semua Artikel &rarr;
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-gojek p-4 position-relative overflow-hidden border-0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="text-muted small fw-bold text-uppercase mb-1">Kategori Tema</h6>
                        <h3 class="fw-bold text-dark mb-0">{{ \App\Models\KategoriArtikel::count() }}</h3>
                    </div>
                    <div class="rounded-3 p-3" style="background-color: #E6F6E8; color: #00AA13;">
                        <span class="fs-4">📁</span>
                    </div>
                </div>
                <a href="{{ route('kategori.index') }}" class="text-decoration-none small fw-semibold d-flex align-items-center gap-1 text-gojek-green" style="color: #00AA13;">
                    Kelola Kategori &rarr;
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-gojek p-4 position-relative overflow-hidden border-0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="text-muted small fw-bold text-uppercase mb-1">Akun Penulis</h6>
                        <h3 class="fw-bold text-dark mb-0">{{ \App\Models\Penulis::count() }}</h3>
                    </div>
                    <div class="rounded-3 p-3" style="background-color: #E6F6E8; color: #00AA13;">
                        <span class="fs-4">👥</span>
                    </div>
                </div>
                <a href="{{ route('penulis.index') }}" class="text-decoration-none small fw-semibold d-flex align-items-center gap-1 text-gojek-green" style="color: #00AA13;">
                    Manajemen Profil &rarr;
                </a>
            </div>
        </div>
    </div>

    <div class="card card-gojek border-0 p-4">
        <h6 class="fw-bold text-dark mb-4">🔐 Informasi Sesi Akun</h6>
        <div class="d-flex flex-wrap align-items-center gap-4">
            <div class="position-relative">
                <img src="{{ asset('storage/foto/' . Auth::user()->foto) }}" 
                     class="rounded-4 border shadow-sm object-fit-cover" 
                     style="width: 80px; height: 80px;" 
                     onerror="this.src='https://placehold.co/80x80?text=User';">
                <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-2" title="Sesi Aktif"></span>
            </div>
            <div>
                <table class="table table-sm table-borderless mb-0 small">
                    <tr>
                        <td class="text-muted ps-0 py-1" style="width: 120px;">Nama Pengguna</td>
                        <td class="fw-bold text-dark py-1">: {{ Auth::user()->nama_depan }} {{ Auth::user()->nama_belakang }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted ps-0 py-1">Nama ID Akun</td>
                        <td class="fw-bold text-secondary py-1">: <span class="badge bg-light text-dark border">@ {{ Auth::user()->user_name }}</span></td>
                    </tr>
                    <tr>
                        <td class="text-muted ps-0 py-1">Status Hak Akses</td>
                        <td class="fw-bold text-success py-1">: Administrator Utama (CMS)</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection