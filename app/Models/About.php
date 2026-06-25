<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'activity',
        'image',
        'image1',
        'section_type',
    ];
}
