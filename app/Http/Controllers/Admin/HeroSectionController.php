<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class HeroSectionController extends Controller
{
    //

    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $heroes = Hero::query()->orderBy('id', 'desc')->get();

        return view('admin.heroes.index', compact('settings','heroes'));

    }
    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $pages = Page::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')->get();
        return view('admin.heroes.create', compact('settings','pages'));
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
        $path = public_path('uploads/hero/');

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
            ->cover(800, 527)
            ->save($path . $mainImageName);

//        Image::read($image->getRealPath())
//            ->scale(width: 120)
//            ->save($path . $thumbImageName);

        return [
            'main' => $mainImageName,
//            'thumb' => $thumbImageName,
        ];
    }
    public function store(Request $request){
//        dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        try {
            $hero = New Hero();
            $hero->name = $request->name;
            $hero->page_id = $request->page_id;
//            $hero->button_text = $request->button_text;
            $hero->button_link = $request->button_link;

//            if ($request->hasFile('image')) {
//                $images = $this->uploadImage($request->file('image'));
//                $hero->image = $images['main'];
////                $hero->image_thumb = $images['thumb'];
//            }
            $hero->save();
            return redirect()->route('dashboard.hero.index')
                ->with('success','Hero created successfully.');
        }catch (\Exception $exception){
            return back()->with('error', 'An error occurred while creating the hero: ' . $exception->getMessage());
        }
    }

    public function edit(Hero $hero){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $pages = Page::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')->get();
        return view('admin.heroes.edit', compact('hero','settings','pages'));
    }
    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $hero->name = $request->name;
            $hero->page_id = $request->page_id;
//            $hero->button_text = $request->button_text;
            $hero->button_link = $request->button_link;

//            // 🔥 Image update
//            if ($request->hasFile('image')) {
//
//                // old image delete
//                if ($hero->image && file_exists(public_path('uploads/hero/' . $hero->image))) {
//                    unlink(public_path('uploads/hero/' . $hero->image));
//                }
//
//                $images = $this->uploadImage($request->file('image'));
//                $hero->image = $images['main'];
//            }

            $hero->save();

            return redirect()->route('dashboard.hero.index')
                ->with('success', 'Hero updated successfully.');

        } catch (\Exception $exception) {
            return back()->with('error', 'Update failed: ' . $exception->getMessage());
        }
    }

}
