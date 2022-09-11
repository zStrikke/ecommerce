<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($categorySlug)
    {
        // Asi es lo mas "comodo" ya que el ->firstOrCreate() manda un 404 apenas no lo encuentra por lo que ni se settea la variable (creo)
        // Entonces sabemos que si los pasos "siguen" es porque ha ido correctamente la cosa
        $category = Category::GetParentBySlug($categorySlug)->firstOrFail();

        $products = $category->childs()->with('products.discount')->get();
        return $products;
    }
}
