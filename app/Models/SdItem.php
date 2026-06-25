<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SdItem extends Model
{
    protected $table = 'sd_item_l';

    protected $connection = 'mysql2'; // second database use করলে

    public $timestamps = false; // কারণ created_at / updated_at নাই

    protected $fillable = [
        'item_name',
        'item_code',
        'brand',
        'unit',
        'reminder',
        'category',
        'details',
        'type',
        'type_2',
        'branch',
        'unit_cost',
        'profit',
        'point',
        'agent_sale_p',
        'tp_price',
        'sell',
        'img1',
        'img2',
        'date',
        'up_date',
        'activity'
    ];
}
