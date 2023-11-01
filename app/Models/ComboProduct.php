<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ComboProduct extends Model
{
    use HasFactory;
    protected $table = 'combo_products';
    protected $fillable = [
        'product_id',
        'combo_id',
        'introduce',
        'price'
    ];
}
