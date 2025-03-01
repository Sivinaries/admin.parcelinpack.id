<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable =
    [
        'project',
        'img1',
        'img2',
        'desc1',
        'desc2',
    ];
}
