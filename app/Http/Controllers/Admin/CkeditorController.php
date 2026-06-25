<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    //
    public function index()
    {
        return view('ckeditor');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            return response()->json([
                'location' => asset('uploads/' . $filename)
            ]);
        }

        return response()->json([
            'error' => 'No file uploaded'
        ], 400);
    }
}
