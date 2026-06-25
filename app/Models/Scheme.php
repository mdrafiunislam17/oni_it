<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'email',
        'location',
        'amount',
        'status',
        'activity',
    ];
}
