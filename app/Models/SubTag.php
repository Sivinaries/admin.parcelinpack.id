<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubTag extends Model
{
    protected $fillable = 
    [
        'subproduct_id',
        'tag_id',
    ];

    public function subproduct()
    {
        return $this->belongsTo(Subproduct::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }



}
