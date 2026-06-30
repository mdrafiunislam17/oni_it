<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    //


    private function uploadImage($image): array
    {
        $extension = strtolower($image->getClientOriginalExtension());
        $path = public_path('uploads/service/');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        if (!is_writable($path)) {
            throw new \Exception('Upload folder is not writable: ' . $path);
        }

        $baseName = time() . '_' . Str::random(10);

        $mainImageName = $baseName . '.' . $extension;
//        $thumbImageName = $baseName . '_thumb.' . $extension;

        Image::read($image->getRealPath())
            // ->scale(width: 800)
             ->scale(width: 250,height: 320)
            ->save($path . $mainImageName);

//        Image::read($image->getRealPath())
//            ->scale(width: 120)
//            ->save($path . $thumbImageName);

        return [
            'main' => $mainImageName,
//            'thumb' => $thumbImageName,
        ];
    }

     public function index(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $service  = Service::query()
            ->where('activity', '!=', 0)
            ->orderBy('sort', 'asc')
            ->get();
        return view('admin.service.index', compact('settings', 'service'));
    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.service.create', compact('settings'));

    }

    public function edit(Service $service)
    {
         $settings = Setting::query()->pluck("value", "setting_name")->toArray();
          return view('admin.service.edit', compact('settings','service'));
    }

   public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'items' => 'nullable|array',
            'items.*' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        try {

            $service = new Service();

            $service->title = $request->title;
            $service->description = $request->description;
            $service->status = $request->status;
            $service->items = $request->items ?? [];

                   // image upload
            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $service->image = $images['main'];
//                $service->image_thumb = $images['thumb'];
            }

            $service->save();

            return redirect()->back()->with('success', 'Service has been inserted successfully.');

        } catch (QueryException $e) {

            return back()->withInput()->with(
                'error',
                'Database Error (Code: '.$e->getCode().')'
            );

        }
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'items' => 'nullable|array',
            'items.*' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        try {

            $service->title = $request->title;
            $service->description = $request->description;
            $service->status = $request->status;
            $service->items = $request->items ?? [];

                    // MAIN IMAGE upload
                    if ($request->hasFile('image')) {
                        $imagePath = public_path('uploads/service/');

                        if (!empty($service->image) && file_exists($imagePath . $service->image)) {
                            unlink($imagePath . $service->image);
                        }

//                        if (!empty($service->image_thumb) && file_exists($imagePath . $service->image_thumb)) {
//                            unlink($imagePath . $service->image_thumb);
//                        }

                        $images = $this->uploadImage($request->file('image'));
                        $service->image = $images['main'];
//                        $service->image_thumb = $images['thumb'];
                    }


            $service->save();

            return redirect()->back()->with(
                'success',
                'Service has been updated successfully.'
            );

        } catch (QueryException $e) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Database Error (Code: ' . $e->getCode() . ')'
                );
        }
    }

    public function destroy(Service $service)
    {
        try {

            $path = public_path('uploads/service/');

            if ($service->image && file_exists($path . $service->image)) {
                unlink($path . $service->image);
            }

            $service->activity = 0;

            $service->save();

            return redirect()->back()
                ->with('success', 'Service deleted successfully.');

        } catch (\Exception $e) {

            return back()->with(
                'error',
                'An error occurred while deleting the service: ' . $e->getMessage()
            );

        }
    }



}
