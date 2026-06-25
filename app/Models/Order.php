<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'order_number',
        'status',
        'payment_method',
        'payment_status',
        'name',
        'email',
        'phone',
        'country',
        'post_code',
        'address1',
        'address2',
        'coupon',
        'subtotal',
        'total',
        'shipping_charge',
        'cancel_note',
        'page_id',
    ];

    protected $casts = [
        'coupon' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'orders_id', 'id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->withPivot('quantity', 'price');
    }

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id','id');
    }
}
