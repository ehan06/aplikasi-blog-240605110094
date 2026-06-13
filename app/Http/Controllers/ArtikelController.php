<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Menampilkan halaman tabel manajemen artikel admin
     */
    public function index()
    {
        // FIX: Mengurutkan menggunakan kolom 'hari_tanggal' bukan 'created_at' bawaan Laravel
        $artikel = Artikel::with(['kategori', 'penulis'])->latest('hari_tanggal')->get();
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Menampilkan form tambah artikel baru
     */
    public function create()
    {
        $kategori = KategoriArtikel::all();
        return view('artikel.create', compact('kategori'));
    }

    /**
     * Menyimpan data artikel baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $namaFile = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('gambar', $namaFile, 'public');
        }

        // Simpan ke Database dengan format DATETIME yang valid bagi MySQL
        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'id_penulis' => Auth::user()->id,
            'id_kategori' => $request->id_kategori,
            'gambar' => $namaFile,
            'hari_tanggal' => now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ]);

        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit artikel
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = KategoriArtikel::all();
        return view('artikel.edit', compact('artikel', 'kategori'));
    }

    /**
     * Memperbarui data artikel di database
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $namaFile = $artikel->gambar;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar) {
                Storage::disk('public')->delete('gambar/' . $artikel->gambar);
            }
            
            $file = $request->file('gambar');
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('gambar', $namaFile, 'public');
        }

        $artikel->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'id_kategori' => $request->id_kategori,
            'gambar' => $namaFile,
        ]);

        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil diperbarui.');
    }

    /**
     * Menghapus data artikel dari database
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        
        if ($artikel->gambar) {
            Storage::disk('public')->delete('gambar/' . $artikel->gambar);
        }

        $artikel->delete();
        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil dihapus.');
    }
}