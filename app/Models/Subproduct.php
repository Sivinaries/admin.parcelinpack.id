<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subproduct extends Model
{
    protected $fillable = 
    [
        'product_id',
        'subproduct',
        'price',
        'min',
        'img1',
        'img2',
        'img3',
        'desc1',
        'desc2',
        'desc3',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'sub_tags');
    }

}
