<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $category = Category::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'asc')->get();

        return view('admin.categories.index', compact('settings','category'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.categories.create', compact('settings'));
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
        $path = public_path('uploads/category/');

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
            ->scale(width: 350)
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
            $category = New Category();
            $category->name = $request->name;
            $category->status = $request->status;
            $category->front_view = $request->front_view;
            $category->slug = Str::slug($request->name);


            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $category->image = $images['main'];
            }


            $category->save();
            return redirect()->back()
                ->with('success','Category created successfully.');;
        }catch (\Exception $exception){
            return back()->with('error', 'An error occurred while creating the category: ' . $exception->getMessage());
        }
    }


    public function edit(Category $category){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.categories.edit', compact('category','settings'));
    }
    public function update(Request $request, Category $category){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        try {
            $category->name = $request->name;
            $category->status = $request->status;
            $category->front_view = $request->front_view;
            $category->slug = Str::slug($request->name);

            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $category->image = $images['main'];
            }

            $category->save();
            return redirect()->back()
                ->with('success','Category updated successfully.');
        }catch (\Exception $exception){
            return back()->with('error', 'An error occurred while updating the category: ' . $exception->getMessage());
        }

    }

    public function destroy(Category $category){
        try {
            $category->activity = 0; // inactive
            $category->save();
            return redirect()->route('dashboard.category.index')
                ->with('success','Category deleted successfully.');
        }catch (\Exception $exception){
            return back()->with('error', 'An error occurred while deleting the category: ' . $exception->getMessage());
        }
    }
}
