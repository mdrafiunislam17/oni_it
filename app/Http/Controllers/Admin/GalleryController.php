<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class GalleryController extends Controller
{
    //

    public function index(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $galleries = Gallery::query()
            ->where('activity', '!=', 0)
            ->where('type', 'gallery')
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.gallery.index', compact('settings',  'galleries'));
    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $pages = Page::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')->get();

        return view('admin.gallery.create', compact('settings','pages'));

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
        $extension = $image->getClientOriginalExtension();
        $path = public_path('uploads/gallery/');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


        $baseName = now()->format('YmdHis') . rand(10,99);

        $mainImageName = $baseName . '.' . $extension;
//        $thumbImageName = $baseName . '_thumb.' . $extension;



        Image::read($image->getRealPath())
            ->cover(310, 365)
            ->save($path . $mainImageName);

//        Image::read($image->getRealPath())
//            ->scale(width: 120)
//            ->save($path . $thumbImageName);

        return [
            'main' => $mainImageName,
//            'thumb' => $thumbImageName
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        try {
            $gallery = new Gallery();

            $gallery->title = $request->title;
//            $gallery->page_id = $request->page_id;
            $gallery->status = $request->status ?? 1;
            $gallery->activity = $request->activity ?? 1;





            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $gallery->image = $images['main'];
//                $gallery->image_thumb = $images['thumb'];
            }

            $gallery->save();

            return redirect()->back()
                ->with('success', 'Spectacular has been created');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.gallery.index')
                ->with('error', $exception->getMessage());
        }
    }

    public function edit(Gallery $gallery){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $pages = Page::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')->get();

        return view('admin.gallery.edit', compact('settings',  'gallery','pages'));

    }

    public function update(Request $request, Gallery $gallery)
    {

        $request->validate([
            'title' => 'nullable|string|max:255',

        ]);

        try {
            $gallery->title = $request->title;
//            $gallery->page_id = $request->page_id;

            $gallery->activity = $request->activity ?? $gallery->activity;

            $gallery->status = $request->status ?? 1;




            // MAIN IMAGE upload
            if ($request->hasFile('image')) {
                $imagePath = public_path('uploads/gallery/');

                if (!empty($gallery->image) && file_exists($imagePath . $gallery->image)) {
                    unlink($imagePath . $gallery->image);
                }
//
//                if (!empty($gallery->image_thumb) && file_exists($imagePath . $gallery->image_thumb)) {
//                    unlink($imagePath . $gallery->image_thumb);
//                }

                $images = $this->uploadImage($request->file('image'));
                $gallery->image = $images['main'];
//                $gallery->image_thumb = $images['thumb'];
            }

            $gallery->save();

            return redirect()->back()->with('success', 'Spectacular has been updated');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.gallery.index')
                ->with('error', $exception->getMessage());
        }

    }

    public function destroy(Gallery $gallery)
    {
        try {
            $gallery->activity = 0; // inactive
            $gallery->save();

            return redirect()->route('dashboard.gallery.index')
                ->with('success', 'Spectacular has been Delete');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.gallery.index')
                ->with('error', $exception->getMessage());
        }
    }






}
