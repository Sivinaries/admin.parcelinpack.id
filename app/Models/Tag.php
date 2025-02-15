<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = 
    [
        'tag',
    ];

    public function subTags()
    {
        return $this->hasMany(SubTag::class);
    }

    public function subproducts()
    {
        return $this->belongsToMany(Subproduct::class, 'sub_tags');
    }

}
