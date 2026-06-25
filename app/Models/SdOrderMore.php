<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SdOrderMore extends Model
{
    //
    protected $table = 'sd_order_more';

    protected $connection = 'mysql2';
    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'invoice_id',
        'consignment_id',
        'customerID',
        'clnt_mob',
        'customer_name',
        'mobile',
        'address',
        'reference',
        'customer_category',
        'discount',
        'shipping',
        'g_total',
        'prev_due',
        'total_rcv',
        'p_mathod',
        'delivery_type',
        'agent_comm',
        'type',
        'area_officer',
        'note',
        'salesID',
        'sales_p',
        'time',
        'date',
        'full_date',
        'l_time',
        'pathao',
        'pathao_status',
        'pathao_status_updated_at',
        'activity',
        'reseller_activity',
        'print_activity',
        'branch',
        'up_date',
        'order_type',
    ];
}
