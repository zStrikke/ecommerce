<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(asset('storage/images/2-carpenter-tools-banner-1.jpg'));
        return view('front.pages.index');
    }

    public function shop()
    {
        return view('front.pages.shop');
    }
    
    public function cart()
    {
        return view('front.pages.cart');
    }
}
