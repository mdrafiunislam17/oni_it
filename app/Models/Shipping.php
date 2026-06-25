<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $fillable = ['area', 'charge','page_id'];

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id','id');
    }
}
