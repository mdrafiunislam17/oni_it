<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $fillable = [
        'title',
        'image',
        'description',
        'page_id'
    ];
    public function page()
    {
        return $this->belongsTo(Page::class,'page_id','id');
    }
}
