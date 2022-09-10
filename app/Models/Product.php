<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Mutators
     */
    // Triquinuela para que al settear desde los campos de formulario poder poner el nombre 'category' en el input.
    public function setCategoryAttribute($value)
    {
        $this->attributes['category_id'] = $value;
    }

    /**
     * Relations
     */

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function product_inventory()
    {
        return $this->belongsTo(ProductInventory::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function order_items()
    {
        return $this->hasOne(OrderItems::class);
    }

    public function cart_item()
    {
        return $this->hasOne(CartItem::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
