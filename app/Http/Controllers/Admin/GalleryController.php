<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::orderBy('created_at', 'desc')->get();
        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'type' => 'required|in:product,factory,team,event',
            'image' => 'required|image|max:2048',
        ]);

        $item = new Gallery($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '_gallery.' . $request->image->extension();
            $request->image->move(public_path('uploads/gallery'), $imageName);
            $item->image_path = '/uploads/gallery/' . $imageName;
        }

        $item->save();

        return redirect()->route('gallery.index')->with('success', 'Image added to gallery.');
    }

    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();
        return redirect()->route('gallery.index')->with('success', 'Gallery item deleted.');
    }
}
