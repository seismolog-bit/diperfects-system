<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\MembershipType;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Provinsi;
use Illuminate\Support\Str;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::orderBy('nama', 'asc')->get();
        return view('admin.membership.index', compact('memberships'));
    }

    public function create()
    {
        $membership_types = MembershipType::orderBy('nama', 'desc')->get();
        $provinsis = Provinsi::get();

        return view('admin.membership.create', compact('membership_types', 'provinsis'));
    }

    public function edit(Membership $membership)
    {
        $provinsis = Provinsi::get();
        $membership_types = MembershipType::orderBy('nama', 'asc')->get();

        return view('admin.membership.edit', compact('membership', 'provinsis', 'membership_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'membership_type_id' => 'required',
            'alamat' => 'required',
            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'status' => 'required',
        ]);

        // dd($request);

        if($request->id)
        {
            $membership = Membership::findOrFail($request->id);
        }

        if($request->image_url)
        {
            // upload foto
            $dir = 'media/memberships/';
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

        Membership::updateOrCreate([
            'id' => $request->id
        ], [
            'code' => $request->id ? $membership->code : $this->generateUniqueCode(),
            'nama' => $request->nama,
            'nomor_hp' => $request->nomor_hp,
            'membership_type_id' => $request->membership_type_id,
            'alamat' => $request->alamat,
            'provinsi_id' => $request->provinsi_id,
            'kabupaten_id' => $request->kabupaten_id,
            'kecamatan_id' => $request->kecamatan_id,
            'kelurahan_id' => $request->kelurahan_id,
            'status' => $request->status,
            'image_url' => $request->image_url ? $image : $membership->image_url,
        ]);

        if($request->order)
        {
            return redirect()->back()->with('success', 'Berhasil menambahkan membership');
        }

        return redirect()->route('admin.membership.index')->with('success', 'Berhasil menambahkan membership');
    }

    public function destroy(Membership $membership)
    {
        $membership->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus membership');
    }

    public function generateUniqueCode()
    {
        $characters = '1234567890';
        $charactersNumber = strlen($characters);
        $codeLength = 8;

        $code = '';

        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code . $character;
        }

        $code = 'DP-' . $code;

        if (Membership::where('code', $code)->exists()) {
            $this->generateUniqueCode();
        }

        return $code;
    }
}
