<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'src',
        'alt',
        'image_id',
    ];

    protected $table = 'images';

    public function variant_id()
    {
        return $this->belongsToMany(Variant::class);
    }
}
