<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    //
    protected $fillable = [
        'name',
        'button_text',
        'button_link',
        'image',
        'page_id',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id','id');
    }
}
