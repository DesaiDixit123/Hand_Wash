<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function index()
    {
        $settings = SeoSetting::all();
        return view('admin.seo-settings.index', compact('settings'));
    }

    public function edit($id)
    {
        $setting = SeoSetting::findOrFail($id);
        return view('admin.seo-settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'keywords' => 'nullable|string',
            'canonical_url' => 'nullable|url',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $setting = SeoSetting::findOrFail($id);
        $setting->fill($request->except('og_image'));

        if ($request->hasFile('og_image')) {
            $imageName = time() . '_og_' . $setting->page_name . '.' . $request->og_image->extension();
            $request->og_image->move(public_path('uploads/seo'), $imageName);
            $setting->og_image_path = '/uploads/seo/' . $imageName;
        }

        $setting->save();

        return redirect()->route('seo-settings.index')->with('success', 'SEO settings updated.');
    }
}
