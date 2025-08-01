<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'shop_id','weight'];

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->slug = static::generateUniqueSlug($product->name);
        });
    }

    protected static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $i = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i;
            $i++;
        }

        return $slug;
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }
    public function review()
    {
        return $this->hasMany(Rating::class);
    }
    public function rating()
    {
        return $this->hasOne(RatingSummary::class);
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
 public function orderItems()
{
    return $this->hasManyThrough(
        OrderItem::class,        
        ProductVariant::class,   
        'product_id',            
        'product_variant_id',    
        'id',                    
        'id'                     
    );
}
 public function getSoldAttribute()
    {
        return $this->orderItems()->whereHas('order', fn($q) => $q->where('status', 3))->sum('quantity');
    }
   
}
