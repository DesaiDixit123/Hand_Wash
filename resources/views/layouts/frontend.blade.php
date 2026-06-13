<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Dynamic SEO Settings -->
    <title>{{ $pageSeo->meta_title ?? ($settings['company_name'] ?? 'Sree Chemicals') }}</title>
    <meta name="description" content="{{ $pageSeo->meta_description ?? 'Premium cleaning products manufacturer.' }}">
    <meta name="keywords" content="{{ $pageSeo->keywords ?? 'hand wash, dish wash, cleaning chemicals' }}">
    <link rel="canonical" href="{{ $pageSeo->canonical_url ?? url()->current() }}">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $pageSeo->meta_title ?? ($settings['company_name'] ?? 'Sree Chemicals') }}">
    <meta property="og:description" content="{{ $pageSeo->meta_description ?? 'Premium cleaning products manufacturer.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ url($pageSeo->og_image_path ?? '/assets/images/og-image.jpg') }}">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts: Poppins & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Swiper Slider CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- AOS Animations CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="frontend-body {{ Route::is('home') ? 'home-page' : '' }}">

    <!-- Header / Navbar Wrapper -->
    <header class="fixed-top w-100 shadow-sm" style="z-index: 1030;">
        <!-- Top Info Bar -->
        <div class="top-bar d-none d-lg-block py-2" style="background-color: var(--primary-slate-900); border-bottom: 1px solid rgba(255,255,255,0.08); font-size: 0.82rem; color: #cbd5e1; font-family: 'Poppins', sans-serif;">
            <div class="container d-flex justify-content-between align-items-center">
                <!-- Left Info -->
                <div class="d-flex align-items-center gap-4">
                    <span>
                        <i class="fa-solid fa-phone me-2" style="color: var(--secondary-blue-500);"></i> 
                        {{ $settings['phone'] ?? '+91 87586 78787' }}
                    </span>
                    <span>
                        <i class="fa-solid fa-envelope me-2" style="color: var(--secondary-blue-500);"></i> 
                        {{ $settings['email'] ?? 'Director@sreechemicals.com' }}
                    </span>
                </div>
                <!-- Right Info -->
                <!--
                <div class="d-flex align-items-center gap-4">
                    <span>
                        <i class="fa-solid fa-file-invoice me-2" style="color: var(--secondary-blue-500);"></i> 
                        GSTIN: 24AAZFT0222G1Z6
                    </span>
                    <span>
                        <i class="fa-solid fa-location-dot me-2" style="color: var(--secondary-blue-500);"></i> 
                        Rajkot, Gujarat-360030
                    </span>
                </div>
                -->
            </div>
        </div>
        
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg sticky-header w-100 py-3 scrolled" style="position: relative; background-color: var(--bg-white);">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="{{ $settings['company_name'] ?? 'Sree Chemicals' }}" style="height: 48px; width: auto; max-height: 48px; object-fit: contain;">
            </a>
            <button class="navbar-toggler border-0 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>
                    
                    <!-- Products Mega Menu Dropdown -->
                    <li class="nav-item dropdown mega-menu-dropdown">
                        <a class="nav-link dropdown-toggle {{ Route::is('products') || Route::is('product.detail') ? 'active' : '' }}" href="{{ route('products') }}" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products
                        </a>
                        <div class="dropdown-menu mega-menu-container position-absolute shadow" aria-labelledby="productsDropdown">
                            <div class="container">
                                <div class="row g-4 text-start text-dark">
                                    <div class="col-lg-3">
                                        <h6 class="font-outfit fw-800 text-teal mb-3" style="color: var(--secondary-blue-500);">Featured Categories</h6>
                                        <ul class="list-unstyled">
                                            <li><a class="dropdown-item py-2 px-0 text-muted font-outfit" href="{{ route('products', ['category' => 'hand-wash']) }}">Hand Wash Series</a></li>
                                            <li><a class="dropdown-item py-2 px-0 text-muted font-outfit" href="{{ route('products', ['category' => 'dish-wash']) }}">Dish Washing Liquids</a></li>
                                            <li><a class="dropdown-item py-2 px-0 text-muted font-outfit" href="{{ route('products', ['category' => 'floor-cleaner']) }}">Multi-surface Floor Cleaners</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6 class="font-outfit fw-800 text-teal mb-3" style="color: var(--secondary-blue-500);">Detergents</h6>
                                        <ul class="list-unstyled">
                                            <li><a class="dropdown-item py-2 px-0 text-muted font-outfit" href="{{ route('products', ['category' => 'liquid-detergent']) }}">Liquid Detergents</a></li>
                                            <li><a class="dropdown-item py-2 px-0 text-muted font-outfit" href="{{ route('products', ['category' => 'detergent-powder']) }}">Heavy Duty Detergent Powders</a></li>
                                            <li><a class="dropdown-item py-2 px-0 text-muted font-outfit" href="{{ route('products', ['category' => 'fabric-wash']) }}">Fabric Wash & Softeners</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6 class="font-outfit fw-800 text-teal mb-3" style="color: var(--secondary-blue-500);">Specialty Cleaners</h6>
                                        <ul class="list-unstyled">
                                            <li><a class="dropdown-item py-2 px-0 text-muted font-outfit" href="{{ route('products', ['category' => 'white-cleaner']) }}">White Phenyle Cleaners</a></li>
                                            <li><a class="dropdown-item py-2 px-0 text-muted font-outfit" href="{{ route('products', ['category' => 'black-cleaner']) }}">Black Coal-Tar Cleaners</a></li>
                                            <li><a class="dropdown-item py-2 px-0 text-muted font-outfit" href="{{ route('products', ['category' => 'toilet-cleaner']) }}">Acid Toilet Bowl Cleaners</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 bg-light p-4 rounded-3 d-flex flex-column justify-content-between">
                                        <div>
                                            <h6 class="font-outfit fw-800 text-dark mb-2">Industrial Solutions</h6>
                                            <p class="text-muted small">Need high volume raw surfactant formulations? Download our technical specification sheet.</p>
                                        </div>
                                        <a href="{{ route('products', ['category' => 'industrial-cleaning-chemicals']) }}" class="btn btn-sm btn-premium font-outfit py-2" style="height:44px;">Industrial Range</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Commented out Gallery, Market Network, Insights as per request -->
                    <!--
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('market-area') ? 'active' : '' }}" href="{{ route('market-area') }}">Market Network</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('blog') || Route::is('blog.detail') ? 'active' : '' }}" href="{{ route('blog') }}">Insights</a>
                    </li>
                    -->
                    
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('sitemap') ? 'active' : '' }}" href="{{ route('html.sitemap') }}">Sitemap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('Sree Chemical Brochure - Final.pdf') }}" target="_blank">PDF Browser</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center ms-auto gap-3">
                    @auth
                        <div class="dropdown">
                            <a class="btn btn-outline-premium btn-sm dropdown-toggle rounded-pill" href="#" role="button" id="userMenuDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="height:46px; font-size:14px; display: inline-flex; align-items: center; padding: 0 1.25rem;">
                                <i class="fa-regular fa-user me-2"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="userMenuDropdown" style="border-radius: 12px; z-index: 1100;">
                                <li><a class="dropdown-item py-2 text-dark font-outfit" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge me-2 text-primary"></i> Dashboard</a></li>
                                <li><a class="dropdown-item py-2 text-dark font-outfit" href="{{ route('admin.profile') }}"><i class="fa-solid fa-user-gear me-2 text-primary"></i> My Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 text-danger font-outfit border-0 bg-transparent w-100 text-start"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        {{-- Admin Login button hidden from public navbar --}}
                        {{-- Admins can still access /admin/login directly --}}
                    @endauth
                    <a href="{{ route('contact') }}#inquiry" class="btn btn-premium btn-sm d-none d-lg-inline-flex" style="height:46px; font-size:14px; display: inline-flex; align-items: center;">Get Quote</a>
                </div>
            </div>
        </div>
    </nav>
