<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         Product::withExists('images')->having('images_exists', 1)->get();
        //"select `products`.*, exists(select * from `product_images` where `products`.`id` = `product_images`.`product_id`) as `images_exists` from `products` having `images_exists` = ?"
        
        //dd(asset('productos/jrZGrrM1PFfMwFhRIa2yKD5M7rvvbCP0rmeMOE02.jpg'));
        return view('admin.pages.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $product = \App\Models\Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'price' => $request->price
        ]);

        // $product = \App\Models\Product::find(1);
        $path = $request->file('file')->storePublicly('products', 'public');

        $product->images()->create([
            'path' => $path,
            'highlight' => false
        ]);

        // dd(asset('storage/' . $product->images()->highlight()->path));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
