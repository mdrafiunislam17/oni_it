<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $settings = Setting::pluck('value', 'setting_name')->toArray();

        return view('admin.profile.index', compact('user', 'settings', ));
    }

    public function profileUpdate(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;

            if ($request->hasFile('image')) {

                $uploadPath = public_path('uploads/profile/');

                // old main image delete
                if ($user->image && file_exists($uploadPath . $user->image)) {
                    unlink($uploadPath . $user->image);
                }



                $user->image = $this->uploadImage($request->file('image'));
            }

            $user->save();

            return back()->with('success', 'Profile updated successfully.');
        } catch (QueryException $exception) {
            Log::error('Profile update failed', [
                'error' => $exception->getMessage(),
            ]);

            return back()->with('error', 'Database error!');
        }
    }

    private function uploadImage($image): string
    {
        $path = public_path('uploads/profile/');

        // folder create if not exists
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $extension = $image->getClientOriginalExtension();

        $baseName = now()->format('YmdHis') . rand(10, 99);

        $mainImageName = $baseName . '.' . $extension;

        // Main image (800px)
        Image::read($image->getRealPath())
            ->scale(width: 400)
            ->save($path . $mainImageName);



        return $mainImageName;
    }
}
