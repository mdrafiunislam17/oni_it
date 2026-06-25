<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use App\Models\SdItem;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class PropertyController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $property = Property::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'desc')->get();
        return view('admin.property.index', compact('settings','property'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.property.create', compact('settings'));
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
        $path = public_path('uploads/property/');

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

//        dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        try {

            $property = new Property();

            $property->title = $request->title;
            $property->location = $request->location;
            $property->description = $request->description;
            $property->status = $request->status;
            $property->propertyType = $request->propertyType;

            $path = public_path('uploads/property/');

            // =====================
            // MAIN IMAGE
            // =====================
            if ($request->hasFile('image')) {

                $images = $this->uploadImage($request->file('image'));

                $property->image = $images['main'];
                $property->image_thumb = $images['thumb'];
            }

            // =====================
            // FLOOR PLANS (IMAGE RESIZE 796x435)
            // =====================
            if ($request->hasFile('floor_plans_image')) {

                $floorImages = [];

                foreach ($request->file('floor_plans_image') as $image) {

                    $name = time() . '_' . uniqid() . '.webp';

                    Image::read($image->getRealPath())
                        ->scale(width: 500)
                        ->save($path . $name);

                    $floorImages[] = $name;
                }

                $property->floor_plans_image = json_encode($floorImages);
            }

            $property->save();

            return redirect()->back()->with('success', 'Property created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Property $property){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.property.edit', compact('property', 'settings'));
    }
    public function update(Request $request, Property $property)
    {

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {

            $property->title = $request->title;
            $property->location = $request->location;
            $property->description = $request->description;
            $property->status = $request->status;
            $property->propertyType = $request->propertyType;

            // =====================
            // MAIN IMAGE
            // =====================
            if ($request->hasFile('image')) {

                if ($property->image && file_exists(public_path('uploads/property/' . $property->image))) {
                    unlink(public_path('uploads/property/' . $property->image));
                }

                if ($property->image_thumb && file_exists(public_path('uploads/property/' . $property->image_thumb))) {
                    unlink(public_path('uploads/property/' . $property->image_thumb));
                }

                $images = $this->uploadImage($request->file('image'));

                $property->image = $images['main'];
                $property->image_thumb = $images['thumb'];
            }

            // =====================
            // FLOOR PLANS (FIX HERE)
            // =====================
            if ($request->hasFile('floor_plans_image')) {

                $floorImages = [];
                $path = public_path('uploads/property/');

                foreach ($request->file('floor_plans_image') as $image) {

                    $name = time() . '_' . uniqid() . '.webp'; // বা jpg/png যেটা চাও

                    // পুরা process: read -> resize/crop -> save
                    Image::read($image->getRealPath())
                        ->scale(width: 500)
                        ->save($path . $name);

                    $floorImages[] = $name;
                }

                // পুরানো floor plans delete (optional)
                if ($property->floor_plans_image) {
                    foreach (json_decode($property->floor_plans_image) as $old) {
                        $oldPath = public_path('uploads/property/' . $old);
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                }

                $property->floor_plans_image = json_encode($floorImages);
            }

            $property->save();

            return redirect()->back()->with('success', 'Property updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Property $property)
    {
        try {
            $property->activity = 0; // inactive
            $property->save();

            return redirect()->back()
                ->with('success', 'Property has been deleted');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.property.index')
                ->with('error', $exception->getMessage());
        }
    }
}
