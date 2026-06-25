<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ServiceCategoryController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $serviceCategory = ServiceCategory::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'desc')->get();
        return view('admin.serviceCategory.index', compact('settings','serviceCategory'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.serviceCategory.create', compact('settings'));
    }


    private function uploadImage($image): array
    {
        $extension = strtolower($image->getClientOriginalExtension());
        $path = public_path('uploads/serviceCategory/');

        if (!file_exists($path)) {
            mkdir($path, 0775, true);
        }

        if (!is_writable($path)) {
            throw new \Exception('Upload folder is not writable: ' . $path);
        }

        $baseName = time() . '_' . Str::random(10);

        $mainImageName = $baseName . '.' . $extension;
//        $thumbImageName = $baseName . '_thumb.' . $extension;



        Image::read($image->getRealPath())
            ->cover(563, 563)
            ->save($path . $mainImageName);

//        Image::read($image->getRealPath())
//            ->cover(796, 435)
//            ->save($path . $thumbImageName);

        return [
            'main' => $mainImageName,
//            'thumb' => $thumbImageName,
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        try {
            $serviceCategory = new ServiceCategory();

            $serviceCategory->title = $request->title;
            $serviceCategory->description = $request->description;

            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $serviceCategory->image = $images['main'];
            }

            $serviceCategory->save();

            return redirect()->back()->with('success', 'Service Category created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(ServiceCategory $serviceCategory){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.serviceCategory.edit', compact('serviceCategory', 'settings'));
    }
    public function update(Request $request, ServiceCategory $serviceCategory)
    {

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {

            $serviceCategory->title = $request->title;
            $serviceCategory->description = $request->description;

            // =====================
            // MAIN IMAGE
            // =====================
            if ($request->hasFile('image')) {

                if ($serviceCategory->image && file_exists(public_path('uploads/serviceCategory/' . $serviceCategory->image))) {
                    unlink(public_path('uploads/serviceCategory/' . $serviceCategory->image));
                }



                $images = $this->uploadImage($request->file('image'));

                $serviceCategory->image = $images['main'];
            }



            $serviceCategory->save();

            return redirect()->back()->with('success', 'ServiceCategory updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        try {
            if ($serviceCategory->image && file_exists(public_path('uploads/serviceCategory/' . $serviceCategory->image))) {
                unlink(public_path('uploads/serviceCategory/' . $serviceCategory->image));
            }
            $serviceCategory->activity = 0; // inactive
            $serviceCategory->save();

            return redirect()->back()
                ->with('success', 'ServiceCategory has been deleted');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.microcity.index')
                ->with('error', $exception->getMessage());
        }
    }
}
