<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class BlogController extends Controller
{
    // Halaman Utama / Beranda Publik
    public function index(Request $request)
    {
        // Ambil data kategori untuk widget samping
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        // Query dasar artikel dengan eager loading penulis dan kategori
        $query = Artikel::with(['penulis', 'kategori'])->orderBy('id', 'desc');

        // Jika ada filter kategori dari pengunjung (query string ?kategori=id)
        if ($request->has('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        // Batasi hanya menampilkan 5 artikel terbaru sesuai instruksi soal UAS
        $artikel = $query->take(5)->get();

        return view('publik.index', compact('artikel', 'kategori'));
    }

    // Halaman Detail Artikel
    public function show(string $id)
    {
        // Ambil artikel yang dipilih
        $artikel = Artikel::with(['penulis', 'kategori'])->findOrFail($id);

        // Ambil 5 artikel terkait dari kategori yang sama (kecuali artikel itu sendiri)
        $artikelTerkait = Artikel::where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        // Ambil semua kategori untuk kebutuhan navigasi atau widget jika diperlukan
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        return view('publik.show', compact('artikel', 'artikelTerkait', 'kategori'));
    }
}