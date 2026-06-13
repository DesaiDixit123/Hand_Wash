<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\MarketArea;
use App\Models\TeamMember;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Dealer;
use App\Models\Distributor;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Home Page
    public function home()
    {
        $banners = Banner::where('status', true)->orderBy('sort_order', 'asc')->get();
        $categories = Category::all();
        $featuredProducts = Product::where('status', true)->take(6)->get();
        $testimonials = Testimonial::all();
        $faqs = Faq::orderBy('sort_order', 'asc')->get();

        return view('frontend.home', compact('banners', 'categories', 'featuredProducts', 'testimonials', 'faqs'));
    }

    // About Page
    public function about()
    {
        $team = TeamMember::orderBy('sort_order', 'asc')->get();
        $gallery = Gallery::where('type', 'factory')->take(6)->get();

        return view('frontend.about', compact('team', 'gallery'));
    }

    // Products Catalog
    public function products(Request $request)
    {
        $query = Product::where('status', true);

        // Search filter
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('short_description', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Sorting
        $sort = $request->get('sort', 'default');
        if ($sort == 'name_asc') {
            $query->orderBy('name', 'asc');
        } elseif ($sort == 'name_desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(9)->withQueryString();
        $categories = Category::all();

        return view('frontend.products', compact('products', 'categories'));
    }

    // Product Detail
    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->where('status', true)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', true)
            ->take(4)
            ->get();

        return view('frontend.product-detail', compact('product', 'relatedProducts'));
    }

    // Gallery
    public function gallery()
    {
        $galleryItems = Gallery::orderBy('created_at', 'desc')->get();
        return view('frontend.gallery', compact('galleryItems'));
    }

    // Market Area
    public function marketArea()
    {
        $marketAreas = MarketArea::all();
        return view('frontend.market-area', compact('marketAreas'));
    }

    // Blog Listing
    public function blog(Request $request)
    {
        $query = Blog::where('status', true);

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->orderBy('published_at', 'desc')->paginate(6)->withQueryString();
        $categories = BlogCategory::all();

        return view('frontend.blogs', compact('blogs', 'categories'));
    }

    // Blog Detail
    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', true)->firstOrFail();
        $relatedBlogs = Blog::where('blog_category_id', $blog->blog_category_id)
            ->where('id', '!=', $blog->id)
            ->where('status', true)
            ->take(3)
            ->get();

        return view('frontend.blog-detail', compact('blog', 'relatedBlogs'));
    }

    // Contact
    public function contact()
    {
        return view('frontend.contact');
    }

    // Dealer Registration Page
    public function dealerRegistration()
    {
        return view('frontend.dealer-registration');
    }

    // Distributor Registration Page
    public function distributorRegistration()
    {
        return view('frontend.distributor-registration');
    }

    // Forms Submission handling
    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'nullable|string|max:15',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactInquiry::create($request->all());

        return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you shortly.');
    }

    public function submitDealer(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'gst_number' => 'nullable|string|max:15',
            'address' => 'required|string',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Dealer::create($request->all());

        return redirect()->back()->with('success', 'Your dealer registration request has been submitted successfully.');
    }

    public function submitDistributor(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'business_experience' => 'nullable|string',
            'address' => 'required|string',
        ]);

        Distributor::create($request->all());

        return redirect()->back()->with('success', 'Your distributor registration request has been submitted successfully.');
    }
}
