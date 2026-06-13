@extends('layouts.frontend')

@section('content')
<!-- Detail Header Section -->
<section class="section-padding bg-light pb-5">
    <div class="container">
        
        <!-- Breadcrumb navigation -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-decoration-none text-muted">Products</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products', ['category' => $product->category->slug]) }}" class="text-decoration-none text-muted">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active text-dark fw-500" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            
            <!-- Images Gallery (Left Column) -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="product-gallery-main p-5 shadow-sm border bg-white" id="mainGalleryDisplay" style="height: 380px; display: flex; align-items: center; justify-content: center;">
                    <div class="text-center w-100">
                        @php
                            $mainProductImage = asset('assets/images/product-placeholder.png');
                            if ($product->primaryImage) {
                                $mainProductImage = asset($product->primaryImage->image_path);
                            } else {
                                $catSlug = $product->category->slug ?? '';
                                if ($catSlug == 'hand-wash') {
                                    $mainProductImage = asset('assets/images/orvin-handwash.png');
                                } elseif ($catSlug == 'dish-wash') {
                                    $mainProductImage = asset('assets/images/orvin-dish.png');
                                } elseif ($catSlug == 'floor-cleaner') {
                                    $mainProductImage = asset('assets/images/orvin-floor.png');
                                } elseif (in_array($catSlug, ['liquid-detergent', 'fabric-wash', 'laundry-liquid'])) {
                                    $mainProductImage = asset('assets/images/orvin-laundry.png');
                                }
                            }
                        @endphp
                        
                        <img src="{{ $mainProductImage }}" alt="{{ $product->name }}" id="mainProductImg" class="w-auto py-2" style="height: 220px; object-fit: contain; transition: var(--transition-premium); display: block; margin: 0 auto;">
                        
                        @php
                            $iconClass = 'fa-bottle-droplet';
                            $catSlug = $product->category->slug ?? '';
                            if ($catSlug == 'hand-wash') { $iconClass = 'fa-prescription-bottle-droplet'; }
                            elseif ($catSlug == 'dish-wash') { $iconClass = 'fa-soap'; }
                            elseif ($catSlug == 'floor-cleaner') { $iconClass = 'fa-bucket'; }
                            elseif ($catSlug == 'toilet-cleaner') { $iconClass = 'fa-toilet'; }
                            elseif ($catSlug == 'industrial-degreaser') { $iconClass = 'fa-flask-vial'; }
                        @endphp
                        <i class="fa-solid {{ $iconClass }} display-1 text-teal mb-3" style="color: var(--secondary-blue-500); display: none;" id="mainGalleryIcon"></i>
                        
                        <h4 class="text-dark font-outfit fw-700 mt-3" id="mainGalleryTitle">{{ $product->name }}</h4>
                        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill mt-2" id="mainGalleryBadge">Standard 500ml Retail Pack</span>
                        
                        <div class="mt-4 text-muted small" style="opacity: 0.85;">
                            <i class="fa-solid fa-shield-halved text-success me-1"></i> Quality Checked & Sealed Batch
                        </div>
                    </div>
                </div>

                <!-- Interactive Thumbnails -->
                <div class="gallery-thumbnail-grid">
                    <div class="gallery-thumbnail-card active" onclick="updateGallery('retail', 'Standard Retail Packaging', 'fa-prescription-bottle-droplet', 'linear-gradient(135deg, rgba(0, 180, 216, 0.05) 0%, rgba(0, 150, 199, 0.05) 100%)', this)">
                        <i class="fa-solid fa-prescription-bottle-droplet"></i>
                        <span>Retail Pack</span>
                    </div>
                    <div class="gallery-thumbnail-card" onclick="updateGallery('can', '5 Litre Commercial Jerry Can', 'fa-bucket', 'linear-gradient(135deg, rgba(0, 200, 83, 0.05) 0%, rgba(52, 199, 89, 0.05) 100%)', this)">
                        <i class="fa-solid fa-bucket"></i>
                        <span>5L Can</span>
                    </div>
                    <div class="gallery-thumbnail-card" onclick="updateGallery('barrel', '50L - 200L Industrial Drum', 'fa-flask-vial', 'linear-gradient(135deg, rgba(15, 23, 42, 0.05) 0%, rgba(30, 41, 59, 0.05) 100%)', this)">
                        <i class="fa-solid fa-flask-vial"></i>
                        <span>Industrial Drum</span>
                    </div>
                    <div class="gallery-thumbnail-card" onclick="updateGallery('lab', 'Technical TDS & Lab MSDS Certified', 'fa-file-shield', 'linear-gradient(135deg, rgba(245, 158, 11, 0.05) 0%, rgba(245, 158, 11, 0.1) 100%)', this)">
                        <i class="fa-solid fa-file-shield"></i>
                        <span>TDS & MSDS</span>
                    </div>
                </div>
            </div>

            <!-- Product Summary Info (Right Column) -->
            <div class="col-lg-6" data-aos="fade-left">
                <span class="badge bg-primary mb-2 px-3 py-2 rounded-pill font-outfit" style="background-color: var(--secondary-blue-500);">{{ $product->category->name }}</span>
                <h1 class="font-outfit fw-800 text-dark display-5 mb-3">{{ $product->name }}</h1>
                <p class="fs-5 text-muted mb-4 font-outfit" style="font-weight: 300; line-height: 1.5;">{{ $product->short_description }}</p>
                
                <!-- CTA buttons and Inquiry boxes -->
                <div class="card mb-4 p-4 border-0 border-start border-4 border-primary bg-light shadow-sm" style="border-left-color: var(--secondary-blue-500) !important;">
                    <h5 class="fw-700 text-dark mb-2">Lead & Dealer Inquiries</h5>
                    <p class="text-muted small mb-4">Request pricing details, Material Safety Data Sheets (MSDS), or apply to stock this chemical range in bulk.</p>
                    
                    <div class="d-flex flex-wrap gap-3">
                        <button class="btn btn-premium rounded-pill font-outfit px-4" data-bs-toggle="modal" data-bs-target="#quoteModal">
                            <i class="fa-regular fa-paper-plane me-2"></i> Get Free Quote
                        </button>
                        
                        @if(isset($settings['whatsapp']))
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}?text=Hello%20Sree%20Chemicals,%20I%20am%20inquiring%20about%20{{ urlencode($product->name) }}." target="_blank" class="btn btn-outline-success rounded-pill font-outfit px-4" style="border-width: 2px;">
                                <i class="fa-brands fa-whatsapp me-2"></i> WhatsApp Inquiry
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Brochure Download option -->
                <div class="d-flex align-items-center justify-content-between p-3 bg-white border rounded-3 shadow-sm">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-light p-2 rounded text-danger"><i class="fa-solid fa-file-pdf fs-4"></i></div>
                        <div>
                            <h6 class="mb-0 fw-700 text-dark">Technical Brochure & MSDS</h6>
                            <span class="text-muted small">File size: 1.2 MB | Format: PDF</span>
                        </div>
                    </div>
                    <a href="#" onclick="alert('Brochure and MSDS files will be generated upon request. Our team will email them to you.');" class="btn btn-sm btn-outline-premium rounded-3">Download</a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Tabs details section -->
