<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SdOrderList extends Model
{
    //
    protected $table = 'sd_order_list';

    protected $connection = 'mysql2';
    public $timestamps = false;
    protected $fillable = [
        'orderID',
        'customerID',
        'clnt_mob',
        'cat',
        'pro_id',
        'title',
        'unit',
        'details',
        'agent_point',
        'unit_cost',
        'price',
        'qty',
        'line_total',
        'ses',
        'date',
        'time',
        'branch',
        'activity',
        'type',
        'remove_time',
        'up_date'
    ];
}
