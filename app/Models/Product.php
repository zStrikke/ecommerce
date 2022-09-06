<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_categories()
    {
        return $this->belongsTo(ProductCategory::class);
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

}