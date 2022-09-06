<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shopping_session()
    {
        return $this->belongsTo(ShoppingSession::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
