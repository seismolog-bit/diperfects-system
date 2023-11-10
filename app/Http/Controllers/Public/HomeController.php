<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newArrivals = Product::orderBy('created_at', 'ASC')->take(5)->get();
        $populars = Product::orderBy('views', 'DESC')->take(6)->get();
        $features = Feature::take(4)->get();
        $products = Product::orderBy('id', 'DESC')->take(12)->get();

        return view('welcome', compact('newArrivals', 'populars', 'features', 'products'));
    }
}
