<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Image;

class GaleryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
        ]);

        foreach ($request->images as $image) {

            $dir = 'media/galeries/';
            $extention = Str::lower($image->getClientOriginalExtension());
            $file_name = Str::random(16) . '.' . $extention;

            // image resize
            $image_file = Image::make($image->getRealPath());
            $image_file->resize(720, null, function ($const) {
                $const->aspectRatio();
            });

            $destination_path = public_path($dir);

            $image->move($destination_path, $file_name);

            Galery::create([
                'product_id' => $request->product_id,
                'image_url' => $dir . $file_name
            ]);
        }

        return redirect()->back();
    }

    public function destroy(Galery $galery)
    {
        if (File::exists($galery->image_url)) {
            File::delete($galery->image_url);
        }

        $galery->delete();

        return redirect()->back();
    }
}
