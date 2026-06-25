<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Microcity;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class MicrocityController extends Controller
{
    //

    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $microcity = Microcity::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'desc')->get();
        return view('admin.microcity.index', compact('settings','microcity'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.microcity.create', compact('settings'));
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
        $path = public_path('uploads/microcity/');

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
            ->cover(796, 435)
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

//        dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        try {

            $microcity = new Microcity();

            $microcity->title = $request->title;
            $microcity->description = $request->description;
            $microcity->status = $request->status;

            $path = public_path('uploads/microcity/');

            // =====================
            // MAIN IMAGE
            // =====================
            if ($request->hasFile('image')) {

                $images = $this->uploadImage($request->file('image'));

                $microcity->image = $images['main'];
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

                $microcity->floor_plans_image = json_encode($floorImages);
            }

            $microcity->save();

            return redirect()->back()->with('success', 'Microcity created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Microcity $microcity){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.microcity.edit', compact('microcity', 'settings'));
    }
    public function update(Request $request, Microcity $microcity)
    {

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {

            $microcity->title = $request->title;
            $microcity->description = $request->description;
            $microcity->status = $request->status;

            // =====================
            // MAIN IMAGE
            // =====================
            if ($request->hasFile('image')) {

                if ($microcity->image && file_exists(public_path('uploads/microcity/' . $microcity->image))) {
                    unlink(public_path('uploads/microcity/' . $microcity->image));
                }



                $images = $this->uploadImage($request->file('image'));

                $microcity->image = $images['main'];
            }

            // =====================
            // FLOOR PLANS (FIX HERE)
            // =====================
            if ($request->hasFile('floor_plans_image')) {

                $floorImages = [];
                $path = public_path('uploads/microcity/');

                foreach ($request->file('floor_plans_image') as $image) {

                    $name = time() . '_' . uniqid() . '.webp'; // বা jpg/png যেটা চাও

                    // পুরা process: read -> resize/crop -> save
                    Image::read($image->getRealPath())
                        ->scale(width: 500)
                        ->save($path . $name);

                    $floorImages[] = $name;
                }

                // পুরানো floor plans delete (optional)
                if ($microcity->floor_plans_image) {
                    foreach (json_decode($microcity->floor_plans_image) as $old) {
                        $oldPath = public_path('uploads/microcity/' . $old);
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                }

                $microcity->floor_plans_image = json_encode($floorImages);
            }

            $microcity->save();

            return redirect()->back()->with('success', 'Microcity updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Microcity $microcity)
    {
        try {

            $path = public_path('uploads/microcity/');

            // Main image delete
            if (!empty($microcity->image)) {
                $mainImage = $path . $microcity->image;

                if (file_exists($mainImage)) {
                    unlink($mainImage);
                }
            }

            // Floor plan images delete
            if (!empty($microcity->floor_plans_image)) {

                $floorImages = json_decode($microcity->floor_plans_image, true);

                if (is_array($floorImages)) {
                    foreach ($floorImages as $floorImage) {

                        if (!empty($floorImage)) {
                            $floorImagePath = $path . $floorImage;

                            if (file_exists($floorImagePath)) {
                                unlink($floorImagePath);
                            }
                        }
                    }
                }
            }

            // Soft delete by activity
            $microcity->activity = 0;
            $microcity->save();

            return redirect()
                ->back()
                ->with('success', 'Microcity has been deleted successfully');

        } catch (\Exception $exception) {

            return redirect()
                ->back()
                ->with('error', $exception->getMessage());
        }
    }
}
