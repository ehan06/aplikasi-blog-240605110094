@extends('layouts.publik')

@section('title', $artikel->judul)

@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb small bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a href="{{ route('publik.index') }}" class="text-decoration-none fw-medium" style="color: #00AA13;">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('publik.index', ['kategori' => $artikel->id_kategori]) }}" class="text-decoration-none fw-medium" style="color: #00AA13;">{{ $artikel->kategori->nama_kategori }}</a></li>
            <li class="breadcrumb-item active text-muted text-truncate" aria-current="page" style="max-width: 300px;">{{ $artikel->judul }}</li>
        </ol>
    </nav>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white" style="border-radius: 16px;">
                <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" 
                     class="w-100 rounded-4 shadow-sm mb-4 object-fit-cover" 
                     style="max-height: 420px;"
                     onerror="this.src='https://placehold.co/800x450?text=No+Cover+Image';">

                <div class="mb-3">
                    <span class="badge px-3 py-2 rounded-pill fw-bold" style="background-color: #E6F6E8; color: #00AA13; font-size: 11px;">
                        {{ $artikel->kategori->nama_kategori }}
                    </span>
                </div>
                
                <h2 class="fw-bold text-dark lh-base mb-4" style="font-size: 28px;">{{ $artikel->judul }}</h2>
                
                <div class="d-flex align-items-center gap-3 border-bottom pb-4 mb-4 text-muted small">
                    <img src="{{ asset('storage/foto/' . $artikel->penulis->foto) }}" 
                         class="rounded-circle border object-fit-cover" 
                         style="width: 42px; height: 42px;" 
                         onerror="this.src='https://placehold.co/42x42?text=U';">
                    <div>
                        <h6 class="mb-0 fw-bold text-dark small" style="font-size: 14px;">{{ $artikel->penulis->nama_depan }} {{ $artikel->penulis->nama_belakang }}</h6>
                        <span class="text-muted" style="font-size: 11px;">📅 {{ \Carbon\Carbon::parse($artikel->hari_tanggal)->locale('id')->isoFormat('dddd, D MMMM Y | HH:mm') }} WIB</span>
                    </div>
                </div>

                <div class="lh-lg text-secondary" style="font-size: 15.5px; white-space: pre-line; text-align: justify; color: #4A5568 !important;">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 bg-white sticky-top" style="border-radius: 16px; top: 100px;">
                <h6 class="fw-bold text-dark mb-4">Artikel Terkait</h6>
                
                @forelse($artikelTerkait as $terkait)
                <div class="d-flex gap-3 mb-3 pb-3 border-bottom {{ $loop->last ? 'border-0 mb-0 pb-0' : '' }}">
                    <img src="{{ asset('storage/gambar/' . $terkait->gambar) }}" 
                         class="rounded-3 object-fit-cover shadow-sm" 
                         style="width: 85px; height: 60px;"
                         onerror="this.src='https://placehold.co/85x60?text=Img';">
                    <div class="d-flex flex-column justify-content-between">
                        <h6 class="fw-semibold mb-1" style="font-size: 13px; line-height: 1.4; max-height: 3.8em; overflow: hidden;">
                            <a href="{{ route('publik.show', $terkait->id) }}" class="text-dark text-decoration-none hover-success" style="transition: color 0.2s;">
                                {{ Str::limit($terkait->judul, 45) }}
                            </a>
                        </h6>
                        <small class="text-muted" style="font-size: 11px;">{{ \Carbon\Carbon::parse($terkait->hari_tanggal)->locale('id')->isoFormat('D MMMM Y') }}</small>
                    </div>
                </div>
                @empty
                <p class="text-muted small mb-0">Tidak ada artikel terkait saat ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection