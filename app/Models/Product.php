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
        'new'
    ];

    protected $table = 'products';

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function collection()
    {
        return $this->belongsToMany(Collection::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function variants()
    {
        return $this->belongsToMany(Variant::class);
    }


}