<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255|unique:blogs,title',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'author_name' => 'nullable|string|max:100',
        ]);

        $blog = new Blog($request->except('image'));
        $blog->slug = Str::slug($request->title);
        $blog->published_at = now();

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $blog->slug . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/blogs'), $imageName);
            $blog->image_path = '/uploads/blogs/' . $imageName;
        }

        $blog->status = $request->has('status');
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Article created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255|unique:blogs,title,' . $blog->id,
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'author_name' => 'nullable|string|max:100',
        ]);

        $blog->fill($request->except('image'));
        $blog->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $blog->slug . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/blogs'), $imageName);
            $blog->image_path = '/uploads/blogs/' . $imageName;
        }

        $blog->status = $request->has('status');
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Article deleted successfully.');
    }
}
