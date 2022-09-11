<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $touches = ['category'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Mutators
     */
    // Triquinuela para que al settear desde los campos de formulario poder poner el nombre 'category' en el input.
    public function setCategoryAttribute($value)
    {
        $this->attributes['category_id'] = $value;
    }
    /**
     * Create a custom thumbnail "column" accessor to retrieve this product's
     * photo, or a default if it does not have one.
     * 
     * @return string
     */
    public function getThumbnailAttribute()
    {
        $default = $this->images;

        return ( $default->isNotEmpty())
            ? $default->first()->path
            : 'products//images/no_image_available.png';
    }

    public function getPriceWIthDiscountAttribute()
    {
        return $this->price * (optional($this->discount)->percent / 100);
    }


    /**
     * Scopes
     */
    public function scopeGetFromCategoryIdAndSlug($query, $productSlug, $subCategoryId)
    {
        return $query->where('slug', $productSlug)->where('category_id', $subCategoryId);
    }

    public function scopeGetAllFromCategoryId($query, $categoryId)
    {
        return $query->where('category_id', $categoryId)->where('is_public', true);
    }

    public function scopeGetPublicProducts($query)
    {
        return $query->where('is_public', true);
    }

    /**
     * Relations
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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
    
    public function highlighImages()
    {
        return $this->hasMany(ProductImage::class)->where('highlight', true);
    }

    // Habria estado guay.
    // public function parentCategory()
    // {
    //     return $this->hasOneThrough(
    //         Category::class,
    //         SubCategory::class,
    //         'id', // Foreign key on the cars table...
    //         'parent_id', // Foreign key on the owners table...
    //         'id', // Local key on the mechanics table...
    //         'id' // Local key on the cars table...
    //     );
    // }

    

}
