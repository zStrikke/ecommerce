<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:5|max:250',
            'sku' => 'required|min:3|max:75|unique:products,sku',
            'price' => 'required|digits_between:0,10000',
            'onsale' => 'sometimes|boolean',
            'public' => 'sometimes|boolean',
            'category' => 'required|exists:product_categories,id',
            //'inventory' => 'required|exists:product_inventory,id', TODO: aclarar esta mierda
            'discount' => 'sometimes|exists:discounts,id',
            'file' => 'required|image|min:1|max:4000'
        ];
    }
}
