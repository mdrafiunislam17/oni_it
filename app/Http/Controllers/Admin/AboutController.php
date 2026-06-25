<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class AboutController extends Controller
{
    //

    public function index()
    {
        $abouts = About::query()
            ->where('activity', '!=', 0)
            ->latest()->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.abouts.index',compact('abouts','settings'));
    }

    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.abouts.create',compact('settings'));

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
        $path = public_path('uploads/about/');

        if (!file_exists($path)) {
            mkdir($path, 0775, true);
        }

        if (!is_writable($path)) {
            throw new \Exception('Upload folder is not writable: ' . $path);
        }

        $baseName = time() . '_' . Str::random(10);

        $mainImageName = $baseName . '.' . $extension;
        $aboutImageName = $baseName . '_about2.' . $extension;



        Image::read($image->getRealPath())
            ->scale(width: 600)
            ->save($path . $mainImageName);

        Image::read($image->getRealPath())
            ->scale(width: 600)
            ->save($path . $aboutImageName);

        return [
            'main' => $mainImageName,
            'about' => $aboutImageName,
        ];
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        try {
            $about = new About();

             $about->title = $request->title;
             $about->subtitle = $request->subtitle;
             $about->description = $request->description;


            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $about->image = $images['main'];
            }

            if ($request->hasFile('image1')) {
                $images = $this->uploadImage($request->file('image1'));
                $about->image1 = $images['about'];
            }



            $about->save();

            return redirect()->back()->with('success', 'About has been inserted successfully.');

        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Database Error (Code: ' . $e->getCode() . ')');
        }
    }

    public function edit(About $about)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.abouts.edit',compact('about','settings'));

    }

    public function update(Request $request, About $about){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        try {
              $about->title = $request->title;
             $about->subtitle = $request->subtitle;
             $about->description = $request->description;

            if ($request->hasFile('image')) {
                $images = $this->uploadImage($request->file('image'));
                $about->image = $images['main'];
            }

            if ($request->hasFile('image1')) {
                $images = $this->uploadImage($request->file('image1'));
                $about->image1 = $images['about'];
            }

            $about->save();

            return redirect()->back()->with('success', 'About has been updated successfully.');

        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Database Error (Code: ' . $e->getCode() . ')');
        }
    }



   public function destroy(About $about)
    {
        try {
            $path = public_path('uploads/about/');

            if ($about->image && file_exists($path . $about->image)) {
                unlink($path . $about->image);
            }

            if ($about->image1 && file_exists($path . $about->image1)) {
                unlink($path . $about->image1);
            }

            $about->activity = 0;
            $about->save();

            return redirect()->back()
                ->with('success', 'About deleted successfully.');

        } catch (\Exception $exception) {
            return back()->with('error', 'An error occurred while deleting the about: ' . $exception->getMessage());
        }
    }

}
