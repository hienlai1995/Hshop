<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Combo extends Model
{
    use HasFactory;
    protected $table = 'combos';
    protected $fillable = [
        'name',
        'price',
        'introduce',
    ];
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Products::class, 'combo_products', 'combo_id', 'product_id');
    }
}
