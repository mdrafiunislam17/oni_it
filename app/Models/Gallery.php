<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = [
        'title',
        'status',
        'image',
        'activity',
        'type',
        'page_id'
    ];
    public function page()
    {
        return $this->belongsTo(Page::class,'page_id','id');
    }
}