</header>

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Floating WhatsApp Widget -->
    @if(isset($settings['whatsapp']))
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}?text=Hello%20Sree%20Chemicals,%20I%20am%20interested%20in%20your%20cleaning%20products." class="whatsapp-float" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    @endif

    <!-- Footer -->
    <footer class="footer-section">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-4">
                    <div class="footer-logo mb-3">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="{{ $settings['company_name'] ?? 'Sree Chemicals' }}" style="height: 52px; width: auto; max-height: 52px; object-fit: contain;">
                    </div>
                    <p class="mb-4 text-light-grey" style="color: #94a3b8; font-size: 0.95rem;">
                        {{ $settings['about_intro'] ?? 'Leading chemical manufacturer of cleaning formulations.' }}
                    </p>
                    <div class="d-flex gap-3">
                        @if(isset($settings['facebook_url']))
                            <a href="{{ $settings['facebook_url'] }}" class="btn btn-sm btn-outline-light rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-facebook-f"></i></a>
                        @endif
                        @if(isset($settings['instagram_url']))
                            <a href="{{ $settings['instagram_url'] }}" class="btn btn-sm btn-outline-light rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if(isset($settings['linkedin_url']))
                            <a href="{{ $settings['linkedin_url'] }}" class="btn btn-sm btn-outline-light rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-linkedin-in"></i></a>
                        @endif
                        @if(isset($settings['youtube_url']))
                            <a href="{{ $settings['youtube_url'] }}" class="btn btn-sm btn-outline-light rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3 font-outfit" style="font-size: 1.1rem; border-bottom: 2px solid var(--secondary-blue-500); padding-bottom: 6px; display: inline-block;">Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}" class="footer-link">About Us</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Product Range</a></li>
                        <li><a href="{{ route('html.sitemap') }}" class="footer-link">Sitemap</a></li>
                        <li><a href="{{ asset('Sree Chemical Brochure - Final.pdf') }}" target="_blank" class="footer-link">PDF Brochure</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-3 font-outfit" style="font-size: 1.1rem; border-bottom: 2px solid var(--secondary-blue-500); padding-bottom: 6px; display: inline-block;">Partner Programs</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('dealer.registration') }}" class="footer-link">Become a Retail Dealer</a></li>
                        <li><a href="{{ route('distributor.registration') }}" class="footer-link">Apply for Distributorship</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link">Corporate Support</a></li>
                        <li><a href="{{ route('html.sitemap') }}" class="footer-link">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="text-white mb-3 font-outfit" style="font-size: 1.1rem; border-bottom: 2px solid var(--secondary-blue-500); padding-bottom: 6px; display: inline-block;">Corporate HQ</h5>
                    <p class="mb-2" style="font-size: 0.9rem; color: #94a3b8;"><i class="fa-solid fa-map-pin me-2 text-teal" style="color: #0ea5e9;"></i> {{ $settings['address'] ?? 'Gujarat, India' }}</p>
                    <p class="mb-2" style="font-size: 0.9rem; color: #94a3b8;"><i class="fa-solid fa-phone me-2 text-teal" style="color: #0ea5e9;"></i> {{ $settings['phone'] ?? '+91' }}</p>
                    <p class="mb-2" style="font-size: 0.9rem; color: #94a3b8;"><i class="fa-solid fa-envelope me-2 text-teal" style="color: #0ea5e9;"></i> {{ $settings['email'] ?? 'Director@sreechemicals.com' }}</p>
                </div>
            </div>
            
            <hr style="border-top: 1px solid rgba(255,255,255,0.1);">
            <div class="row align-items-center mt-4">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-muted" style="font-size: 0.85rem;">&copy; {{ date('Y') }} {{ $settings['company_name'] ?? 'Sree Chemicals' }}. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <p class="mb-0 text-muted" style="font-size: 0.85rem;">Designed with <i class="fa-solid fa-heart text-danger"></i> for Premium Quality Hygiene.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Swiper Slider JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- GSAP Animation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    
    <!-- AOS Animations JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Custom JS Script -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
