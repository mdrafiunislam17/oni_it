<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    //

    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $vision = Vision::query()
            ->where('activity', '!=', 0)->get();
        return view('admin.vision.index', compact('settings','vision'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.vision.create', compact('settings'));
    }

    public function store(Request $request)
    {

//        dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {

            $vision = new Vision();

            $vision->title = $request->title;


            $vision->save();

            return redirect()->back()->with('success', 'Special Goal created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Vision $vision){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.vision.edit', compact('vision', 'settings'));
    }

    public function update(Request $request, Vision $vision)
    {

        $request->validate([
            'title' => 'nullable|string|max:255',
        ]);

        try {

            $vision->title = $request->title;


            $vision->save();

            return redirect()->back()->with('success', 'Vision updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Vision $vision)
    {
        try {
            $vision->activity = 0; // inactive
            $vision->save();

            return redirect()->back()
                ->with('success', 'Special Goal has been deleted');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }
    }
}
