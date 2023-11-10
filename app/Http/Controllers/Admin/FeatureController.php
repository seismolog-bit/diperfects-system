<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Image;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        $products = Product::orderBy('nama', 'asc')->orderBy('kategori_id', 'desc')->get();

        return view('admin.feature', compact('features', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'image_url' => 'required'
        ]);

        $image_url = '';

        if($request->image_url)
        {
            // upload foto
            $dir = 'media/features/';
            $url = $request->file('image_url');
            $extention = Str::lower($url->getClientOriginalExtension());
            $file_name = time() . '.' . $extention;

            // image resize
            $image_file = Image::make($url->getRealPath());
            $image_file->resize(720, null, function($const) {
                $const->aspectRatio();
            });

            $destination_path = public_path($dir);
            $url->move($destination_path, $file_name);

            $image_url = $dir . $file_name;
        }

        Feature::create([
            'product_id' => $request->product_id,
            'image_url' => $image_url
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->back();
    }
}
