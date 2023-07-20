<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ]);

        $order = Order::findOrFail($request->order_id);

        if($request->id)
        {
            $payment = Payment::findOrFail($request->id);
            $image = $payment->lampiran;
        }

        $payment_cash = $request->payment_cash ?? 0;
        $payment_transfer = $request->payment_transfer ?? 0;

        if($request->lampiran)
        {
            // upload foto
            $dir = 'media/payments/';
            $url = $request->file('lampiran');
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

        Payment::updateOrCreate([
            'id' => $request->id,
        ], [
            'order_id' => $order->id,
            'payment_cash' => $payment_cash,
            'payment_transfer' => $payment_transfer,
            'type' => $request->type,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'lampiran' => $request->lampiran ? $image : ''
        ]);

        $this->order_payment($order->id);

        return redirect()->back();
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        $this->order_payment($payment->order_id);

        return redirect()->back();
    }

    public function order_payment($id)
    {
        $order = Order::findOrFail($id);
        $payments = Payment::where('order_id', $order->id)->get();

        $order->payment_cash = $payments->sum('payment_cash');
        $order->payment_transfer = $payments->sum('payment_transfer');

        $order->save();
    }
}
