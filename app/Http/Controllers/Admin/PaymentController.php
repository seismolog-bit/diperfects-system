<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ]);

        $order = Order::findOrFail($request->order_id);

        $payment_cash = $request->payment_cash ?? 0;
        $payment_transfer = $request->payment_transfer ?? 0;

        $payment = Payment::updateOrCreate([
            'id' => $request->id,
        ], [
            'order_id' => $order->id,
            'payment_cash' => $payment_cash,
            'payment_transfer' => $payment_transfer,
            'type' => $request->type,
            'tanggal_transaksi' => $request->tanggal_transaksi,
        ]);

        if($payment->type){
            $order->payment_cash = $order->payment_cash + $payment_cash;
            $order->payment_transfer = $order->payment_transfer + $payment_transfer;
        }else{
            $order->payment_cash = $order->payment_cash - $payment_cash;
            $order->payment_transfer = $order->payment_transfer - $payment_transfer;
        }

        $order->save();

        return redirect()->back();
    }

    public function destroy(Payment $payment)
    {
    }
}
