<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $touches = ['cart'];

    public function session()
    {
        return $this->belongsTo(\App\Models\Session::class );
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
