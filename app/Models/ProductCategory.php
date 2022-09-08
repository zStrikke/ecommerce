<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Local Scopes
     */
    public function scopeParentCategories($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeChildCategories($query)
    {
        return $query->whereNotNull('parent_id');
    }

    public function scopeChildOf($query, $parent)
    {
        return $query->where('parent_id', $parent);
    }

    /**
     * Getter
     */
    public function getShortDescAttribute()
    {
        return Str::limit($this->attributes['description'], 20, '...');
    }
     /**
      * Eloquent Relations
      */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function childrens()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }


}
