<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order_details()
    {
        return $this->belongsTo(OrderDetails::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
