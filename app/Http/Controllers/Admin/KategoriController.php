<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::get();

        return view('admin.kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Kategori::updateOrCreate(
            ['id' => $request->id],
            [
                'nama' => $request->nama,
            ]
        );

        return redirect()->route('admin.kategori.index')->with('success', 'Berhasil menambahkan kategori');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus kategori');
    }
}
