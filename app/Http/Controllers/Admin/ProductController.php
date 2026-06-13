<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:products,name',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'brochure' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $product = new Product($request->except(['image', 'brochure', 'specifications', 'features', 'benefits', 'applications']));
        $product->slug = Str::slug($request->name);

        // Parse inputs from lines
        $product->specifications = $this->parseKeyValues($request->specifications);
        $product->features = $this->parseLines($request->features);
        $product->benefits = $this->parseLines($request->benefits);
        $product->applications = $this->parseLines($request->applications);

        // Upload brochure
        if ($request->hasFile('brochure')) {
            $brochureName = time() . '_brochure_' . $product->slug . '.' . $request->brochure->extension();
            $request->brochure->move(public_path('uploads/brochures'), $brochureName);
            $product->brochure_path = '/uploads/brochures/' . $brochureName;
        }

        $product->status = $request->has('status');
        $product->save();

        // Upload primary image if exists
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $product->slug . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);

            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => '/uploads/products/' . $imageName,
                'is_primary' => true
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        
        // Convert arrays back to text lines for display
        $specsText = '';
        if ($product->specifications && is_array($product->specifications)) {
            foreach ($product->specifications as $k => $v) {
                $specsText .= "$k: $v\n";
            }
        }
        $featuresText = is_array($product->features) ? implode("\n", $product->features) : '';
        $benefitsText = is_array($product->benefits) ? implode("\n", $product->benefits) : '';
        $appsText = is_array($product->applications) ? implode("\n", $product->applications) : '';

        return view('admin.products.edit', compact('product', 'categories', 'specsText', 'featuresText', 'benefitsText', 'appsText'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'brochure' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $product->fill($request->except(['image', 'brochure', 'specifications', 'features', 'benefits', 'applications']));
        $product->slug = Str::slug($request->name);

        $product->specifications = $this->parseKeyValues($request->specifications);
        $product->features = $this->parseLines($request->features);
        $product->benefits = $this->parseLines($request->benefits);
        $product->applications = $this->parseLines($request->applications);

        // Upload brochure
        if ($request->hasFile('brochure')) {
            $brochureName = time() . '_brochure_' . $product->slug . '.' . $request->brochure->extension();
            $request->brochure->move(public_path('uploads/brochures'), $brochureName);
            $product->brochure_path = '/uploads/brochures/' . $brochureName;
        }

        $product->status = $request->has('status');
        $product->save();

        // Upload new primary image if exists
        if ($request->hasFile('image')) {
            // Remove previous primary image association (optional)
            ProductImage::where('product_id', $product->id)->where('is_primary', true)->delete();

            $imageName = time() . '_' . $product->slug . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);

            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => '/uploads/products/' . $imageName,
                'is_primary' => true
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    // Helper methods for string conversion
    private function parseLines($text)
    {
        if (empty($text)) return [];
        return array_filter(array_map('trim', explode("\n", str_replace("\r", "", $text))));
    }

    private function parseKeyValues($text)
    {
        if (empty($text)) return [];
        $lines = explode("\n", str_replace("\r", "", $text));
        $result = [];
        foreach ($lines as $line) {
            if (str_contains($line, ':')) {
                $parts = explode(':', $line, 2);
                $key = trim($parts[0]);
                $val = trim($parts[1]);
                if (!empty($key)) {
                    $result[$key] = $val;
                }
            }
        }
        return $result;
    }
}
