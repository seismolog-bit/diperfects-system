<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = \Cart::getContent();

        return view('admin.order.create', compact('carts'));
    }

    public function store(Request $request)
    {
        // dd($request);

        // $request->validate([
        //     'id' => 'required',
        //     'name' => 'required',
        //     'price' => 'required',
        //     'quantity' => 'required',
        //     'associatedModel' => 'required',
        // ]);

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image
            )
        ));

        // dd($cart);

        return redirect()->back()->with('success', 'Berhasil menambahkan produk');
    }

    public function update(Request $request, $id)
    {
        \Cart::update(
            $id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        return redirect()->back()->with('success', 'Berhasil merubah produk');
    }

    public function destroy($id)
    {
        \Cart::remove($id);
        return redirect()->back()->with('success', 'Berhasil menghapus produk');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->back()->with('success', 'Berhasil menghapus produk');
    }
}
