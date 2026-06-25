<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class DetailController extends Controller
{
    //
    public function index(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $details = Detail::query()

            ->orderBy('id', 'asc')
            ->get();
        return view('admin.detail.index', compact('settings', 'details'));
    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $pages = Page::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')->get();

        return view('admin.detail.create', compact('settings' , 'pages'));

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
        $path = public_path('uploads/detail/');

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
            ->cover(1250, 1250)
            ->save($path . $mainImageName);

//        Image::read($image->getRealPath())
//            ->scale(width: 120)
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {


                $detail = new Detail();

                $detail->title = $request->title;
                $detail->page_id = $request->page_id;
                 $detail->description = $request->description;

            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $detail->image = $images['main'];
            }

                $detail->save();


            return redirect()->route('dashboard.detail.index')
                ->with('success', 'Detail created successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }
    }

    public function edit(Detail $detail)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $pages = Page::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')->get();

        return view('admin.detail.edit', compact('settings','detail','pages'));

    }

    public function update(Request $request, Detail $detail)
    {
        $request->validate([
            'title' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            $detail->title = $request->title;
            $detail->page_id = $request->page_id;
            $detail->description = $request->description;



            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $detail->image = $images['main'];
//                $detail->image_thumb = $images['thumb'];
            }

            $detail->save();

            return redirect()->back()
                ->with('success', 'Detail has been updated');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.detail.index')
                ->with('error', $exception->getMessage());
        }
    }

    public function destroy(Detail $detail)
    {
        try {
            $detail->activity = 0; // inactive
            $detail->save();

            return redirect()->route('dashboard.hero.index')
                ->with('success', 'Detail has been deleted');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.hero.index')
                ->with('error', $exception->getMessage());
        }
    }
}
