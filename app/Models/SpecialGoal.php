<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialGoal extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'serial',
        'status',
        'activity',
    ];
}
