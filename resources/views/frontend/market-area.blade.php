@extends('layouts.frontend')

@section('content')
<!-- Page Banner Header -->
<section class="section-padding text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, #1e293b 100%); margin-bottom: 50px;">
    <div class="container text-center">
        <h1 class="display-4 font-outfit fw-800 text-white" data-aos="fade-down">Market Network</h1>
        <p class="fs-6 text-muted-white mx-auto" style="max-width: 600px; color: #cbd5e1;" data-aos="fade-up">Find our authorized dealer network footprint across major states in India.</p>
    </div>
</section>

<!-- Interactive Map and Network Info -->
<section class="section-padding bg-white pt-0">
    <div class="container">
        <div class="row g-5">
            
            <!-- Interactive India SVG Map (Left Column) -->
            <div class="col-lg-7" data-aos="fade-right">
                <div class="map-container text-center">
                    <h5 class="font-outfit fw-700 mb-4 text-dark"><i class="fa-solid fa-map me-2 text-teal" style="color: var(--secondary-color);"></i> Interactive Dealer Footprint Map</h5>
                    <p class="text-muted small mb-4">Click on any highlighted region to inspect active dealer listings, warehouse locations, and city networks.</p>
                    
                    <!-- Simplified Inline SVG Map of India -->
                    <svg version="1.1" id="IndiaMap" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                         x="0px" y="0px" viewBox="0 0 500 550" style="enable-background:new 0 0 500 550; max-height: 480px; width: 100%;" xml:space="preserve">
                        
                        <!-- Northern Region (Delhi/UP/Punjab) -->
                        <path class="india-state" data-name="Delhi" data-dealers="50" data-cities="New Delhi, Noida, Gurugram" data-details="North India warehousing hub. Over 50 active retail dealerships serving NCR."
                              d="M190,140 L210,130 L220,150 L200,160 Z" />
                              
                        <!-- North-Western Region (Rajasthan) -->
                        <path class="india-state" data-name="Rajasthan" data-dealers="30" data-cities="Jaipur, Jodhpur, Udaipur" data-details="Authorized retail dealer networks operating in major tourist and manufacturing zones."
                              d="M120,160 L180,140 L200,190 L130,220 Z" />
                              
                        <!-- Western Region (Gujarat) -->
                        <path class="india-state" data-name="Gujarat" data-dealers="105" data-cities="Vadodara (HQ), Ahmedabad, Surat, Rajkot" data-details="HQ and Main Formulation Plant. 105 authorized retail dealer outlets and 2 central inventory warehouses."
                              d="M80,230 L130,220 L150,260 L140,290 L95,290 L80,260 Z" />
                              
                        <!-- Central/Western Region (Maharashtra) -->
                        <path class="india-state" data-name="Maharashtra" data-dealers="85" data-cities="Mumbai, Pune, Nagpur, Nashik" data-details="Regional Supply Hub. 85 active dealers and 8 primary wholesale stockists."
                              d="M140,290 L190,280 L230,320 L210,380 L140,350 Z" />
                              
                        <!-- Southern Region (Karnataka) -->
                        <path class="india-state" data-name="Karnataka" data-dealers="40" data-cities="Bengaluru, Hubballi, Mysuru" data-details="South India logistics hub. 40 dealers covering major tech parks and commercial blocks."
                              d="M150,370 L180,360 L200,420 L160,470 L140,430 Z" />
                              
                        <!-- South-Eastern Region (Tamil Nadu) -->
                        <path class="india-state" data-name="Tamil Nadu" data-dealers="35" data-cities="Chennai, Coimbatore, Madurai" data-details="Growing distributor network. 35 retail outlets and 1 logistics transit point."
                              d="M180,440 L210,430 L220,490 L180,510 Z" />
                              
                        <!-- Decorative Map Markers -->
                        <circle cx="140" cy="270" r="5" fill="#0d9488" />
                        <text x="150" y="275" font-family="Outfit" font-size="12" font-weight="bold" fill="#0b132b">Vadodara (HQ)</text>
                        
                        <circle cx="160" cy="330" r="4" fill="#0284c7" />
                        <text x="170" y="335" font-family="Outfit" font-size="10" fill="#64748b">Mumbai Office</text>
                    </svg>
                </div>
            </div>

            <!-- Details Display Card (Right Column) -->
            <div class="col-lg-5" data-aos="fade-left">
                <div class="glass-card h-100 d-flex flex-column justify-content-between p-4" style="border-top: 5px solid var(--secondary-color);">
                    <div>
                        <span class="badge bg-light text-teal border mb-2 font-outfit" style="color: var(--secondary-color);">Region Metrics</span>
                        <h3 class="font-outfit fw-800 text-dark mb-1" id="map-card-title">Gujarat</h3>
                        <h5 class="fw-700 text-teal mb-4" id="map-card-dealers" style="color: var(--secondary-color);">105 Active Dealers</h5>
                        
                        <div class="p-3 bg-light rounded-3 mb-4">
                            <h6 class="fw-700 text-dark mb-1" id="map-card-cities">Key Hubs: Vadodara (HQ), Ahmedabad, Surat, Rajkot</h6>
                        </div>

                        <p class="text-muted" id="map-card-details" style="font-size: 0.95rem; line-height: 1.6;">
                            HQ and Main Formulation Plant. 105 authorized retail dealer outlets and 2 central inventory warehouses.
                        </p>
                    </div>

                    <div class="border-top pt-4 mt-4">
                        <h6 class="fw-700 text-dark mb-3">Expanding in Your State?</h6>
                        <p class="text-muted small">We are actively accepting applications for exclusive district distributorships and dealership licenses.</p>
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="{{ route('dealer.registration') }}" class="btn btn-sm btn-premium w-100 rounded-3">Dealer Registration</a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('distributor.registration') }}" class="btn btn-sm btn-outline-premium w-100 rounded-3">Distributor Apply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
