@extends('layouts.frontend')

@section('content')
<!-- Page Banner -->
<section class="section-padding text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, #1e293b 100%); margin-bottom: 50px;">
    <div class="container text-center">
        <h1 class="display-4 font-outfit fw-800 text-white" data-aos="fade-down">Sitemap</h1>
        <p class="fs-6 text-muted-white mx-auto" style="max-width: 600px; color: #cbd5e1;" data-aos="fade-up">
            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a> &bull; <span class="text-teal" style="color: var(--secondary-color);">Sitemap</span>
        </p>
    </div>
</section>

<!-- Sitemap Links Section -->
<section class="section-padding bg-white pt-0">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-teal fw-700 text-uppercase d-block mb-2" style="color: var(--secondary-color); letter-spacing: 1.5px;">Navigation Directory</span>
            <h2 class="font-outfit fw-800 text-dark">Quick Portal Access</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">Access any section of our website directly through this quick sitemap portal. Click on any section below to navigate.</p>
        </div>

        <!-- Sitemap Grid -->
        <div class="row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <!-- Row 1: Core Navigation Pages -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('home') }}" class="sitemap-btn text-decoration-none text-center">
                    HOME
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('about') }}" class="sitemap-btn text-decoration-none text-center">
                    COMPANY PROFILE
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('contact') }}" class="sitemap-btn text-decoration-none text-center">
                    CONTACT US
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('market-area') }}" class="sitemap-btn text-decoration-none text-center">
                    MARKET AREA
                </a>
            </div>

            <!-- Row 2: Consumer Hygiene -->
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('products', ['category' => 'hand-wash']) }}" class="sitemap-btn text-decoration-none text-center">
                    HAND WASH
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('products', ['search' => 'super wash']) }}" class="sitemap-btn text-decoration-none text-center">
                    SUPER WASH
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('products', ['category' => 'liquid-detergent']) }}" class="sitemap-btn text-decoration-none text-center">
                    WASHING LIQUID
                </a>
            </div>

            <!-- Row 3: Detergents & Specialty Cleaners -->
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('products', ['category' => 'detergent-powder']) }}" class="sitemap-btn text-decoration-none text-center">
                    DETERGENT POWDER
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('products', ['category' => 'dish-wash']) }}" class="sitemap-btn text-decoration-none text-center">
                    DISH WASH
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('products', ['category' => 'white-cleaner']) }}" class="sitemap-btn text-decoration-none text-center">
                    WHITE CLEANER
                </a>
            </div>

            <!-- Row 4: Industrial & Household Specialties -->
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('products', ['category' => 'black-cleaner']) }}" class="sitemap-btn text-decoration-none text-center">
                    BLACK CLEANER
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('products', ['category' => 'detergent-powder']) }}" class="sitemap-btn text-decoration-none text-center">
                    WASHING POWDER
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('products', ['category' => 'hand-wash']) }}" class="sitemap-btn text-decoration-none text-center">
                    GLYCERIN SOAP
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Sitemap Premium Button Styles */
.sitemap-btn {
    background-color: var(--secondary-color) !important; /* Cyan */
    color: #ffffff !important;
    border-radius: 8px;
    font-size: 1.05rem;
    font-weight: 700;
    font-family: 'Poppins', sans-serif;
    letter-spacing: 0.5px;
    transition: var(--transition-premium);
    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.15);
    min-height: 60px;
    border: 2px solid var(--secondary-color) !important;
    display: flex;
    align-items: center;
    justify-content: center;
    text-transform: uppercase;
}

.sitemap-btn:hover {
    background-color: var(--primary-color) !important; /* Navy */
    border-color: var(--primary-color) !important;
    color: #ffffff !important;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.25);
}
</style>
@endsection
