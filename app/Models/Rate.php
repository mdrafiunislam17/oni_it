<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    //

    protected $fillable = [
        'name',
        'price',
        'status',
        'activity',
    ];
}
