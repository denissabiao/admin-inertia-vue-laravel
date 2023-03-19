<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'brand',
        'category',
        'price',
        'sale',
        'discount',
        'stock',
        'new',
    ];

    public function collection()
    {
        $this->belongsToMany(CollectionProduct::class, 'product_collections', 'product_id', 'collection_id');
    }
}