<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'introduce',
        'path',
    ];
    public function combos(): BelongsToMany
    {
        return $this->belongsToMany(Combo::class, 'combo_products', 'product_id', 'combo_id');
    }
}
