<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('nama', 'ASC')->paginate(12);

        if($request->category)
        {
            $category = Kategori::where('slug', $request->category)->first();

            $products = Product::orderBy('nama', 'ASC')->where('kategori_id', $category->id)->paginate(12);
            $products->withPath('products?category='. $category->slug);
        }

        return view('public.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $relates = Product::where('kategori_id', $product->kategori_id)->take(6)->get();

        $product->views = $product->views + 1;
        $product->save();

        return view('public.products.show', compact('product', 'relates'));
    }
}
