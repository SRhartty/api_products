<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     


    protected $fillable = [
        'name',
        'description',
        'short_descripton',
        'sku',
        'stock',
        'price'
    ];

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
