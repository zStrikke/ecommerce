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
        /**
         * Sacar todos los productos publicos de la base de datos.
         * Separar por 'is_onsale'
         * Agregarles la propiedad 'new' a los creados hace menos de 7 dias
         * Agregar la propiedad 'BestSeller' a los venidods mas de 5 veces
         * Agrupar algunos por categorias
         */
        $products = Product::whereHas('images', function (\Illuminate\Database\Eloquent\Builder $query) { 
                        $query->where('is_highlight', true);
                    })->get();

        $p = Product::get();

        $productsOnSale = $p->filter(function ($value, $key) {
            return $value->is_onsale;
        });

        dd($productsOnSale);

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
