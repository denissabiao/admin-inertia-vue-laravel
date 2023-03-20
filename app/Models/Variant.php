<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'size',
        'color',
        'image_id',
    ];

    protected $table = 'variants';


    
}
