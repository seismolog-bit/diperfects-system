<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('tanggal_order', 'asc')->get();

        return view('admin.order.index', compact('orders'));
    }


    public function order_membership()
    {

    }
}
