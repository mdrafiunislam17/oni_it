<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Promotions;
use App\Models\SdItem;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class PromotionsController extends Controller
{
    //

    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $promotions = Promotions::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'asc')->get();
        return view('admin.promotion.index', compact('settings','promotions'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.promotion.create', compact('settings'
            ));
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
        $path = public_path('uploads/promotions/');

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
            ->scale(width: 650)
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
            'name' => 'required|string|max:255',
        ]);

        try {
            $promotions = new Promotions();

            $promotions->name = $request->name;
            $promotions->description = $request->description;
            $promotions->status = $request->status;
            $promotions->type = $request->type;
            $promotions->slug = Str::slug($request->name);

            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $promotions->image = $images['main'];
            }

            $promotions->save();

            return redirect()->back()
                ->with('success', 'Promotions created successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage())
                ->withInput();
        }
    }

    public function edit(Promotions $promotions){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $sditems = Sditem::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'desc')
            ->get();
        $category = Category::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy('id', 'asc')->get();
        return view('admin.promotion.edit', compact('promotions', 'settings','sditems','category'));
    }
    public function update(Request $request, Promotions $promotions)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $promotions->name = $request->name;
            $promotions->description = $request->description;
            $promotions->status = $request->status;
            $promotions->type = $request->type;
            $promotions->slug = Str::slug($request->name);

            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $promotions->image = $images['main'];
            }

            $promotions->save();

            return redirect()->back()
                ->with('success', 'Promotions updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }
    }

    public function destroy(Promotions $promotions)
    {
        try {
            $promotions->activity = 0; // inactive
            $promotions->save();

            return redirect()->route('dashboard.promotions.index')
                ->with('success', 'Promotions has been deleted');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.promotions.index')
                ->with('error', $exception->getMessage());
        }
    }
}
