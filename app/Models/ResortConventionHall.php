<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResortConventionHall extends Model
{
    //
    protected $fillable = [
        'title',
        'beds',
        'bathrooms',
        'size',
        'location',
        'image',
        'image_thumb',
        'floor_plans_image',
        'status',
        'activity',
        'description',
        'property_type',
    ];
}
