<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('nama', 'asc')->get();

        return view('admin.produk.index', compact('products'));
    }

    public function create()
    {
        $kategoris = Kategori::orderBy('nama', 'ASC')->get();

        return view('admin.produk.create', compact('kategoris'));
    }

    public function show(Product $product)
    {
        $galeries = Galery::where('product_id', $product->id)->get();

        return view('admin.produk.show', compact('product', 'galeries'));
    }

    public function edit(Product $product)
    {
        $kategoris = Kategori::orderBy('nama', 'ASC')->get();
        return view('admin.produk.edit', compact('product', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'berat' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'tinggi' => 'required',
            'status' => 'required',
        ]);

        if($request->id)
        {
            $product = Product::findOrFail($request->id);
        }

        if($request->image_url)
        {
            // upload foto
            $dir = 'media/products/';
            $url = $request->file('image_url');
            $extention = Str::lower($url->getClientOriginalExtension());
            $file_name = time() . '.' . $extention;

            // image resize
            $image_file = \Image::make($url->getRealPath());
            $image_file->resize(720, null, function($const) {
                $const->aspectRatio();
            });

            $destination_path = public_path($dir);
            $url->move($destination_path, $file_name);

            $image = $dir . $file_name;
        }

        Product::updateOrCreate([
            'id' => $request->id
        ], [
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'berat' => $request->berat,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'tinggi' => $request->tinggi,
            'status' => $request->status,
            'image_url' => $request->image_url ? $image : $product->image_url,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Berhasil membuat produk');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus produk');
    }
}
