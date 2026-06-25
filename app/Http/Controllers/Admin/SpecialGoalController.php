<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpecialGoal;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class SpecialGoalController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $specialGoal = SpecialGoal::query()
            ->where('activity', '!=', 0)
            ->orderBy('serial', 'asc')->get();
        return view('admin.specialGoal.index', compact('settings','specialGoal'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.specialGoal.create', compact('settings'));
    }

    public function store(Request $request)
    {

//        dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {

            $specialGoal = new SpecialGoal();

            $specialGoal->title = $request->title;
            $specialGoal->description = $request->description;
            $specialGoal->serial = $request->serial;
            $specialGoal->status = $request->status;


            $specialGoal->save();

            return redirect()->back()->with('success', 'Special Goal created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(SpecialGoal $specialGoal){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.specialGoal.edit', compact('specialGoal', 'settings'));
    }

    public function update(Request $request, SpecialGoal $specialGoal)
    {

        $request->validate([
            'title' => 'nullable|string|max:255',
        ]);

        try {

            $specialGoal->title = $request->title;
            $specialGoal->description = $request->description;
            $specialGoal->serial = $request->serial;
            $specialGoal->status = $request->status;


            $specialGoal->save();

            return redirect()->back()->with('success', 'SpecialGoal updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(SpecialGoal $specialGoal)
    {
        try {
            $specialGoal->activity = 0; // inactive
            $specialGoal->save();

            return redirect()->back()
                ->with('success', 'Special Goal has been deleted');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }
    }
}
