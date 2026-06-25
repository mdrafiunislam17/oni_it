<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Microcity extends Model
{
    //

    protected $fillable = [
        'title',
        'image',
        'floor_plans_image',
        'status',
        'activity',
        'description',
    ];
}
