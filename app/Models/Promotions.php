<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
        'activity',
        'description',
        'type',
    ];
}
