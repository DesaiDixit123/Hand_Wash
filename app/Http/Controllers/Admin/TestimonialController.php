<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|max:2048',
        ]);

        $testimonial = new Testimonial($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '_testimonial.' . $request->image->extension();
            $request->image->move(public_path('uploads/testimonials'), $imageName);
            $testimonial->client_image = '/uploads/testimonials/' . $imageName;
        }

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|max:2048',
        ]);

        $testimonial->fill($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '_testimonial.' . $request->image->extension();
            $request->image->move(public_path('uploads/testimonials'), $imageName);
            $testimonial->client_image = '/uploads/testimonials/' . $imageName;
        }

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted.');
    }
}
