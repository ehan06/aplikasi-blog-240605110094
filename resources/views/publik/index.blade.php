@extends('layouts.publik')

@section('title', 'Beranda Utama')

@section('content')
<div class="container">
    <div class="row g-4">
        <div class="col-lg-8">
            @forelse($artikel as $item)
            <div class="card card-blog overflow-hidden mb-5 border-0 shadow-sm p-4 bg-white" style="border-radius: 16px;">
                <img src="{{ asset('storage/gambar/' . $item->gambar) }}" 
                     class="w-100 object-fit-cover rounded-4 mb-4" 
                     style="height: 380px;" 
                     onerror="this.src='https://placehold.co/800x450?text=No+Image';">
                
                <div class="mb-3">
                    <span class="badge px-3 py-2 rounded-pill fw-bold" style="background-color: #E6F6E8; color: #00AA13; font-size: 11px;">
                        {{ $item->kategori->nama_kategori }}
                    </span>
                </div>

                <h3 class="fw-bold mb-3">
                    <a href="{{ route('publik.show', $item->id) }}" class="text-dark text-decoration-none" style="font-size: 24px; line-height: 1.3;">
                        {{ $item->judul }}
                    </a>
                </h3>

                <div class="d-flex align-items-center gap-2 text-muted small mb-3">
                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 28px; height: 28px; font-size: 11px; background-color: #00AA13 !important;">
                        {{ strtoupper(substr($item->penulis->nama_depan, 0, 1)) }}
                    </div>
                    <span class="fw-semibold text-dark">{{ $item->penulis->nama_depan }} {{ $item->penulis->nama_belakang }}</span>
                    <span>•</span>
                    <span>{{ \Carbon\Carbon::parse($item->hari_tanggal)->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
                </div>

                <p class="text-secondary small lh-lg mb-4" style="font-size: 14.5px; text-align: justify;">
                    {{ Str::limit(strip_tags($item->isi), 220) }}
                </p>

                <div>
                    <a href="{{ route('publik.show', $item->id) }}" class="btn btn-gojek btn-sm px-4 py-2 rounded-pill fw-bold" style="background-color: #00AA13; color: #FFF; border: none; font-size: 13px;">
                        Baca Selengkapnya &rarr;
                    </a>
                </div>
            </div>
            @empty
            <div class="card border-0 shadow-sm p-5 text-center text-muted" style="border-radius: 16px;">
                Belum ada konten artikel terbit.
            </div>
            @endforelse
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 bg-white sticky-top" style="border-radius: 16px; top: 100px;">
                <h6 class="fw-bold text-dark mb-4">Kategori Artikel</h6>
                <div class="d-flex flex-column gap-2">
                    
                    <a href="{{ route('publik.index') }}" 
                       class="text-decoration-none d-flex justify-content-between align-items-center py-2.5 px-3 rounded-3 small transition {{ !request('kategori') ? 'fw-bold text-success' : 'text-secondary' }}"
                       style="{{ !request('kategori') ? 'background-color: #E6F6E8; color: #00AA13 !important;' : '' }}">
                        <span>Semua Artikel</span>
                        <span class="badge rounded-circle bg-light text-dark border d-flex align-items-center justify-content-center p-0 mb-0" 
                              style="width: 24px; height: 24px; font-size: 11px; line-height: 1;">
                            {{ \App\Models\Artikel::count() }}
                        </span>
                    </a>
                    
                    @foreach($kategori as $kat)
                    @php $hitung = \App\Models\Artikel::where('id_kategori', $kat->id)->count(); @endphp
                    <a href="{{ route('publik.index', ['kategori' => $kat->id]) }}" 
                       class="text-decoration-none d-flex justify-content-between align-items-center py-2.5 px-3 rounded-3 small transition {{ request('kategori') == $kat->id ? 'fw-bold text-success' : 'text-secondary' }}"
                       style="{{ request('kategori') == $kat->id ? 'background-color: #E6F6E8; color: #00AA13 !important;' : '' }}">
                        <span>{{ $kat->nama_kategori }}</span>
                        <span class="badge rounded-circle bg-light text-dark border d-flex align-items-center justify-content-center p-0 mb-0" 
                              style="width: 24px; height: 24px; font-size: 11px; line-height: 1;">
                            {{ $hitung }}
                        </span>
                    </a>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection