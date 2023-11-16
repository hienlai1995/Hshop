<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'totalprice',
        'user_id',
    ];
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Products::class, 'order_products', 'order_id', 'product_id')->withPivot('quantity');
    }
}
