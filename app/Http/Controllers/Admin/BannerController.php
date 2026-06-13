<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort_order', 'asc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'integer',
        ]);

        $banner = new Banner($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . Str::slug($request->title ?? 'banner') . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/banners'), $imageName);
            $banner->image_path = '/uploads/banners/' . $imageName;
        }

        $banner->status = $request->has('status');
        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'integer',
        ]);

        $banner->fill($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . Str::slug($request->title ?? 'banner') . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/banners'), $imageName);
            $banner->image_path = '/uploads/banners/' . $imageName;
        }

        $banner->status = $request->has('status');
        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
    }
}
