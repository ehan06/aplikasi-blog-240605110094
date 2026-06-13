<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriArtikel;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $kategori = KategoriArtikel::all();

        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100',
            'keterangan' => 'nullable'
        ]);

        KategoriArtikel::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $kategori = KategoriArtikel::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100',
            'keterangan' => 'nullable'
        ]);

        $kategori = KategoriArtikel::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $kategori = KategoriArtikel::findOrFail($id);

        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}