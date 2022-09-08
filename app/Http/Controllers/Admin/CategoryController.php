<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.categories.index')
            ->with('categories', ProductCategory::orderBy('parent_id')->get()); // Asi saca primero las sin parent_id (categorias padre)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create')
                ->with('parent_categories', ProductCategory::parentCategories()->get(['id', 'name']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validamos
        $validated = $request->validate([ // Esto devuelve un array...
            'category_parent_id' => 'sometimes|required|exists:product_categories,id',
            'category_name' => 'required|unique:product_categories,name|min:3|max:25',
            'category_desc' => 'required|min:3|max:255'
        ]);

        // Para crear la categoria vemos si viene con una category_parent_id
        if (array_key_exists('category_parent_id', $validated)) {
            // Es una subcategoria
            ProductCategory::create([
                'parent_id' => $validated['category_parent_id'],
                'name' => $validated['category_name'],
                'desc' => $validated['category_desc']
            ]);
        } else {
            // Es una categoria padre
            ProductCategory::create([
                'name' => $validated['category_name'],
                'desc' => $validated['category_desc']
            ]);
        }

        // Redireccion
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
