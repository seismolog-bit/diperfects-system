<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\MembershipType;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Provinsi;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('membership')->orderBy('tanggal_order', 'desc')->get();

        // dd($orders[0]);

        return view('admin.order.index', compact('orders'));
    }

    public function order_membership()
    {
        $memberships = Membership::orderBy('nama', 'asc')->get();
        $orders = Order::all();

        return view('admin.order.order_membership', compact('memberships', 'orders'));
    }

    public function order_membership_show($id)
    {
        $membership = Membership::findOrFail($id);
        $orders = Order::where('membership_id', $membership->id)->get();

        return view('admin.order.order_membership_show', compact('membership', 'orders'));
    }

    public function create()
    {
        $memberships = Membership::orderBy('nama', 'asc')->get();
        $products = Product::orderBy('nama', 'asc')->get();
        $carts = \Cart::getContent();

        $membership_types = MembershipType::orderBy('nama', 'desc')->get();
        $provinsis = Provinsi::get();

        return view('admin.order.create', compact('memberships', 'products', 'carts', 'membership_types', 'provinsis'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $memberships = Membership::orderBy('nama', 'asc')->get();
        $products = Product::orderBy('nama', 'asc')->get();

        return view('admin.order.edit', compact('order', 'memberships', 'products'));
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'membership_id' => 'required',
            'tanggal_order' => 'required'
        ]);

        $carts = \Cart::getContent();

        if($carts->isEmpty()){
            return redirect()->back()->with('error', 'Produk kosong');
        }

        $membership = Membership::findOrFail($request->membership_id);
        $ongkir = $request->ongkir ?? 0;
        $note = $request->note ?? '';
        $tanggal_order = $request->tanggal_order;

        return view('admin.order.confirm', compact('membership', 'ongkir', 'carts', 'note', 'tanggal_order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ongkir' => 'required',
            'membership_id' => 'required',
            'note' => 'required',
            'tanggal_order' => 'required',
        ]);

        $order = Order::create([
            'code' => $this->generateUniqueCode(),
            'tanggal_order' => $request->tanggal_order,
            'membership_id' => $request->membership_id,
            'qty' => \Cart::getTotalQuantity(),
            'total' => \Cart::getSubTotal(),
            'diskon' => 0,
            'ongkir' => $request->ongkir,
            'grand_total' => \Cart::getSubTotal() + $request->ongkir,
            'note' => $request->note,
            'status' => 1
        ]);

        $this->order_item_store($order);

        \Cart::clear();

        return redirect()->route('admin.order.index')->with('success', 'Berhasil membuat pesanan');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'membership_id' => 'required',
            'ongkir' => 'required',
            'note' => 'required',
            'tanggal_order' => 'required',
        ]);

        $order = Order::findOrFail($id);

        $order->grand_total = $order->grand_total - $order->ongkir; //menghapus ongkir yang lama

        $order->membership_id = $request->membership_id;
        $order->ongkir = $request->ongkir;
        $order->note = $request->note;
        $order->tanggal_order = $request->tanggal_order;
        $order->grand_total = $order->grand_total + $request->ongkir; //menambahkan ongkir yang baru

        $order->save();

        return redirect()->route('admin.order.show', $order->id)->with('success', 'Berhasil merubah pesanan');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $membership = Membership::findOrFail($order->membership_id);

        return view('admin.order.show', compact('order', 'membership'));
    }

    public function finish(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        if ($request->type == 'finish') {
            $order->status = 2;
        } else {
            $order->status = 3;
        }

        $order->save();

        return redirect()->route('admin.order.index')->with('Berhasil mengubah pesanan');
    }

    public function invoice(Order $order)
    {
        return view('admin.order.invoice', compact('order'));
    }

    public function generateUniqueCode()
    {
        $characters = '123456789';
        $charactersNumber = strlen($characters);
        $codeLength = 8;

        $code = '';

        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code . $character;
        }

        $code = 'TR-' . $code;

        if (Order::where('code', $code)->exists()) {
            $this->generateUniqueCode();
        }

        return $code;
    }

    public function order_item_store($order)
    {
        $carts = \Cart::getContent();

        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->quantity,
                'harga' => $cart->price,
                'diskon' => 0,
                'total' => $cart->price * $cart->quantity
            ]);
        }
    }
}
