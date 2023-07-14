<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Kabupaten;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\Kelurahan;
use Laravolt\Indonesia\Models\Provinsi;

class KelurahanController extends Controller
{
    public function kabupaten_search(Request $request)
    {
        $provinsi = Provinsi::findOrFail($request->id);
        $datas = Kabupaten::where('province_code', $provinsi->code)->get();
        return response()->json($datas);
    }

    public function kecamatan_search(Request $request)
    {
        $kabupaten = Kabupaten::findOrFail($request->id);
        $datas = Kecamatan::where('city_code', $kabupaten->code)->get();
        return response()->json($datas);
    }

    public function kelurahan_search(Request $request)
    {
        $kecamatan = Kecamatan::findOrFail($request->id);
        $datas = Kelurahan::where('district_code', $kecamatan->code)->get();
        return response()->json($datas);
    }
}
