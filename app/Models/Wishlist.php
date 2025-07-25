<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public $timestamps = false;

    protected $fillable = ['reseller_id', 'product_id'];
    public function reseller()
    {
        return $this->belongsTo(Reseller::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
