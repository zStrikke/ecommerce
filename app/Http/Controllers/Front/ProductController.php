<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($categorySlug, $subCategorySlug, $productSlug)
    {
        // Asi es lo mas "comodo" ya que el ->firstOrCreate() manda un 404 apenas no lo encuentra por lo que ni se settea la variable (creo)
        // Entonces sabemos que si los pasos "siguen" es porque ha ido correctamente la cosa
        $category = Category::GetParentBySlug($categorySlug)->firstOrFail();
        // Comprobamos que la relacion entre categoria y subCategoria es correcta
        $subCategory = Category::GetChildBySlugAndParentId($subCategorySlug, $category->id)->firstOrFail();

        // Y ya terminamos cogiendo el producto especificado por la categoria (subcategoria) "validada"
        $product = Product::getFromCategoryAndSlug($productSlug, $subCategory->id)->firstOrFail();

        // Por usar el abort_if que me apetecia comprobamos que el producto aparte de existir es publico.
        abort_if(!$product->public, 404);

        //Hacer que se corresponda con la vista de detalle de producto. Por ejemplo aniadir un campo de "lista de caracteristicas"
        // que como en IMAWEB se separe por ; o | y en la vista hacer un explode.
        return $product;
    }
}
