<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'short_description',
        'long_description',
        'price',
        'rating',
        'reviews_count',
        'stock',
        'image_url',
        'is_featured',
    ];

    // Relación: UN producto pertenece a UNA categoría
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
