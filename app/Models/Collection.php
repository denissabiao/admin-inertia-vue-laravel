<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
    ];

    protected $table = 'collections';

    public function products()
    {
        return $this->hasMany(Product::class,'tag_id','id');
    }
}
