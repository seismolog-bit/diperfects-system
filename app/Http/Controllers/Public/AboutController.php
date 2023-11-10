<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function contact()
    {
        return view('public.about.contact');
    }

    public function about()
    {
        return view('public.about.about');
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
