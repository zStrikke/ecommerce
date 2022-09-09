<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
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
        // Cogemos los cupones disponibles a aplicar
        $discounts = \App\Models\Discount::available()->get(['id','name','description','discount_percent']);
        // Cogemos las Categorias a las que se puede asociar el producto. Estan de padre a hijo para que sea mas facil listarlas.
        $categories = \App\Models\Category::parentCategories()->with('childrens:id,parent_id,name,description')->get(['id','parent_id','name','description']);

        return view('admin.pages.products.create')
                ->with([
                    'discounts' => $discounts,
                    'categories' => $categories
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = \App\Models\Product::create(
            $request->safe()->except('file')
        );

        if($request->hasFile('file') && $request->file('file')->isValid()){
            
            $path = $request->file('file')->store('products/images', 'public');
    
            $product->images()->create([
                'path' => $path,
            ]);
        }
        return redirect()->route('admin.products.create')->with('status','Product Created succesfully');
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
