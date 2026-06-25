<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResortConventionHall;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ResortConventionHallController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $resortConventionHall = ResortConventionHall::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'desc')->get();
        return view('admin.resortConventionHall.index', compact('settings','resortConventionHall'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.resortConventionHall.create', compact('settings'));
    }

    private function generateImageName($path, $prefix, $extension)
    {
        $i = 1;

        while (file_exists($path . $prefix . $i . '.' . $extension)) {
            $i++;
        }

        return $prefix . $i;
    }

    private function uploadImage($image): array
    {
        $extension = strtolower($image->getClientOriginalExtension());
        $path = public_path('uploads/resortConventionHall/');

        if (!file_exists($path)) {
            mkdir($path, 0775, true);
        }

        if (!is_writable($path)) {
            throw new \Exception('Upload folder is not writable: ' . $path);
        }

        $baseName = time() . '_' . Str::random(10);

        $mainImageName = $baseName . '.' . $extension;
        $thumbImageName = $baseName . '_thumb.' . $extension;



        Image::read($image->getRealPath())
            ->cover(383, 258)
            ->save($path . $mainImageName);

        Image::read($image->getRealPath())
            ->cover(796, 435)
            ->save($path . $thumbImageName);

        return [
            'main' => $mainImageName,
            'thumb' => $thumbImageName,
        ];
    }

    public function store(Request $request)
    {

//       dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        try {

            $resortConventionHall = new ResortConventionHall();

            $resortConventionHall->title = $request->title;
//            $resortConventionHall->beds = $request->beds;
//            $resortConventionHall->bathrooms = $request->bathrooms;
//            $resortConventionHall->size = $request->size;
            $resortConventionHall->location = $request->location;
            $resortConventionHall->description = $request->description;
            $resortConventionHall->status = $request->status;
            $resortConventionHall->property_type = $request->property_type;

            $path = public_path('uploads/resortConventionHall/');

            // =====================
            // MAIN IMAGE
            // =====================
            if ($request->hasFile('image')) {

                $images = $this->uploadImage($request->file('image'));

                $resortConventionHall->image = $images['main'];
                $resortConventionHall->image_thumb = $images['thumb'];
            }

            // =====================
            // FLOOR PLANS (IMAGE RESIZE 796x435)
            // =====================
//            if ($request->hasFile('floor_plans_image')) {
//
//                $floorImages = [];
//
//                foreach ($request->file('floor_plans_image') as $image) {
//
//                    $name = time() . '_' . uniqid() . '.webp';
//
//                    Image::read($image->getRealPath())
//                        ->scale(width: 500)
//                        ->save($path . $name);
//
//                    $floorImages[] = $name;
//                }
//
//                $resortConventionHall->floor_plans_image = json_encode($floorImages);
//            }

            $resortConventionHall->save();

            return redirect()->back()->with('success', 'ResortConventionHall created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(ResortConventionHall $resortConventionHall){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.resortConventionHall.edit', compact('resortConventionHall', 'settings'));
    }
    public function update(Request $request, ResortConventionHall $resortConventionHall)
    {

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {

            $resortConventionHall->title = $request->title;
//            $resortConventionHall->beds = $request->beds;
//            $resortConventionHall->bathrooms = $request->bathrooms;
//            $resortConventionHall->size = $request->size;
            $resortConventionHall->location = $request->location;
            $resortConventionHall->description = $request->description;
            $resortConventionHall->status = $request->status;
            $resortConventionHall->property_type = $request->property_type;

            // =====================
            // MAIN IMAGE
            // =====================
            if ($request->hasFile('image')) {

                if ($resortConventionHall->image && file_exists(public_path('uploads/resortConventionHall/' . $resortConventionHall->image))) {
                    unlink(public_path('uploads/resortConventionHall/' . $resortConventionHall->image));
                }

                if ($resortConventionHall->image_thumb && file_exists(public_path('uploads/resortConventionHall/' . $resortConventionHall->image_thumb))) {
                    unlink(public_path('uploads/resortConventionHall/' . $resortConventionHall->image_thumb));
                }

                $images = $this->uploadImage($request->file('image'));

                $resortConventionHall->image = $images['main'];
                $resortConventionHall->image_thumb = $images['thumb'];
            }

            // =====================
            // FLOOR PLANS (FIX HERE)
            // =====================
            if ($request->hasFile('floor_plans_image')) {

                $floorImages = [];
                $path = public_path('uploads/resortConventionHall/');

                foreach ($request->file('floor_plans_image') as $image) {

                    $name = time() . '_' . uniqid() . '.webp'; // বা jpg/png যেটা চাও

                    // পুরা process: read -> resize/crop -> save
                    Image::read($image->getRealPath())
                        ->scale(width: 500)
                        ->save($path . $name);

                    $floorImages[] = $name;
                }

                // পুরানো floor plans delete (optional)
                if ($resortConventionHall->floor_plans_image) {
                    foreach (json_decode($resortConventionHall->floor_plans_image) as $old) {
                        $oldPath = public_path('uploads/resortConventionHall/' . $old);
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                }

                $resortConventionHall->floor_plans_image = json_encode($floorImages);
            }

            $resortConventionHall->save();

            return redirect()->back()->with('success', 'ResortConventionHall updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(ResortConventionHall $resortConventionHall)
    {
        try {
            $resortConventionHall->activity = 0; // inactive
            $resortConventionHall->save();

            return redirect()->back()
                ->with('success', 'ResortConventionHall has been deleted');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.resort-convention-halls.index')
                ->with('error', $exception->getMessage());
        }
    }
}
