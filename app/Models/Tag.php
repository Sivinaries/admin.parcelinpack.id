<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag',
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_tags');
    }
}
