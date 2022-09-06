<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belogsTo(User::class);
    }

    public function payment_details()
    {
        return $this->belongsTo(PaymentDetails::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItems::class);
    }
}
