<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public function index(){

    }

    public function show(Order $order){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $order->load('orderItems.product', 'user');
        return view('admin.invoice.show', compact('order','settings'));
    }
}
