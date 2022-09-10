<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ShopController extends Controller
{
    public function index()
    {
        return Product::get();
    }

    public function shopCategories(Category $category)
    {
        if(auth()->check())
            dd(auth()->user()->cart_items);
        // dd(auth()->user()->cart_items);
        // dd(auth()->id());
        // dd(session()->getId());

        
        // >>> ShoppingSession::where('id', 'NgbNDJkYTFLpE8m0VI4SIappwOANO4e8n2UMvuuJ')->first()->cart_items()->create(['product_id' => 1])
        dd(\App\Models\Session::where('id', 'NgbNDJkYTFLpE8m0VI4SIappwOANO4e8n2UMvuuJ')->first()->cart_items());
        dd(CartItem::find(1)->shopping_session());
        dd(\App\Models\Session::where('id', session()->getId())->first());
        $payload = auth()->user()->sessions;
            $payload->map(function($item, $key){
                dump(unserialize(base64_decode($item->payload)));
            });
        dd(auth()->check());
    }
}
