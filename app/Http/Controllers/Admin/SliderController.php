<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image;

class SliderController extends Controller
{
    //

    public function index(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $sliders  = Slider::query()
            ->where('activity', '!=', 0)
            ->orderBy('sort', 'asc')
            ->get();
        return view('admin.slider.index', compact('settings', 'sliders'));
    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $nextSort = (Slider::max('sort') ?? 0) + 1;

        return view('admin.slider.create', compact('settings', 'nextSort'));

    }




    private function uploadCroppedImage($croppedImage): array
    {
        $path = public_path('uploads/slider/');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $baseName = now()->format('YmdHis') . rand(10, 99);
        $mainImageName = $baseName . '.jpg';

        // Remove base64 image prefix
        $croppedImage = preg_replace('/^data:image\/\w+;base64,/', '', $croppedImage);
        $croppedImage = str_replace(' ', '+', $croppedImage);

        $imageData = base64_decode($croppedImage);

        if (!$imageData) {
            throw new \Exception('Invalid cropped image data.');
        }

        Image::read($imageData)
            ->cover(1920, 994)
            ->save($path . $mainImageName, quality: 92);

        return [
            'main' => $mainImageName,
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'nullable|boolean',
            'cropped_image' => 'required|string',
        ]);

        try {
            $slider = new Slider();

            $slider->title = $request->title;
            $slider->subtitle = $request->subtitle;
            $slider->sort = $request->sort;
            $slider->status = $request->status ?? 1;
            $slider->activity = $request->activity ?? 1;

            if ($request->filled('cropped_image')) {
                $images = $this->uploadCroppedImage($request->cropped_image);
                $slider->image = $images['main'];
            }

            $slider->save();

            return redirect()->back()
                ->with('success', 'Slider has been created');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.slider.index')
                ->with('error', $exception->getMessage());
        }
    }


    public function edit(Slider $slider){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.slider.edit', compact('settings',  'slider'));

    }


    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'status' => 'nullable|boolean',
            'cropped_image' => 'nullable|string',
        ]);

        try {
            $slider->title = $request->title;
            $slider->subtitle = $request->subtitle;
            $slider->status = $request->status ?? 1;
            $slider->activity = $request->activity ?? 1;

            /*
            |--------------------------------------------------------------------------
            | Update cropped image only
            |--------------------------------------------------------------------------
            | Important: Do not save $request->file('image') directly.
            | cropped_image hidden input থেকে crop করা image save হবে।
            */

            if ($request->filled('cropped_image')) {

                // Delete old image
                if ($slider->image && file_exists(public_path('uploads/slider/' . $slider->image))) {
                    unlink(public_path('uploads/slider/' . $slider->image));
                }

                // Save new cropped image
                $images = $this->uploadCroppedImage($request->cropped_image);

                $slider->image = $images['main'];
            }

            $slider->save();

            return redirect()->back()
                ->with('success', 'Slider has been updated');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.slider.index')
                ->with('error', $exception->getMessage());
        }
    }

    public function destroy(Slider $slider)
    {
        try {


            if ($slider->image && file_exists(public_path('uploads/slider/' . $slider->image))) {
                unlink(public_path('uploads/slider/' . $slider->image));
            }



            $slider->activity = 0;
            $slider->save();

            return redirect()->back()
                ->with('success', 'Slider has been deleted');

        } catch (\Exception $exception) {

            return redirect()->route('dashboard.slider.index')
                ->with('error', $exception->getMessage());
        }
    }


    public function sortUpdate(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*.id' => 'required|integer|exists:sliders,id',
            'orders.*.sort' => 'required|integer',
        ]);

        foreach ($request->orders as $order) {
            Slider::query()->where('id', $order['id'])->update([
                'sort' => $order['sort'],
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Slider sort updated successfully',
        ]);
    }



}
