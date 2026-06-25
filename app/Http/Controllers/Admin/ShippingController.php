<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    //

    public function index(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $shippings = Shipping::all();
        return view('admin.shipping.index', compact('settings', 'shippings'));
    }

    public function  create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $pages = Page::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')->get();
        return view('admin.shipping.create', compact('settings','pages'));

    }


    public function store(Request $request){
        try {




            $shipping = new Shipping();
            $shipping->page_id  = $request->page_id;
            $shipping->area  = $request->area;
            $shipping->charge = $request->charge;
            $shipping->save();

            return redirect()->back()->with('success', 'Shipping created successfully');

        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Shipping $shipping)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $pages = Page::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')->get();
        return view('admin.shipping.edit', compact('shipping', 'settings','pages'));

    }

    public function update(Request $request, Shipping $shipping){
        try {

            $shipping->page_id  = $request->page_id;
            $shipping->area  = $request->area;
            $shipping->charge = $request->charge;

            $shipping->save();

            return redirect()->back()->with('success', 'Shipping updated successfully');

        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Shipping $shipping){
        $shipping->delete();
    }
}
