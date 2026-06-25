<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Rate;
use App\Models\SdItem;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class RateController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $rate = Rate::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'asc')->get();
        return view('admin.rate.index', compact('settings','rate'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.rate.create', compact('settings'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $rate = new Rate();

            $rate->name = $request->name;
            $rate->price = $request->price;
            $rate->status = $request->status;



            $rate->save();

            return redirect()->back()
                ->with('success', 'Rate created successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage())
                ->withInput();
        }
    }

    public function edit(Rate $rate){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.rate.edit', compact('rate', 'settings'));
    }
    public function update(Request $request, Rate $rate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $rate->name = $request->name;
            $rate->price = $request->price;
            $rate->status = $request->status;

            $rate->save();

            return redirect()->back()
                ->with('success', 'Rate updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }
    }

    public function destroy(Rate $rate)
    {
        try {
            $rate->activity = 0; // inactive
            $rate->save();

            return redirect()->route('dashboard.rate.index')
                ->with('success', 'Rate has been deleted');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.rate.index')
                ->with('error', $exception->getMessage());
        }
    }
}
