<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index(Request $request)
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfDay();

        if($request->dates)
        {
            $dates = explode(' - ', $request->dates);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1] . ' 23:59:59');
        }

        $items = OrderItem::query();

        $items->whereBetween('created_at', [$startDate, $endDate]);
        $items = $items->get();

        $dates = $startDate->format('m-d-Y') . ' - ' . $endDate->format('m-d-Y');

        return view('admin.order_items.index', compact('items', 'dates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'harga' => 'required',
            'qty' => 'required',
        ]);

        $order = Order::findOrFail($request->order_id);

        $order_item = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'diskon' => 0,
            'total' => $request->qty * $request->harga
        ]);

        $this->order_sumary($order);

        return redirect()->back()->with('success', 'Berhasil menambahkan item');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'harga' => 'required',
            'qty' => 'required'
        ]);

        $order_item = OrderItem::findOrFail($id);
        $order = Order::findOrFail($order_item->order_id);

        //perubahan order item
        $order_item->harga = $request->harga;
        $order_item->qty = $request->qty;
        $order_item->total = $request->harga * $request->qty;

        $order_item->save();

        //perubahan order
        $this->order_sumary($order);

        return redirect()->back()->with('success', 'Berhasil merubah pesanan');
    }

    public function destroy($id)
    {
        $order_item = OrderItem::findOrFail($id);
        $order_item->delete();

        $order = Order::findOrFail($order_item->order_id);
        $this->order_sumary($order);

        return redirect()->back()->with('success', 'Berhasil menghapus item');
    }

    public function order_sumary($order)
    {
        $order->qty = $order->order_items->sum('qty');
        $order->total = $order->order_items->sum('total');
        $order->grand_total = $order->total + $order->ongkir;

        $order->save();
    }
}
