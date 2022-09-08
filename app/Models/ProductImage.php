<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeHighlight($query)
    {
        return $query->where('highlight', true);
    }

    public function getPathAttribute()
    {
        return $this->path ?? 'products/fallback/no-image-available.png';
    }
}
