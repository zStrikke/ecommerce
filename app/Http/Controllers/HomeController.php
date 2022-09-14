<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        $products = Product::whereHas('images', function(\Illuminate\Database\Eloquent\Builder $query){
            $query->where('is_highlight', true);

        })->get();
        // dd($products);
        return view('front.pages.index')
                ->with(['products' => $products]);
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
