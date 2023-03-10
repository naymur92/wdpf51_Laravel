<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'product_category', 'product_details', 'product_price', 'product_stock', 'product_image'];

    public function cart_items()
    {
        return $this->hasMany(related: Cart::class, foreignKey: 'product_id');
    }
}
