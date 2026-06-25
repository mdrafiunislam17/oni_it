<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\SdItem;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $products = Product::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'desc')->get();
        return view('admin.product.index', compact('settings','products'));

    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $sditems = Sditem::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'desc')
            ->get();
        $category = Category::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy('id', 'asc')->get();
        return view('admin.product.create', compact('settings','sditems','category'));
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
        $path = public_path('uploads/product/');

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $product = new Product();

            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->slug = Str::slug($request->name);

            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $product->image = $images['main'];
            }

            $product->save();

            return redirect()->back()
                ->with('success', 'Product created successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage())
                ->withInput();
        }
    }

    public function edit(Product $product){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $sditems = Sditem::query()
            ->where('activity', '!=', 0)
            ->orderBy('id', 'desc')
            ->get();
        $category = Category::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy('id', 'asc')->get();
        return view('admin.product.edit', compact('product', 'settings','sditems','category'));
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->slug = Str::slug($request->name);

            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $product->image = $images['main'];
            }

            $product->save();

            return redirect()->back()
                ->with('success', 'Product updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->activity = 0; // inactive
            $product->save();

            return redirect()->route('dashboard.product.index')
                ->with('success', 'Product has been deleted');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.product.index')
                ->with('error', $exception->getMessage());
        }
    }

}
