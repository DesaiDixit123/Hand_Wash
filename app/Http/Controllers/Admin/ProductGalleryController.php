<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    public function index()
    {
        $images = ProductImage::with('product')->orderBy('created_at', 'desc')->get();
        return view('admin.product-galleries.index', compact('images'));
    }

    public function create()
    {
        $products = Product::where('status', true)->get();
        return view('admin.product-galleries.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . rand(100,999) . '.' . $image->extension();
                $image->move(public_path('uploads/products'), $imageName);

                ProductImage::create([
                    'product_id' => $request->product_id,
                    'image_path' => '/uploads/products/' . $imageName,
                    'is_primary' => false
                ]);
            }
        }

        return redirect()->route('product-galleries.index')->with('success', 'Images added to product gallery.');
    }

    public function destroy($id)
    {
        $image = ProductImage::findOrFail($id);
        $image->delete();
        return redirect()->route('product-galleries.index')->with('success', 'Image deleted from gallery.');
    }
}
