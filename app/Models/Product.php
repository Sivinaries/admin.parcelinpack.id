<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = 
    [
        'product',
        'img',
        'desc',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function subproducts()
    {
        return $this->hasMany(Subproduct::class);
    }


}
