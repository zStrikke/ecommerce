<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $primaryKey = 'slug';
    
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
     * Local Scopes
     */
    public function scopeParentCategories($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeChildCategories($query, $parentId)
    {
        return $query->whereNotNull('parent_id');
    }

    public function scopeGetParentBySlug($query, $slug)
    {
        return $query->whereNull('parent_id')
                        ->where('slug', $slug);
    }

    public function scopeGetChildBySlugAndParentId($query, $slug, $parent_id)
    {
        return $query->where('parent_id', $parent_id)
                        ->where('slug', $slug);
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
        return $this->belongsTo(self::class, 'parent_id'); // Que elegancia la de Francia
    }

    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id'); // Que elegancia la de Francia
    }


}
