<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'min',
        'img1',
        'img2',
        'img3',
        'desc1',
        'desc2',
        'desc3',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

}
