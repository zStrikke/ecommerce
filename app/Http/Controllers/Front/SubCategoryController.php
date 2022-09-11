<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index($categorySlug, $subCategorySlug)
    {
        // Asi es lo mas "comodo" ya que el ->firstOrCreate() manda un 404 apenas no lo encuentra por lo que ni se settea la variable (creo)
        // Entonces sabemos que si los pasos "siguen" es porque ha ido correctamente la cosa
        $category = Category::GetParentBySlug($categorySlug)->firstOrFail();
        // Comprobamos que la relacion entre categoria y subCategoria es correcta
        $subCategory = Category::GetChildBySlugAndParentId($subCategorySlug, $category->id)->firstOrFail();

        // Esto me da que no porque no deja hacer paginacion de la nested relation (products)
        // $subCategory->load('products.discount');

        $products = $subCategory->products()->with('discount')->paginate(2);
        return $products;
    }
}
