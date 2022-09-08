<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Local Scopes
     */
    public function scopeAvailable($query)
    {
        return $query->where('active', true);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    
}
