<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scheme;
use App\Models\Setting;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    //


    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $scheme = Scheme::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'desc')->get();
        return view('admin.scheme.index', compact('settings','scheme'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.scheme.create', compact('settings'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $scheme = new Scheme();

            $scheme->name = $request->name;
            $scheme->phone = $request->phone;
            $scheme->email = $request->email;
            $scheme->location = $request->location;
            $scheme->amount = $request->amount;
            $scheme->status = $request->status;


            $scheme->save();

            return redirect()->back()
                ->with('success', 'Scheme created successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage())
                ->withInput();
        }
    }

    public function show(Scheme $scheme)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.scheme.show', compact('scheme','settings'));
    }
    public function edit(Scheme $scheme){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.scheme.edit', compact('scheme','settings'));
    }
    public function update(Request $request, Scheme $scheme){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        try {
            $scheme->name = $request->name;
            $scheme->phone = $request->phone;
            $scheme->email = $request->email;
            $scheme->location = $request->location;
            $scheme->amount = $request->amount;
            $scheme->status = $request->status;

            $scheme->save();

            return redirect()->back()
                ->with('success', 'Scheme updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage())
                ->withInput();
        }
    }
    public function destroy(Scheme $scheme){
        try {
            $scheme->activity = 0; // inactive
            $scheme->save();

            return redirect()->back()
                ->with('success', 'Scheme deleted successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }
    }
}
