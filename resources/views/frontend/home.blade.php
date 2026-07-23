@extends('layouts.frontend')

@section('content')
<!-- Section 1: Hero Banner -->
<section class="hero-gradient-premium position-relative overflow-hidden">
    <!-- Subtle technical grid overlay -->
    <div class="tech-grid-overlay"></div>
    
    <!-- Background premium glow shapes -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at 15% 25%, rgba(0, 180, 216, 0.12) 0%, transparent 55%), radial-gradient(circle at 85% 75%, rgba(0, 200, 83, 0.08) 0%, transparent 55%); z-index: 1;"></div>
    
    <!-- Realistic 3D Liquid Chemistry Floating Bubbles -->
    <div class="liquid-bubble bubble-1"></div>
    <div class="liquid-bubble bubble-2"></div>
    <div class="liquid-bubble bubble-3"></div>
    <div class="liquid-bubble bubble-4"></div>
    <div class="liquid-bubble bubble-5"></div>

    <!-- Swiper Hero Container -->
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            
            <!-- Slide 1: Corporate & Orvin Brand Intro -->
            <div class="swiper-slide hero-swiper-slide">
                <div class="container hero-content-wrapper position-relative z-2">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6">
                            <span class="badge rounded-pill bg-white text-dark border px-3 py-2 fs-7 mb-4 shadow-sm d-inline-flex align-items-center gap-2 font-outfit" style="border-color: rgba(0, 180, 216, 0.15) !important;">
                                <span class="pulse-dot"></span> 
                                <span class="fw-700 text-slate" style="letter-spacing: 0.5px;">500+ Active Dealers Across India</span>
                            </span>
                            
                            <h1 class="hero-heading text-dark mb-3">
                                India's Premium <span class="text-gradient">Orvin Cleaning</span> Range
                            </h1>
                            
                            <p class="fs-5 text-slate mb-4 body-text" style="font-weight: 300; line-height: 1.7;">
                                Discover high-performance laundry liquids, hand washes, floor cleaners, and dishwashing solutions engineered by Sree Chemicals for absolute hygiene and safety.
                            </p>
                            
                            <div class="d-flex flex-wrap gap-3 mb-5">
                                <a href="{{ route('products') }}" class="btn btn-premium rounded-pill px-4" style="box-shadow: 0 10px 25px rgba(0, 180, 216, 0.3); height: 50px; display: inline-flex; align-items: center;">Explore Catalog</a>
                                <a href="{{ route('contact') }}" class="btn btn-outline-premium rounded-pill px-4" style="height: 50px; display: inline-flex; align-items: center;">Request Free Quote</a>
                            </div>

                            <!-- Unified Premium Certifications Glass Panel -->
                            <div class="certifications-glass-panel d-flex flex-wrap align-items-center gap-4">
                                <div class="d-flex align-items-center gap-2 text-dark font-outfit fw-700 small-text"><i class="fa-solid fa-circle-check text-teal fs-5" style="color: var(--secondary-blue-500);"></i> ISO 9001:2015</div>
                                <div class="d-flex align-items-center gap-2 text-dark font-outfit fw-700 small-text"><i class="fa-solid fa-shield-halved text-teal fs-5" style="color: var(--secondary-blue-500);"></i> WHO-GMP Compliant</div>
                                <div class="d-flex align-items-center gap-2 text-dark font-outfit fw-700 small-text"><i class="fa-solid fa-leaf text-teal fs-5" style="color: var(--secondary-blue-500);"></i> 100% Eco-Safe</div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 position-relative d-flex align-items-center justify-content-center">
                            <div class="hero-showcase-container position-relative" style="width: 100%; height: 480px; display: flex; align-items: center; justify-content: center;">
                                <div class="chemist-glow-backlight"></div>
                                <div class="editorial-offset-frame"></div>
                                
                                <div class="position-absolute liquid-morph-frame shadow-lg" style="z-index: 1; transform: translate(-4%, -4%); display: flex; align-items: center; justify-content: center; background-color: #ffffff; padding: 25px;">
                                    <img src="{{ asset('assets/images/orvin-logo.png') }}" alt="Orvin Detergent Brand Logo" style="object-fit: contain; width: 90%; height: 90%;">
                                    <div class="position-absolute bottom-4 start-50 translate-middle-x" style="z-index: 10;">
                                        <span class="badge rounded-pill px-3 py-2 font-outfit text-white shadow-sm" style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.15); font-size: 0.72rem; font-weight: 700; letter-spacing: 1px; white-space: nowrap; display: inline-flex; align-items: center; gap: 6px;">
                                            <i class="fa-solid fa-flask-vial" style="color: var(--secondary-blue-500);"></i> FORMULATION R&D PLANT
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="position-absolute product-glass-sphere" style="bottom: 2%; left: 4%;">
                                    <img src="{{ asset('assets/images/orvin-floor.png') }}" alt="Orvin Floor Cleaner" style="object-fit: contain;">
                                </div>
                                <div class="position-absolute" style="bottom: 0%; left: 4%; width: 150px; height: 150px; background: rgba(0, 180, 216, 0.15); border-radius: 50%; filter: blur(30px); z-index: 1;"></div>
                                
                                <div class="position-absolute chemical-formula-badge d-none d-sm-block" style="top: 2%; right: -2%; z-index: 4;">
                                    <i class="fa-solid fa-flask text-teal me-1" style="color: var(--secondary-blue-500);"></i>
                                    <span>Eco-Friendly Formulation</span>
                                </div>
                                
                                <div class="floating-product-card glassmorphic-capsule position-absolute p-3 shadow" style="top: 8%; left: 2%; width: 195px; z-index: 3;">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="circle-icon-badge m-0" style="width: 40px; height: 40px; background: rgba(34, 197, 94, 0.1); color: var(--success);"><i class="fa-solid fa-shield-halved fs-5"></i></div>
                                        <div>
                                            <span class="d-block small fw-bold text-dark font-outfit">99.9% Protection</span>
                                            <span class="text-muted" style="font-size: 0.7rem;">Germ Protection</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="floating-product-card glassmorphic-capsule position-absolute p-3 shadow" style="bottom: 15%; right: 2%; width: 205px; z-index: 3;">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="circle-icon-badge m-0" style="width: 40px; height: 40px; background: rgba(34, 197, 94, 0.1); color: var(--success);"><i class="fa-solid fa-seedling fs-5"></i></div>
                                        <div>
                                            <span class="d-block small fw-bold text-dark font-outfit">100% Eco-Safe</span>
                                            <span class="text-muted" style="font-size: 0.7rem;">Biodegradable</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Household Laundry & Floor Care -->
            <div class="swiper-slide hero-swiper-slide">
                <div class="container hero-content-wrapper position-relative z-2">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6">
                            <span class="badge rounded-pill bg-white text-dark border px-3 py-2 fs-7 mb-4 shadow-sm d-inline-flex align-items-center gap-2 font-outfit" style="border-color: rgba(0, 180, 216, 0.15) !important;">
                                <i class="fa-solid fa-hand-holding-droplet text-success"></i> 
                                <span class="fw-700 text-slate" style="letter-spacing: 0.5px;">Tough on Dirt, Gentle on Fabrics</span>
                            </span>
                            
                            <h1 class="hero-heading text-dark mb-3">
                                Premium <span class="text-gradient">Orvin Laundry</span> & Floor Care
                            </h1>
                            
                            <p class="fs-5 text-slate mb-4 body-text" style="font-weight: 300; line-height: 1.7;">
                                Elevate your home cleaning standard with our advanced front-load laundry liquid detergent and pine-fresh antibacterial floor cleaner.
                            </p>
                            
                            <div class="d-flex flex-wrap gap-3 mb-5">
                                <a href="{{ route('products', ['category' => 'liquid-detergent']) }}" class="btn btn-premium rounded-pill px-4" style="box-shadow: 0 10px 25px rgba(0, 180, 216, 0.3); height: 50px; display: inline-flex; align-items: center;">Laundry Range</a>
                                <a href="{{ route('dealer.registration') }}" class="btn btn-outline-premium rounded-pill px-4" style="height: 50px; display: inline-flex; align-items: center;">Become a Dealer</a>
                            </div>

                            <!-- Unified Premium Certifications Glass Panel -->
                            <div class="certifications-glass-panel d-flex flex-wrap align-items-center gap-4">
                                <div class="d-flex align-items-center gap-2 text-dark font-outfit fw-700 small-text"><i class="fa-solid fa-circle-check text-teal fs-5" style="color: var(--secondary-blue-500);"></i> Color Protection</div>
                                <div class="d-flex align-items-center gap-2 text-dark font-outfit fw-700 small-text"><i class="fa-solid fa-shield-halved text-teal fs-5" style="color: var(--secondary-blue-500);"></i> pH Balanced Care</div>
                                <div class="d-flex align-items-center gap-2 text-dark font-outfit fw-700 small-text"><i class="fa-solid fa-leaf text-teal fs-5" style="color: var(--secondary-blue-500);"></i> 100% Phosphate Free</div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 position-relative d-flex align-items-center justify-content-center">
                            <div class="hero-showcase-container position-relative" style="width: 100%; height: 480px; display: flex; align-items: center; justify-content: center;">
                                <!-- Glowing backdrop -->
                                <div class="position-absolute" style="top: 15%; left: 15%; width: 70%; height: 70%; background: radial-gradient(circle, rgba(0, 200, 83, 0.15) 0%, transparent 70%); filter: blur(45px); z-index: 0;"></div>
                                
                                <div class="editorial-offset-frame" style="border-color: rgba(0, 200, 83, 0.15);"></div>
                                
                                <!-- Central: Laundry Liquid -->
                                <div class="position-absolute liquid-morph-frame shadow-lg" style="z-index: 2; width: 300px; height: 360px; border-color: rgba(0, 200, 83, 0.2); transform: translate(-15%, -10%); display: flex; align-items: center; justify-content: center; background-color: #ffffff; padding: 20px;">
                                    <img src="{{ asset('assets/images/orvin-laundry.png') }}" alt="Orvin Washing Liquid" style="object-fit: contain; max-height: 90%;">
                                    <div class="position-absolute bottom-4 start-50 translate-middle-x" style="z-index: 10;">
                                        <span class="badge rounded-pill px-3 py-2 font-outfit text-white shadow-sm" style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.15); font-size: 0.72rem; font-weight: 700; letter-spacing: 1px; white-space: nowrap; display: inline-flex; align-items: center; gap: 6px;">
                                            <i class="fa-solid fa-shirt" style="color: var(--accent-emerald-500);"></i> ACTIVE ENZYME ACTION
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Floating: Floor Cleaner inside glass bubble -->
                                <div class="position-absolute product-glass-sphere" style="bottom: 5%; right: 5%; width: 180px; height: 180px; background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.8) 0%, rgba(0, 200, 83, 0.05) 100%); border-color: rgba(255,255,255,0.5);">
                                    <img src="{{ asset('assets/images/orvin-floor.png') }}" alt="Orvin Floor Cleaner" style="object-fit: contain;">
                                </div>
                                
                                <div class="floating-product-card glassmorphic-capsule position-absolute p-3 shadow" style="top: 5%; right: 5%; width: 200px; z-index: 3;">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="circle-icon-badge m-0" style="width: 40px; height: 40px; background: rgba(0, 180, 216, 0.1); color: var(--secondary-blue-500);"><i class="fa-solid fa-droplet fs-5"></i></div>
                                        <div>
                                            <span class="d-block small fw-bold text-dark font-outfit">Deep Fabric Care</span>
                                            <span class="text-muted" style="font-size: 0.7rem;">Soft on Clothes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Personal & Dish Hygiene Range -->
            <div class="swiper-slide hero-swiper-slide">
                <div class="container hero-content-wrapper position-relative z-2">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6">
                            <span class="badge rounded-pill bg-white text-dark border px-3 py-2 fs-7 mb-4 shadow-sm d-inline-flex align-items-center gap-2 font-outfit" style="border-color: rgba(0, 180, 216, 0.15) !important;">
                                <i class="fa-solid fa-hand-holding-heart text-teal" style="color: var(--secondary-blue-500);"></i> 
                                <span class="fw-700 text-slate" style="letter-spacing: 0.5px;">Premium Hygiene & Germ Protection</span>
                            </span>
                            
                            <h1 class="hero-heading text-dark mb-3">
                                Premium <span class="text-gradient">Orvin Dish Wash</span> & Hand Wash
                            </h1>
                            
                            <p class="fs-5 text-slate mb-4 body-text" style="font-weight: 300; line-height: 1.7;">
                                Pure protection that kills 99.9% of bacteria. Grease-cutting lemon dishwasher liquid coupled with moisturizing skin-safe hand washes.
                            </p>
                            
                            <div class="d-flex flex-wrap gap-3 mb-5">
                                <a href="{{ route('products', ['category' => 'hand-wash']) }}" class="btn btn-premium rounded-pill px-4" style="box-shadow: 0 10px 25px rgba(0, 180, 216, 0.3); height: 50px; display: inline-flex; align-items: center;">Hygiene Range</a>
                                <a href="{{ route('contact') }}" class="btn btn-outline-premium rounded-pill px-4" style="height: 50px; display: inline-flex; align-items: center;">Request Free Quote</a>
                            </div>

                            <!-- Unified Premium Certifications Glass Panel -->
                            <div class="certifications-glass-panel d-flex flex-wrap align-items-center gap-4">
                                <div class="d-flex align-items-center gap-2 text-dark font-outfit fw-700 small-text"><i class="fa-solid fa-circle-check text-teal fs-5" style="color: var(--secondary-blue-500);"></i> Kills 99.9% Germs</div>
                                <div class="d-flex align-items-center gap-2 text-dark font-outfit fw-700 small-text"><i class="fa-solid fa-shield-halved text-teal fs-5" style="color: var(--secondary-blue-500);"></i> Lemon Grease Cutter</div>
                                <div class="d-flex align-items-center gap-2 text-dark font-outfit fw-700 small-text"><i class="fa-solid fa-leaf text-teal fs-5" style="color: var(--secondary-blue-500);"></i> Skin Moisturizer</div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 position-relative d-flex align-items-center justify-content-center">
                            <div class="hero-showcase-container position-relative" style="width: 100%; height: 480px; display: flex; align-items: center; justify-content: center;">
                                <!-- Glowing backdrop -->
                                <div class="position-absolute" style="top: 15%; left: 15%; width: 70%; height: 70%; background: radial-gradient(circle, rgba(0, 180, 216, 0.15) 0%, transparent 70%); filter: blur(45px); z-index: 0;"></div>
                                
                                <div class="editorial-offset-frame" style="border-color: rgba(0, 180, 216, 0.15);"></div>
                                
                                <!-- Central: Hand Wash -->
                                <div class="position-absolute liquid-morph-frame shadow-lg" style="z-index: 2; width: 300px; height: 360px; border-color: rgba(0, 180, 216, 0.15); display: flex; align-items: center; justify-content: center; background-color: #ffffff; padding: 20px;">
                                    <img src="{{ asset('assets/images/orvin-handwash.png') }}" alt="Orvin Premium Hand Wash" style="object-fit: contain; max-height: 90%;">
                                    <div class="position-absolute bottom-4 start-50 translate-middle-x" style="z-index: 10;">
                                        <span class="badge rounded-pill px-3 py-2 font-outfit text-white shadow-sm" style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.15); font-size: 0.72rem; font-weight: 700; letter-spacing: 1px; white-space: nowrap; display: inline-flex; align-items: center; gap: 6px;">
                                            <i class="fa-solid fa-hands-bubbles" style="color: var(--secondary-blue-500);"></i> SKIN-SAFE HYGIENE
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Floating: Dish Washer inside glass bubble -->
                                <div class="position-absolute product-glass-sphere" style="bottom: 5%; right: 5%; width: 180px; height: 180px; background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.8) 0%, rgba(0, 180, 216, 0.05) 100%); border-color: rgba(255,255,255,0.5);">
                                    <img src="{{ asset('assets/images/orvin-dish.png') }}" alt="Orvin Dish Washer Liquid" style="object-fit: contain;">
                                </div>
                                
                                <div class="floating-product-card glassmorphic-capsule position-absolute p-3 shadow" style="top: 10%; left: 5%; width: 210px; z-index: 3;">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="circle-icon-badge m-0" style="width: 40px; height: 40px; background: rgba(34, 197, 94, 0.1); color: var(--success);"><i class="fa-solid fa-handshake-angle fs-5"></i></div>
                                        <div>
                                            <span class="d-block small fw-bold text-dark font-outfit">Antibacterial</span>
                                            <span class="text-muted" style="font-size: 0.7rem;">pH Skin Friendly</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Swiper Hero Controls -->
        <div class="swiper-pagination hero-swiper-pagination"></div>
        <div class="swiper-button-next hero-swiper-button-next d-none d-md-flex"></div>
        <div class="swiper-button-prev hero-swiper-button-prev d-none d-md-flex"></div>
    </div>
