<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    //

    public function index(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $pages = Page::query()
                 ->where('status', 1)
                 ->orderBy('id', 'asc')->get();
        return view('admin.page.index', compact('settings', 'pages'));
    }

    public function  create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.page.create', compact('settings'));

    }


    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:countries,slug',
            'status' => 'nullable|boolean',
        ]);
        try {

            $page = new Page();
            $page->title  = $request->title;
            $page->status = $request->status;
            $page->description = $request->description;
            $page->slug = $request->slug
                ? Str::slug($request->slug)
                : Str::slug($request->title);
            $page->save();

            return redirect()->back()->with('success', 'Page created successfully');

        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function  edit(Page $page){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.page.edit', compact('page', 'settings'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'slug' => 'nullable|string|unique:pages,slug,' . $page->id,
            'status' => 'nullable|boolean',
        ]);

        try {
            $page->title  = $request->title;
            $page->status = $request->status;
            $page->description = $request->description;

//            $page->slug = $request->slug
//                ? Str::slug($request->slug)
//                : Str::slug($request->title);

            $page->save();

            return redirect()->back()->with('success', 'Page updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

}
