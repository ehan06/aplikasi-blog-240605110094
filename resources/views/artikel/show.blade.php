@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">

        <h2>{{ $artikel->judul }}</h2>

        <p class="text-muted">
            {{ $artikel->penulis->nama_depan }} |
            {{ $artikel->kategori->nama_kategori }} |
            {{ $artikel->hari_tanggal }}
        </p>

        @if($artikel->gambar)
            <img src="{{ asset('storage/'.$artikel->gambar) }}"
                 class="img-fluid mb-3">
        @endif

        <p style="white-space: pre-line;">
            {{ $artikel->isi }}
        </p>

        <a href="{{ route('artikel.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>

    </div>
</div>

@endsection