<section class="section-padding bg-white">
    <div class="container" data-aos="fade-up">
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs custom-nav-tabs border-bottom font-outfit" id="productDetailTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc-pane" type="button" role="tab" aria-controls="desc-pane" aria-selected="true">Description</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs-pane" type="button" role="tab" aria-controls="specs-pane" aria-selected="false">Specifications</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="features-tab" data-bs-toggle="tab" data-bs-target="#features-pane" type="button" role="tab" aria-controls="features-pane" aria-selected="false">Features</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="benefits-tab" data-bs-toggle="tab" data-bs-target="#benefits-pane" type="button" role="tab" aria-controls="benefits-pane" aria-selected="false">Benefits</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="usage-tab" data-bs-toggle="tab" data-bs-target="#usage-pane" type="button" role="tab" aria-controls="usage-pane" aria-selected="false">Usage Instructions</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pkg-tab" data-bs-toggle="tab" data-bs-target="#pkg-pane" type="button" role="tab" aria-controls="pkg-pane" aria-selected="false">Packaging Sizes</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="apps-tab" data-bs-toggle="tab" data-bs-target="#apps-pane" type="button" role="tab" aria-controls="apps-pane" aria-selected="false">Applications</button>
            </li>
        </ul>

        <!-- Tab content panes -->
        <div class="tab-content py-4" id="productDetailTabsContent">
            
            <!-- Description -->
            <div class="tab-pane fade show active text-muted" id="desc-pane" role="tabpanel" aria-labelledby="desc-tab" style="line-height: 1.7; font-size: 1rem;">
                <p>{{ $product->description }}</p>
            </div>
            
            <!-- Specifications -->
            <div class="tab-pane fade" id="specs-pane" role="tabpanel" aria-labelledby="specs-tab">
                @if($product->specifications && is_array($product->specifications))
                <div class="table-responsive col-lg-8">
                    <table class="table table-striped border">
                        <tbody>
                            @foreach($product->specifications as $key => $val)
                            <tr>
                                <td class="fw-bold text-dark w-30 font-outfit" style="width: 250px;">{{ $key }}</td>
                                <td class="text-muted">{{ $val }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted">Standard technical configurations apply. Contact our formulation engineers for detailed specifications sheet.</p>
                @endif
            </div>

            <!-- Features -->
            <div class="tab-pane fade" id="features-pane" role="tabpanel" aria-labelledby="features-tab">
                @if($product->features && is_array($product->features))
                <ul class="list-unstyled row g-3 text-muted">
                    @foreach($product->features as $feature)
                    <li class="col-md-6 d-flex align-items-start gap-2">
                        <i class="fa-solid fa-circle-check mt-1" style="color: var(--accent-emerald-500);"></i> 
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-muted">High efficacy cleaning builders, active germicidal factors, biodegradable base.</p>
                @endif
            </div>

            <!-- Benefits -->
            <div class="tab-pane fade" id="benefits-pane" role="tabpanel" aria-labelledby="benefits-tab">
                @if($product->benefits && is_array($product->benefits))
                <ul class="list-unstyled row g-3 text-muted">
                    @foreach($product->benefits as $benefit)
                    <li class="col-md-6 d-flex align-items-start gap-2">
                        <i class="fa-solid fa-circle-check mt-1" style="color: var(--accent-emerald-500);"></i> 
                        <span>{{ $benefit }}</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-muted">Saves water usage due to easy rinse capabilities, protects surfaces from oxidation.</p>
                @endif
            </div>

            <!-- Usage Instructions -->
            <div class="tab-pane fade" id="usage-pane" role="tabpanel" aria-labelledby="usage-tab">
                <h5 class="fw-700 text-dark mb-4">Step-by-Step Usage Instructions</h5>
                <div class="row g-4">
                    @if($product->category->slug == 'hand-wash')
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 1</span>
                                <h6 class="fw-700 text-dark">Wet Hands</h6>
                                <p class="text-muted small mb-0">Wet your hands with clean, running water (warm or cold).</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 2</span>
                                <h6 class="fw-700 text-dark">Apply Soap</h6>
                                <p class="text-muted small mb-0">Apply a single pump of SoftShield Hand Wash gel to your palms.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 3</span>
                                <h6 class="fw-700 text-dark">Scrub 20s</h6>
                                <p class="text-muted small mb-0">Lather and scrub all surfaces of your hands, fingers, and nails for 20 seconds.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 4</span>
                                <h6 class="fw-700 text-dark">Rinse & Dry</h6>
                                <p class="text-muted small mb-0">Rinse thoroughly under clean running water and dry with a clean towel.</p>
                            </div>
                        </div>
                    @elseif($product->category->slug == 'dish-wash')
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 1</span>
                                <h6 class="fw-700 text-dark">Dilute</h6>
                                <p class="text-muted small mb-0">Mix 1 teaspoon of Sparkle Shine in a small bowl of water (approx. 40ml).</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 2</span>
                                <h6 class="fw-700 text-dark">Dip Sponge</h6>
                                <p class="text-muted small mb-0">Dip your cleaning sponge or scrub pad into the diluted solution.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 3</span>
                                <h6 class="fw-700 text-dark">Scrub Utensils</h6>
                                <p class="text-muted small mb-0">Scrub utensils gently to dissolve thick oils, grease, and food soils.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 4</span>
                                <h6 class="fw-700 text-dark">Rinse</h6>
                                <p class="text-muted small mb-0">Rinse utensils thoroughly with running water for a sparkling finish.</p>
                            </div>
                        </div>
                    @elseif($product->category->slug == 'floor-cleaner')
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 1</span>
                                <h6 class="fw-700 text-dark">Measure</h6>
                                <p class="text-muted small mb-0">Measure 1 capful (approx. 15-20ml) of CitrusGlow floor cleaner.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 2</span>
                                <h6 class="fw-700 text-dark">Mix in Water</h6>
                                <p class="text-muted small mb-0">Mix the measured cleaner into half a bucket (approx. 4L) of clean water.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 3</span>
                                <h6 class="fw-700 text-dark">Mop Surface</h6>
                                <p class="text-muted small mb-0">Mop the floor surface gently. No scrubbing needed for normal dirt.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 4</span>
                                <h6 class="fw-700 text-dark">Air Dry</h6>
                                <p class="text-muted small mb-0">Allow the floor surface to air dry. Do not rinse with water.</p>
                            </div>
                        </div>
                    @elseif($product->category->slug == 'glass-cleaner')
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 1</span>
                                <h6 class="fw-700 text-dark">Aim Nozzle</h6>
                                <p class="text-muted small mb-0">Turn spray nozzle to "ON" position and aim at the target glass surface.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 2</span>
                                <h6 class="fw-700 text-dark">Spray Mist</h6>
                                <p class="text-muted small mb-0">Spray a light mist over the surface from a distance of about 15-20 cm.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 3</span>
                                <h6 class="fw-700 text-dark">Wipe Clean</h6>
                                <p class="text-muted small mb-0">Wipe immediately with a clean dry microfiber cloth or squeegee.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 4</span>
                                <h6 class="fw-700 text-dark">Polish</h6>
                                <p class="text-muted small mb-0">Buff with dry side of the microfiber cloth for streak-free transparency.</p>
                            </div>
                        </div>
                    @elseif($product->category->slug == 'toilet-cleaner')
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 1</span>
                                <h6 class="fw-700 text-dark">Apply Gel</h6>
                                <p class="text-muted small mb-0">Apply AcidFlush toilet cleaner under the rim and all around the inner bowl.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 2</span>
                                <h6 class="fw-700 text-dark">Wait 20 Mins</h6>
                                <p class="text-muted small mb-0">Let the thick liquid cling and penetrate stains/scale for 15-20 minutes.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 3</span>
                                <h6 class="fw-700 text-dark">Brush Scrub</h6>
                                <p class="text-muted small mb-0">Brush the bowl surfaces gently to dissolve stubborn rings and soilings.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 4</span>
                                <h6 class="fw-700 text-dark">Flush</h6>
                                <p class="text-muted small mb-0">Flush toilet to rinse away the soilings and leave a clean fragrance.</p>
                            </div>
                        </div>
                    @elseif($product->category->slug == 'detergent-powder' || $product->category->slug == 'laundry-liquid')
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 1</span>
                                <h6 class="fw-700 text-dark">Load Level</h6>
                                <p class="text-muted small mb-0">Sort clothes by color and load them into the washing machine.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 2</span>
                                <h6 class="fw-700 text-dark">Add Cleaner</h6>
                                <p class="text-muted small mb-0">Add 1 scoop of powder or 1 capful of laundry liquid to the detergent tray.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 3</span>
                                <h6 class="fw-700 text-dark">Select Cycle</h6>
                                <p class="text-muted small mb-0">Select your regular washing machine wash cycle based on fabric type.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 4</span>
                                <h6 class="fw-700 text-dark">Dry Clean</h6>
                                <p class="text-muted small mb-0">Air dry the clean garments. Fabric will feel soft with a fresh scent.</p>
                            </div>
                        </div>
                    @else
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 1</span>
                                <h6 class="fw-700 text-dark">Dilute Product</h6>
                                <p class="text-muted small mb-0">Dilute the concentrated solution with water as required for applications.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 2</span>
                                <h6 class="fw-700 text-dark">Apply Solution</h6>
                                <p class="text-muted small mb-0">Apply to target surfaces using mop, spray, or automated scrubbers.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 3</span>
                                <h6 class="fw-700 text-dark">Dwell Time</h6>
                                <p class="text-muted small mb-0">Allow the solution to dwell on surface for 2-5 minutes to break soils.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="step-card">
                                <span class="badge bg-primary mb-2" style="background-color: var(--secondary-blue-500) !important;">Step 4</span>
                                <h6 class="fw-700 text-dark">Rinse / Clean</h6>
                                <p class="text-muted small mb-0">Rinse with high-pressure water or wipe dry with industrial mops.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Packaging Sizes -->
            <div class="tab-pane fade" id="pkg-pane" role="tabpanel" aria-labelledby="pkg-tab">
                <h5 class="fw-700 text-dark mb-4">Available Packaging Standards</h5>
                <p class="text-muted mb-4">We formulate and package our cleaning chemicals in standard, leak-proof HDPE containers conforming to safety regulations for retail, commercial, and industrial supply.</p>
                <div class="row g-4">
                    @php
                        $pkgValue = $product->specifications['Packaging'] ?? $product->specifications['packaging'] ?? '500ml Retail, 5L Can';
                        $pkgItems = explode(',', $pkgValue);
                    @endphp
                    @foreach($pkgItems as $item)
                        @php
                            $trimmedItem = trim($item);
                            $isIndustrial = (str_contains(strtolower($trimmedItem), 'drum') || str_contains(strtolower($trimmedItem), 'barrel') || str_contains(strtolower($trimmedItem), '20l') || str_contains(strtolower($trimmedItem), '50l') || str_contains(strtolower($trimmedItem), '200l'));
                            $isCan = (str_contains(strtolower($trimmedItem), 'can') || str_contains(strtolower($trimmedItem), '5l') || str_contains(strtolower($trimmedItem), '10l'));
                            $isBag = (str_contains(strtolower($trimmedItem), 'bag') || str_contains(strtolower($trimmedItem), 'pack') || str_contains(strtolower($trimmedItem), 'kg'));
                        @endphp
                        <div class="col-md-3">
                            <div class="packaging-card">
                                <div class="packaging-icon">
                                    @if($isIndustrial)
                                        <i class="fa-solid fa-flask-vial"></i>
                                    @elseif($isCan)
                                        <i class="fa-solid fa-bucket"></i>
                                    @elseif($isBag)
                                        <i class="fa-solid fa-gift"></i>
                                    @else
                                        <i class="fa-solid fa-prescription-bottle-droplet"></i>
                                    @endif
                                </div>
                                <h6 class="fw-700 text-dark mb-1">{{ $trimmedItem }}</h6>
                                <span class="text-muted small">
                                    @if($isIndustrial)
                                        Industrial Bulk Supply
                                    @elseif($isCan)
                                        Commercial Refill Can
                                    @elseif($isBag)
                                        Heavy Duty Powder Sack
                                    @else
                                        Standard Consumer Pack
                                    @endif
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Applications -->
            <div class="tab-pane fade" id="apps-pane" role="tabpanel" aria-labelledby="apps-tab">
                @if($product->applications && is_array($product->applications))
                <ul class="list-unstyled row g-3 text-muted">
                    @foreach($product->applications as $app)
                    <li class="col-md-6 d-flex align-items-start gap-2">
                        <i class="fa-solid fa-industry text-muted mt-1"></i> 
                        <span>{{ $app }}</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-muted">Designed for residential housekeeping, manufacturing environments, and hospitality structures.</p>
                @endif
            </div>

        </div>

    </div>
</section>

<!-- Related Products Section -->
@if($relatedProducts->count() > 0)
<section class="section-padding bg-light">
    <div class="container">
        <h3 class="font-outfit fw-800 mb-4 pb-2 border-bottom text-dark" data-aos="fade-up">Related Products</h3>
        <div class="row g-4">
            @foreach($relatedProducts as $rel)
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="product-card h-100 d-flex flex-column">
                    @php
                        $bgStyle = 'linear-gradient(135deg, rgba(0, 180, 216, 0.05) 0%, rgba(0, 150, 199, 0.05) 100%)';
                        $catSlug = $rel->category->slug ?? '';
                        if ($catSlug == 'hand-wash') {
                            $bgStyle = 'linear-gradient(135deg, rgba(0, 180, 216, 0.06) 0%, rgba(0, 180, 216, 0.15) 100%)';
                        } elseif ($catSlug == 'dish-wash') {
                            $bgStyle = 'linear-gradient(135deg, rgba(0, 200, 83, 0.06) 0%, rgba(0, 200, 83, 0.15) 100%)';
                        } elseif ($catSlug == 'floor-cleaner') {
                            $bgStyle = 'linear-gradient(135deg, rgba(245, 158, 11, 0.06) 0%, rgba(245, 158, 11, 0.15) 100%)';
                        } elseif ($catSlug == 'toilet-cleaner') {
                            $bgStyle = 'linear-gradient(135deg, rgba(30, 41, 59, 0.06) 0%, rgba(30, 41, 59, 0.15) 100%)';
                        } elseif ($catSlug == 'industrial-degreaser') {
                            $bgStyle = 'linear-gradient(135deg, rgba(15, 23, 42, 0.08) 0%, rgba(30, 41, 59, 0.2) 100%)';
                        }
                    @endphp
                    @php
                        $relProductImage = asset('assets/images/product-placeholder.png');
                        if ($rel->primaryImage) {
                            $relProductImage = asset($rel->primaryImage->image_path);
                        } else {
                            $relCatSlug = $rel->category->slug ?? '';
                            if ($relCatSlug == 'hand-wash') {
                                $relProductImage = asset('assets/images/orvin-handwash.png');
                            } elseif ($relCatSlug == 'dish-wash') {
                                $relProductImage = asset('assets/images/orvin-dish.png');
                            } elseif ($relCatSlug == 'floor-cleaner') {
                                $relProductImage = asset('assets/images/orvin-floor.png');
                            } elseif (in_array($relCatSlug, ['liquid-detergent', 'fabric-wash', 'laundry-liquid'])) {
                                $relProductImage = asset('assets/images/orvin-laundry.png');
                            }
                        }
                    @endphp
                    <div class="product-img-wrapper rounded-top overflow-hidden d-flex align-items-center justify-content-center" style="height: 180px; background: {!! $bgStyle !!};">
                        <img src="{{ $relProductImage }}" alt="{{ $rel->name }}" class="h-100 w-auto py-2" style="object-fit: contain; transition: var(--transition-premium);">
                    </div>
                    <div class="p-3 flex-grow-1 d-flex flex-column">
                        <h6 class="fw-700 font-outfit text-dark mb-2">{{ $rel->name }}</h6>
                        <p class="text-muted small flex-grow-1 mb-3" style="font-size: 0.8rem;">{{ Str::limit($rel->short_description, 80) }}</p>
                        <a href="{{ route('product.detail', $rel->slug) }}" class="btn btn-sm btn-outline-premium w-100 rounded-3 mt-auto" style="font-size: 0.8rem;">More Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Get Quote Modal -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header border-bottom-0 bg-light p-4" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
                <h5 class="modal-title font-outfit fw-800 text-dark" id="quoteModalLabel">Request Quote for Bulk Supply</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="subject" value="Quote request for product: {{ $product->name }}">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label text-dark fw-500">Your Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control rounded-3" placeholder="Enter name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark fw-500">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control rounded-3" placeholder="Enter email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark fw-500">Mobile Number <span class="text-danger">*</span></label>
                        <input type="text" name="mobile" class="form-control rounded-3" placeholder="Enter phone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark fw-500">Specify Requirements (Volume/Packaging) <span class="text-danger">*</span></label>
                        <textarea name="message" class="form-control rounded-3" rows="4" placeholder="Mention volume needed (e.g. 500 liters, 50 cans) and delivery city..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top-0 p-4 pt-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill font-outfit" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-premium rounded-pill font-outfit">Submit Quote Request</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function updateGallery(type, badgeText, iconClass, backgroundStyle, element) {
    const mainIcon = document.getElementById('mainGalleryIcon');
    const mainImg = document.getElementById('mainProductImg');
    
    // 1. Toggle image vs icon display
    if (type === 'retail') {
        if (mainImg) mainImg.style.display = 'block';
        if (mainIcon) mainIcon.style.display = 'none';
    } else {
        if (mainImg) mainImg.style.display = 'none';
        if (mainIcon) {
            mainIcon.style.display = 'block';
            mainIcon.className = `fa-solid ${iconClass} display-1 text-teal mb-3`;
        }
    }
    
    // 2. Change main badge text
    const mainBadge = document.getElementById('mainGalleryBadge');
    if (mainBadge) {
        mainBadge.innerText = badgeText;
    }
    
    // 3. Change background style of main container
    const mainDisplay = document.getElementById('mainGalleryDisplay');
    if (mainDisplay) {
        mainDisplay.style.background = backgroundStyle;
    }
    
    // 4. Update active class on thumbnails
    const thumbnails = document.querySelectorAll('.gallery-thumbnail-card');
    thumbnails.forEach(thumb => thumb.classList.remove('active'));
    
    if (element) {
        element.classList.add('active');
    }
}
</script>
@endsection

