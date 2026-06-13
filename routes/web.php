<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MarketAreaController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SitemapController;

// ----------------------------------------------------
// Public Frontend Routes
// ----------------------------------------------------
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/products', [FrontendController::class, 'products'])->name('products');
Route::get('/products/{slug}', [FrontendController::class, 'productDetail'])->name('product.detail');
Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('/market-area', [FrontendController::class, 'marketArea'])->name('market-area');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::get('/sitemap', function () {
    $categories = \App\Models\Category::all();
    $settings = \App\Models\WebsiteSetting::pluck('value', 'key')->all();
    return view('frontend.sitemap', compact('categories', 'settings'));
})->name('html.sitemap');

// public forms submissions
Route::post('/contact/submit', [FrontendController::class, 'submitContact'])->name('contact.submit');
Route::get('/dealer-registration', [FrontendController::class, 'dealerRegistration'])->name('dealer.registration');
Route::post('/dealer-registration/submit', [FrontendController::class, 'submitDealer'])->name('dealer.submit');
Route::get('/distributor-registration', [FrontendController::class, 'distributorRegistration'])->name('distributor.registration');
Route::post('/distributor-registration/submit', [FrontendController::class, 'submitDistributor'])->name('distributor.submit');

// SEO features
Route::get('/sitemap.xml', [SitemapController::class, 'generate'])->name('sitemap');
Route::get('/robots.txt', function () {
    return response(view('seo.robots')->render(), 200)->header('Content-Type', 'text/plain');
});

// ----------------------------------------------------
// Admin Authentication (Guest Only)
// ----------------------------------------------------
Route::middleware('guest')->prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

// ----------------------------------------------------
// Admin Restricted Panel (Authenticated Users + Roles Check)
// ----------------------------------------------------
Route::middleware(['auth', 'role:admin,editor'])->prefix('admin')->group(function () {
    
    // Auth actions
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Profile Settings
    Route::get('profile', [UserController::class, 'profile'])->name('admin.profile');
    Route::post('profile', [UserController::class, 'profileUpdate'])->name('admin.profile.update');

    // CRUD Resource Routes
    Route::resource('banners', BannerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product-galleries', ProductGalleryController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('blog-categories', BlogCategoryController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('market-areas', MarketAreaController::class);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('seo-settings', SeoSettingController::class);

    // Dynamic website parameters (Single page parameters form)
    Route::get('website-settings', [WebsiteSettingController::class, 'index'])->name('website-settings.index');
    Route::post('website-settings/update', [WebsiteSettingController::class, 'update'])->name('website-settings.update');

    // Inquiries moderation (custom routes)
    Route::get('inquiries/dealers', [InquiryController::class, 'dealers'])->name('inquiries.dealers');
    Route::post('inquiries/dealers/{id}/{status}', [InquiryController::class, 'updateDealerStatus'])->name('inquiries.dealers.status');
    
    Route::get('inquiries/distributors', [InquiryController::class, 'distributors'])->name('inquiries.distributors');
    Route::post('inquiries/distributors/{id}/{status}', [InquiryController::class, 'updateDistributorStatus'])->name('inquiries.distributors.status');
    
    Route::get('inquiries/contact', [InquiryController::class, 'contact'])->name('inquiries.contact');
    Route::post('inquiries/contact/{id}/read', [InquiryController::class, 'markContactRead'])->name('inquiries.contact.read');

    // User management (Admin Only)
    Route::middleware('role:admin')->group(function() {
        Route::resource('users', UserController::class);
    });
});
