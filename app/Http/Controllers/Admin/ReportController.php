<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
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

        $dates = $startDate->format('m-d-Y') . ' - ' . $endDate->format('m-d-Y');

        $orders = Order::whereBetween('tanggal_order', [$startDate, $endDate])->where('status', '!=', 3)->get();

        return view('admin.report.index', compact('orders', 'dates', 'startDate', 'endDate'));
    }

    public function finance(Request $request)
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfDay();

        if($request->date)
        {
            $dates = explode(' - ', $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1] . ' 23:59:59');
        }

        $dates = $startDate->format('m-d-Y') . ' - ' . $endDate->format('m-d-Y');
        $payments = Payment::whereBetween('tanggal_transaksi', [$startDate, $endDate])->orderBy('tanggal_transaksi', 'DESC')->get();
        $orders = Order::whereBetween('tanggal_order', [$startDate, $endDate])->where('status', '!=', 3)->get();


        return view('admin.report.finance', compact('payments', 'dates', 'startDate', 'endDate', 'orders'));
    }
}