</section>

<!-- Section 2: About Company -->
<section class="section-padding bg-white position-relative z-2" style="border-top-left-radius: 40px; border-top-right-radius: 40px; margin-top: -40px;">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left Side: Overlapping Double Cards -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-double-card-wrapper mx-auto">
                    <!-- Main Card (Z-2) -->
                    <div class="about-main-card">
                        <!-- Subtle radial gradient overlay -->
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at 10% 20%, rgba(0, 180, 216, 0.15) 0%, transparent 60%);"></div>
                        <div class="text-center p-5 position-relative z-2">
                            <i class="fa-solid fa-industry display-2 mb-3 text-teal" style="color: var(--secondary-blue-500); filter: drop-shadow(0 0 15px rgba(0, 180, 216, 0.4));"></i>
                            <h3 class="font-outfit fw-800 text-white mb-2">Automated Production</h3>
                            <p class="mb-0 text-white-50 small-text">State-of-the-Art Formulation Facility</p>
                        </div>
                    </div>
                    <!-- Overlapping Glass Card (Z-10) -->
                    <div class="about-floating-card">
                        <div class="d-flex align-items-center gap-3">
                            <span class="display-4 fw-800 text-teal mb-0" style="color: var(--secondary-blue-500); font-family: 'Poppins', sans-serif;">25+</span>
                            <div>
                                <span class="d-block fw-800 text-dark font-outfit" style="line-height:1.2; font-size:1.1rem;">Years of</span>
                                <span class="text-muted small fw-600 text-uppercase" style="letter-spacing:0.5px;">Formulation Excellence</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side: Narrative -->
            <div class="col-lg-6" data-aos="fade-left">
                <span class="text-teal fw-700 text-uppercase d-block mb-2" style="color: var(--secondary-blue-500); letter-spacing: 1.5px;">Corporate Profile</span>
                <h2 class="section-heading text-dark mb-4" style="font-weight: 800;">Formulating Superior Hygiene Standards</h2>
                <p class="body-text text-slate mb-4">{{ $settings['about_intro'] ?? 'Sree Chemicals is a leading manufacturer of premium, industrial-grade and household cleaning products, dedicated to hygiene, safety, and sustainable environmental care.' }}</p>
                
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="glassmorphic-mission-card">
                            <div class="d-flex align-items-start gap-3">
                                <div class="circle-icon-badge m-0" style="width: 42px; height: 42px; background: rgba(0, 180, 216, 0.08); color: var(--secondary-blue-500); flex-shrink: 0;"><i class="fa-solid fa-bullseye fs-5"></i></div>
                                <div>
                                    <h6 class="fw-800 text-dark mb-1 font-outfit">Our Mission</h6>
                                    <p class="text-muted small mb-0">{{ Str::limit($settings['about_mission'] ?? 'To deliver state-of-the-art cleaning solutions.', 90) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="glassmorphic-mission-card">
                            <div class="d-flex align-items-start gap-3">
                                <div class="circle-icon-badge m-0" style="width: 42px; height: 42px; background: rgba(0, 180, 216, 0.08); color: var(--secondary-blue-500); flex-shrink: 0;"><i class="fa-solid fa-eye fs-5"></i></div>
                                <div>
                                    <h6 class="fw-800 text-dark mb-1 font-outfit">Our Vision</h6>
                                    <p class="text-muted small mb-0">{{ Str::limit($settings['about_vision'] ?? 'To become the global standard in cleaning chemical manufacture.', 90) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('about') }}" class="btn btn-outline-premium rounded-pill px-4" style="height: 50px; display: inline-flex; align-items: center;">Read Corporate Journey</a>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Product Categories (4-Column Grid) -->
<section class="section-padding bg-light-gray">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-teal fw-700 text-uppercase d-block mb-2" style="color: var(--secondary-blue-500); letter-spacing: 1.5px;">Efficacy Redefined</span>
            <h2 class="section-heading" style="font-weight: 800;">Our Product Categories</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">We formulate cleaning agents for domestic laundry, industrial kitchens, and manufacturing floors.</p>
        </div>
        
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="premium-glow-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="category-img-wrapper d-flex align-items-center justify-content-center position-relative" style="height: 180px; padding: 20px; background: linear-gradient(135deg, rgba(0, 180, 216, 0.04) 0%, rgba(0, 150, 199, 0.08) 100%);">
                            @if($category->image_path)
                                <img src="{{ asset($category->image_path) }}" alt="{{ $category->name }}" style="max-height: 140px; width: auto; object-fit: contain; transition: transform 0.4s ease;" class="category-card-img">
                            @else
                                <i class="fa-solid fa-bucket display-3 text-teal" style="color: var(--secondary-blue-500); transition: transform 0.4s ease;"></i>
                            @endif
                        </div>
                        <div class="p-4 text-center">
                            <h5 class="fw-800 text-dark mb-2 font-outfit">{{ $category->name }}</h5>
                            <p class="text-muted small mb-0">{{ Str::limit($category->short_description, 80) }}</p>
                        </div>
                    </div>
                    <div class="p-4 pt-0 text-center">
                        <a href="{{ route('products', ['category' => $category->slug]) }}" class="btn btn-sm btn-outline-premium rounded-pill w-100" style="height:44px; display: inline-flex; align-items: center; justify-content: center;">View Catalog</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Section 4: Featured Products -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-5" data-aos="fade-up">
            <div>
                <span class="text-teal fw-700 text-uppercase d-block mb-2" style="color: var(--secondary-blue-500); letter-spacing: 1.5px;">Premium Selection</span>
                <h2 class="section-heading mb-0" style="font-weight: 800;">Featured Products</h2>
            </div>
            <a href="{{ route('products') }}" class="btn btn-premium rounded-pill px-4 mt-3 mt-md-0" style="height: 50px; display: inline-flex; align-items: center;">All Formulations</a>
        </div>

        <div class="row g-4">
            @forelse($featuredProducts as $product)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="premium-glow-card h-100 d-flex flex-column justify-content-between p-4">
                    <div>
                        @php
                            $bgStyle = 'linear-gradient(135deg, rgba(0, 180, 216, 0.05) 0%, rgba(0, 150, 199, 0.05) 100%)';
                            $catSlug = $product->category->slug ?? '';
                            if ($catSlug == 'hand-wash') {
                                $bgStyle = 'linear-gradient(135deg, rgba(0, 180, 216, 0.06) 0%, rgba(0, 180, 216, 0.15) 100%)';
                            } elseif (in_array($catSlug, ['dish-wash', 'dish-washer'])) {
                                $bgStyle = 'linear-gradient(135deg, rgba(0, 200, 83, 0.06) 0%, rgba(0, 200, 83, 0.15) 100%)';
                            } elseif ($catSlug == 'floor-cleaner') {
                                $bgStyle = 'linear-gradient(135deg, rgba(245, 158, 11, 0.06) 0%, rgba(245, 158, 11, 0.15) 100%)';
                            } elseif ($catSlug == 'toilet-cleaner') {
                                $bgStyle = 'linear-gradient(135deg, rgba(30, 41, 59, 0.06) 0%, rgba(30, 41, 59, 0.15) 100%)';
                            } elseif ($catSlug == 'washing-liquid') {
                                $bgStyle = 'linear-gradient(135deg, rgba(14, 165, 233, 0.06) 0%, rgba(14, 165, 233, 0.15) 100%)';
                            }
                        @endphp
                        @php
                            $homeProductImage = asset('assets/images/product-placeholder.png');
                            if ($product->primaryImage) {
                                $homeProductImage = asset($product->primaryImage->image_path);
                            } else {
                                $hCatSlug = $product->category->slug ?? '';
                                if ($hCatSlug == 'hand-wash') {
                                    $homeProductImage = asset('assets/images/orvin-handwash.png');
                                } elseif (in_array($hCatSlug, ['dish-wash', 'dish-washer'])) {
                                    $homeProductImage = asset('assets/images/orvin-dish.png');
                                } elseif ($hCatSlug == 'floor-cleaner') {
                                    $homeProductImage = asset('assets/images/orvin-floor.png');
                                } elseif (in_array($hCatSlug, ['liquid-detergent', 'fabric-wash', 'laundry-liquid', 'washing-liquid'])) {
                                    $homeProductImage = asset('assets/images/orvin-laundry.png');
                                }
                            }
                        @endphp
                        <div class="product-img-wrapper rounded-3 mb-4 d-flex align-items-center justify-content-center overflow-hidden" style="height: 220px; background: {!! $bgStyle !!}; text-align: center;">
                            <img src="{{ $homeProductImage }}" alt="{{ $product->name }}" class="h-100 w-auto py-3" style="object-fit: contain; transition: var(--transition-premium);">
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge bg-light text-dark border-0 shadow-sm py-2 px-3 font-outfit" style="font-size:0.75rem; font-weight: 700;">{{ $product->category->name }}</span>
                            @if(isset($product->specifications['pH Level']))
                                <span class="spec-mini-badge"><i class="fa-solid fa-droplet me-1"></i> pH {{ $product->specifications['pH Level'] }}</span>
                            @endif
                        </div>
                        
                        <h4 class="fw-800 text-dark mb-2 font-outfit">{{ $product->name }}</h4>
                        <p class="text-muted small mb-4">{{ $product->short_description }}</p>
                    </div>
                    <div class="row g-2 border-top pt-3 mt-3">
                        <div class="col-6">
                            <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-sm btn-outline-premium w-100 rounded-3" style="height:44px; display: inline-flex; align-items: center; justify-content: center;">Details</a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('product.detail', $product->slug) }}#quote" class="btn btn-sm btn-premium w-100 rounded-3" style="height:44px; display: inline-flex; align-items: center; justify-content: center;">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted">
                <p>No featured products found.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Section 5: Why Choose Us (6 Premium Cards) -->
<section class="section-padding bg-light-gray">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-teal fw-700 text-uppercase d-block mb-2" style="color: var(--secondary-blue-500); letter-spacing: 1.5px;">Corporate Integrity</span>
            <h2 class="section-heading" style="font-weight: 800;">Why Partner With Us</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">We adhere to rigorous international standards in formulation precision and environmental safety.</p>
        </div>

        <div class="row g-4">
            <!-- 1. Premium Quality -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-card premium-glow-card p-5">
                    <div class="circle-icon-badge"><i class="fa-solid fa-award fs-4"></i></div>
                    <h5 class="fw-800 text-dark mb-2 font-outfit">Premium Quality</h5>
                    <p class="text-muted small mb-0">We compile raw chemicals under precise lab settings, keeping batch strength identical across iterations.</p>
                </div>
            </div>
            <!-- 2. Manufacturing Facility -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="50">
                <div class="feature-card premium-glow-card p-5">
                    <div class="circle-icon-badge"><i class="fa-solid fa-industry fs-4"></i></div>
                    <h5 class="fw-800 text-dark mb-2 font-outfit">Advanced Facility</h5>
                    <p class="text-muted small mb-0">Our state-of-the-art plant features automated liquid blending and bottling lines to maximize sanitizing security.</p>
                </div>
            </div>
            <!-- 3. Fast Delivery -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card premium-glow-card p-5">
                    <div class="circle-icon-badge"><i class="fa-solid fa-truck-fast fs-4"></i></div>
                    <h5 class="fw-800 text-dark mb-2 font-outfit">Fast Logistics</h5>
                    <p class="text-muted small mb-0">Priority dispatches from GIDC transport terminals ensure bulk orders reach distributors within 48 to 72 hours.</p>
                </div>
            </div>
            <!-- 4. Expert Team -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                <div class="feature-card premium-glow-card p-5">
                    <div class="circle-icon-badge"><i class="fa-solid fa-user-doctor fs-4"></i></div>
                    <h5 class="fw-800 text-dark mb-2 font-outfit">Scientific Formulators</h5>
                    <p class="text-muted small mb-0">Ph.D. formulation chemists continuously evaluate active matter and test stability parameters.</p>
                </div>
            </div>
            <!-- 5. Customer Support -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card premium-glow-card p-5">
                    <div class="circle-icon-badge"><i class="fa-solid fa-headset fs-4"></i></div>
                    <h5 class="fw-800 text-dark mb-2 font-outfit">Corporate Support</h5>
                    <p class="text-muted small mb-0">Dedicated account managers assist distributors and retail dealers with logistics coordinates and licensing.</p>
                </div>
            </div>
            <!-- 6. Eco-Friendly Formulations -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
                <div class="feature-card premium-glow-card p-5">
                    <div class="circle-icon-badge"><i class="fa-solid fa-seedling fs-4"></i></div>
                    <h5 class="fw-800 text-dark mb-2 font-outfit">Eco Sustainability</h5>
                    <p class="text-muted small mb-0">Formulated without toxic phosphates or nonylphenol, keeping environmental water safety in check.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Manufacturing Process (Horizontal Timeline) -->
<section class="section-padding bg-white overflow-hidden">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-teal fw-700 text-uppercase d-block mb-2" style="color: var(--secondary-blue-500); letter-spacing: 1.5px;">Precision Blending</span>
            <h2 class="section-heading" style="font-weight: 800;">Our Manufacturing Steps</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">Every bottle of disinfectant undergoes rigorous safety evaluations before dispatch.</p>
        </div>

        <div class="process-timeline-horizontal pipeline-connected mt-5" data-aos="fade-up">
            <div class="row text-center g-4">
                <div class="col-lg-2-4 col-md-4 col-sm-12 process-step-horizontal position-relative">
                    <span class="timeline-step-number">01</span>
                    <div class="process-step-icon"><i class="fa-solid fa-vial-vacuum"></i></div>
                    <h5 class="fw-800 text-dark mb-1 font-outfit">Raw Material</h5>
                    <p class="text-muted small mb-0 px-2">Surfactants and pine oils are tested for density & stability.</p>
                </div>
                <div class="col-lg-2-4 col-md-4 col-sm-12 process-step-horizontal position-relative">
                    <span class="timeline-step-number">02</span>
                    <div class="process-step-icon"><i class="fa-solid fa-gears"></i></div>
                    <h5 class="fw-800 text-dark mb-1 font-outfit">Production</h5>
                    <p class="text-muted small mb-0 px-2">Automated blending chambers mix ingredients uniformly.</p>
                </div>
                <div class="col-lg-2-4 col-md-4 col-sm-12 process-step-horizontal position-relative">
                    <span class="timeline-step-number">03</span>
                    <div class="process-step-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                    <h5 class="fw-800 text-dark mb-1 font-outfit">Quality Check</h5>
                    <p class="text-muted small mb-0 px-2">Continuous evaluation of pH levels and viscosity specs.</p>
                </div>
                <div class="col-lg-2-4 col-md-4 col-sm-12 process-step-horizontal position-relative">
                    <span class="timeline-step-number">04</span>
                    <div class="process-step-icon"><i class="fa-solid fa-box"></i></div>
                    <h5 class="fw-800 text-dark mb-1 font-outfit">Packaging</h5>
                    <p class="text-muted small mb-0 px-2">Leak-proof sealing inside certified HDPE containers.</p>
                </div>
                <div class="col-lg-2-4 col-md-4 col-sm-12 process-step-horizontal position-relative">
                    <span class="timeline-step-number">05</span>
                    <div class="process-step-icon"><i class="fa-solid fa-truck-container"></i></div>
                    <h5 class="fw-800 text-dark mb-1 font-outfit">Dispatch</h5>
                    <p class="text-muted small mb-0 px-2">Secure transport transit routing to dealers nationwide.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 7: Statistics (Full Width Gradient Background) -->
<section class="section-padding stats-gradient-section text-white text-center position-relative">
    <div class="tech-grid-overlay" style="opacity: 0.15;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(15, 23, 42, 0.4) 0%, rgba(15, 23, 42, 0.9) 100%);"></div>
    <div class="container position-relative z-2">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="0">
                <div class="stats-number fw-800" data-target="25" style="font-size: 64px;">0</div>
                <span class="text-white-50 small font-outfit text-uppercase" style="letter-spacing: 1.5px; font-size: 0.75rem; font-weight: 600;">Years Experience</span>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="50">
                <div class="stats-number fw-800" data-target="50" style="font-size: 64px;">0</div>
                <span class="text-white-50 small font-outfit text-uppercase" style="letter-spacing: 1.5px; font-size: 0.75rem; font-weight: 600;">Products</span>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="stats-number fw-800" data-target="500" style="font-size: 64px;">0</div>
                <span class="text-white-50 small font-outfit text-uppercase" style="letter-spacing: 1.5px; font-size: 0.75rem; font-weight: 600;">Dealers Network</span>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="150">
                <div class="stats-number fw-800" data-target="15000" style="font-size: 64px;">0</div>
                <span class="text-white-50 small font-outfit text-uppercase" style="letter-spacing: 1.5px; font-size: 0.75rem; font-weight: 600;">Happy Clients</span>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="stats-number fw-800" data-target="18" style="font-size: 64px;">0</div>
                <span class="text-white-50 small font-outfit text-uppercase" style="letter-spacing: 1.5px; font-size: 0.75rem; font-weight: 600;">States Covered</span>
            </div>
        </div>
    </div>
</section>

<!-- Section 8: Testimonials (Luxury Testimonial Slider) -->
<section class="section-padding bg-light-gray overflow-hidden">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-teal fw-700 text-uppercase d-block mb-2" style="color: var(--secondary-blue-500); letter-spacing: 1.5px;">Client Praise</span>
            <h2 class="section-heading" style="font-weight: 800;">What Our Partners Say</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">Read verified feedback from logistics stockists and corporate procurement managers.</p>
        </div>

        <div class="swiper-container testimonials-slider pb-5" data-aos="fade-up">
            <div class="swiper-wrapper">
                @foreach($testimonials as $t)
                <div class="swiper-slide">
                    <div class="luxury-testimonial-card p-4 h-100 border-0">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="bg-teal text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; background-color: rgba(14, 165, 233, 0.08); color: var(--secondary-blue-500) !important;">
                                <i class="fa-solid fa-quote-left fs-4" style="color: var(--secondary-blue-500);"></i>
                            </div>
                            <div>
                                <h6 class="fw-800 text-dark mb-0 font-outfit">{{ $t->client_name }}</h6>
                                <span class="text-muted small">{{ $t->designation }}</span>
                            </div>
                        </div>
                        <div class="text-warning mb-3" style="font-size: 0.9rem;">
                            @for($i = 0; $i < $t->rating; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>
                        <p class="text-slate mb-0 font-italic" style="font-size: 0.95rem; font-style: italic; line-height: 1.6;">"{{ $t->review }}"</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="testimonials-pagination text-center mt-4"></div>
        </div>
    </div>
</section>

<!-- Section 9: FAQ Accordions -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <span class="text-teal fw-600 text-uppercase d-block mb-2" style="color: var(--secondary-blue-500); letter-spacing: 1.5px;">Queries Answered</span>
                <h2 class="section-heading">Frequently Asked Questions</h2>
                <p class="text-muted">Find clarifications regarding raw material safety datasheets, bulk shipping capacities, and logistics licenses.</p>
                <a href="{{ route('contact') }}" class="btn btn-premium rounded-pill px-4">Submit Query</a>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFAQ{{ $faq->id }}">
                            <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFAQ{{ $faq->id }}" aria-expanded="@if($loop->first) true @else false @endif" aria-controls="collapseFAQ{{ $faq->id }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapseFAQ{{ $faq->id }}" class="accordion-collapse collapse @if($loop->first) show @endif" aria-labelledby="headingFAQ{{ $faq->id }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small-text">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 10: Final CTA (Full Width Gradient) -->
<!--
<section class="section-padding text-white text-center position-relative overflow-hidden" style="background: linear-gradient(135deg, var(--secondary-blue-500) 0%, var(--secondary-cyan-500) 100%);">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at 50% 50%, rgba(255,255,255,0.1) 0%, transparent 80%);"></div>
    <div class="container position-relative z-2" data-aos="zoom-in">
        <h2 class="display-5 font-outfit fw-800 text-white mb-3">Ready To Partner With Us?</h2>
        <p class="fs-5 max-width-600 mx-auto mb-5 text-white-50" style="max-width: 600px;">Unlock exclusive corporate wholesale discounts, high profitability margins, and comprehensive sales support. Join our nationwide network.</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('dealer.registration') }}" class="btn btn-light btn-lg rounded-pill font-outfit px-4" style="color: var(--secondary-blue-500); font-weight: 600; height: 56px; display: inline-flex; align-items: center;">Become Dealer</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg rounded-pill font-outfit px-4" style="height: 56px; display: inline-flex; align-items: center;">Contact Us</a>
        </div>
    </div>
</section>
-->
@endsection
