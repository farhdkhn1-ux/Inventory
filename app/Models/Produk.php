<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    protected $fillable = ['category_id', 'name', 'price', 'stock', 'description', 'status'];
}