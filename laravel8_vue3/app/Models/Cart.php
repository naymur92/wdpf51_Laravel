<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity', 'price', 'user_id'];

    public function product()
    {
        return $this->belongsTo(related: Product::class, foreignKey: 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }
}
