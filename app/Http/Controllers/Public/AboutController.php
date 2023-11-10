<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function contact()
    {
        return view('public.about.contact');
    }

    public function about()
    {
        $count_membership = Membership::count();
        $count_product = Product::count();
        $count_orders = OrderItem::count('qty');

        return view('public.about.about', compact('count_membership', 'count_product', 'count_orders'));
    }

    public function privacy()
    {
        return view('public.about.privacy');
    }

    public function term()
    {
        return view('public.about.term');
    }

    public function news()
    {
        return view('public.about.news');
    }
}
