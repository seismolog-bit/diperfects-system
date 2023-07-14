<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipType;
use Illuminate\Http\Request;

class MembershipTypeController extends Controller
{
    public function index()
    {
        $membership_types = MembershipType::orderBy('nama', 'asc')->get();

        return view('admin.membership_type.index', compact('membership_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'komisi' => 'required'
        ]);

        MembershipType::updateOrCreate(
            ['id' => $request->id],
            [
                'nama' => $request->nama,
                'komisi' => $request->komisi
            ]
        );

        return redirect()->route('admin.member-type.index')->with('success', 'Berhasil menambahkan tipe membership');
    }

    public function edit($id)
    {
        $membership_type = MembershipType::findOrFail($id);

        return view('admin.membership_type.edit', compact('membership_type'));
    }

    public function destroy(MembershipType $membership_type)
    {
        $membership_type->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus tipe membership');
    }
}
