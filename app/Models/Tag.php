<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_tag',
    ];

    protected $table = 'tags';

    public function products()
    {
        return $this->hasMany(Product::class,'tag_id','id');
    }
}
