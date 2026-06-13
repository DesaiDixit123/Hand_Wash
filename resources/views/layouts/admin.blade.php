<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Sree Chemicals</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        .admin-sidebar {
            width: 250px;
            background-color: var(--primary-color);
            min-height: 100vh;
            color: #cbd5e1;
            transition: var(--transition-smooth);
        }
        .admin-sidebar .nav-link {
            color: #94a3b8 !important;
            padding: 0.75rem 1.5rem !important;
            border-left: 4px solid transparent;
        }
        .admin-sidebar .nav-link:hover, .admin-sidebar .nav-link.active {
            color: #fff !important;
            background-color: rgba(255,255,255,0.05);
            border-left-color: var(--secondary-color);
        }
        .admin-main {
            flex-grow: 1;
            background-color: #f1f5f9;
        }
    </style>
</head>
<body class="d-flex bg-light">

    <!-- Admin Sidebar -->
    <div class="admin-sidebar d-flex flex-column flex-shrink-0 shadow">
        <div class="p-3 py-4 border-bottom border-secondary border-opacity-25 text-center">
            <a class="navbar-brand text-white fs-4 fw-800 d-block" href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-droplet text-teal me-2" style="color: #0d9488;"></i>
                <span>Sree Chemicals</span>
            </a>
            <span class="badge bg-secondary bg-opacity-25 text-white-50 mt-2 px-3 py-1 text-uppercase" style="font-size: 0.7rem; letter-spacing: 1px;">
                {{ auth()->user()->role->name ?? 'Management' }}
            </span>
        </div>
        
        <ul class="nav nav-pills flex-column mb-auto py-3">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line me-2"></i> Dashboard
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('banners.index') }}" class="nav-link {{ Route::is('banners.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-images me-2"></i> Hero Banners
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link {{ Route::is('categories.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-tags me-2"></i> Categories
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link {{ Route::is('products.*') || Route::is('product-galleries.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-bottle-droplet me-2"></i> Products Range
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('gallery.index') }}" class="nav-link {{ Route::is('gallery.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-image me-2"></i> Media Gallery
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('market-areas.index') }}" class="nav-link {{ Route::is('market-areas.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-map-location-dot me-2"></i> Market Network
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('blogs.index') }}" class="nav-link {{ Route::is('blogs.*') || Route::is('blog-categories.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-file-invoice me-2"></i> Blogs & Insights
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('testimonials.index') }}" class="nav-link {{ Route::is('testimonials.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-star-half-stroke me-2"></i> Testimonials
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('faqs.index') }}" class="nav-link {{ Route::is('faqs.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-circle-question me-2"></i> FAQs Accordions
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('team-members.index') }}" class="nav-link {{ Route::is('team-members.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-group me-2"></i> Core Team
                </a>
            </li>

            <!-- Submenu header for Inquiries -->
            <li class="px-3 pt-3 pb-1 text-uppercase text-white-50 font-outfit" style="font-size: 0.75rem; letter-spacing: 1px;">Partner Inquiries</li>
            
            <li class="nav-item">
                <a href="{{ route('inquiries.dealers') }}" class="nav-link {{ Request::is('admin/inquiries/dealers*') ? 'active' : '' }}">
                    <i class="fa-solid fa-store me-2"></i> Dealers Registration
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('inquiries.distributors') }}" class="nav-link {{ Request::is('admin/inquiries/distributors*') ? 'active' : '' }}">
                    <i class="fa-solid fa-truck-ramp-box me-2"></i> Distributors List
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('inquiries.contact') }}" class="nav-link {{ Request::is('admin/inquiries/contact*') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope me-2"></i> Contact Inquiries
                </a>
            </li>

            <!-- Config and System Settings -->
            <li class="px-3 pt-3 pb-1 text-uppercase text-white-50 font-outfit" style="font-size: 0.75rem; letter-spacing: 1px;">System Config</li>
            
            <li class="nav-item">
                <a href="{{ route('seo-settings.index') }}" class="nav-link {{ Route::is('seo-settings.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-globe me-2"></i> Dynamic SEO Meta
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('website-settings.index') }}" class="nav-link {{ Route::is('website-settings.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-sliders me-2"></i> Site Settings
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('admin.profile') }}" class="nav-link {{ Route::is('admin.profile') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-gear me-2"></i> My Profile
                </a>
            </li>
            
            @if(auth()->user()->hasRole('admin'))
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ Route::is('users.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users-gear me-2"></i> User Access Control
                </a>
            </li>
            @endif
        </ul>
    </div>

    <!-- Admin Main Body -->
    <div class="admin-main d-flex flex-column">
        
        <!-- Admin Header -->
        <header class="navbar navbar-expand-lg bg-white shadow-sm py-3 px-4 sticky-top" style="z-index: 100;">
            <div class="container-fluid p-0">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <h5 class="mb-0 font-outfit text-dark fw-700">Management Panel</h5>
                    
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-muted small">Active User: <strong>{{ auth()->user()->name }}</strong></span>
                        <a href="{{ route('admin.profile') }}" class="btn btn-sm btn-outline-premium rounded-pill px-3"><i class="fa-regular fa-user"></i> My Profile</a>
                        <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i> View Site</a>
                        
                        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-premium rounded-pill px-3"><i class="fa-solid fa-power-off"></i> Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Body Inner Content -->
        <div class="p-4 flex-grow-1">
            
            <!-- Global alerts for CRUD feedback -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
