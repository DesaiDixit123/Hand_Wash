@extends('layouts.frontend')

@section('content')
<!-- Page Banner Header -->
<section class="section-padding text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, #1e293b 100%); margin-bottom: 50px;">
    <div class="container text-center">
        <h1 class="display-4 font-outfit fw-800 text-white" data-aos="fade-down">Corporate Profile</h1>
        <p class="fs-6 text-muted-white mx-auto" style="max-width: 600px; color: #cbd5e1;" data-aos="fade-up">Learn about our history, chemistry formulation laboratories, and our commitment to absolute hygiene.</p>
    </div>
</section>

<!-- Company Overview & History -->
<section class="section-padding bg-white pt-0">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="text-teal fw-600 text-uppercase d-block mb-2" style="color: var(--secondary-color); letter-spacing: 1.5px;">About Sree Chemicals</span>
                <h2 class="font-outfit fw-800 fs-1 text-dark mb-4">Formulating Safe Hygiene Since 2001</h2>
                <p class="text-muted mb-4">{{ $settings['about_intro'] ?? 'Sree Chemicals is a leading manufacturer of premium, industrial-grade and household cleaning products, dedicated to hygiene, safety, and sustainable environmental care.' }}</p>
                <p class="text-muted mb-4">{{ $settings['about_history'] ?? 'Founded in 2001, Sree Chemicals began with a small production unit for floor cleaners. Today, we operate a state-of-the-art automated manufacturing facility serving over 500+ dealers nationwide.' }}</p>
                
                <div class="row g-3 mt-2">
                    <div class="col-6">
                        <div class="p-3 bg-light rounded-3 border-start border-4 border-teal" style="border-left-color: var(--secondary-color) !important;">
                            <h4 class="fw-800 text-teal mb-1" style="color: var(--secondary-color);">ISO 9001</h4>
                            <span class="text-muted small">Quality Management</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-light rounded-3 border-start border-4 border-teal" style="border-left-color: var(--accent-color) !important;">
                            <h4 class="fw-800 text-teal mb-1" style="color: var(--accent-color);">100%</h4>
                            <span class="text-muted small">Safe Surfactants</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="p-5 rounded-4 shadow-lg position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(13, 148, 136, 0.05) 0%, rgba(2, 132, 199, 0.05) 100%); border: 1px solid rgba(13, 148, 136, 0.15);">
                    <h4 class="font-outfit fw-700 text-dark mb-4">Core Corporate Values</h4>
                    <div class="d-flex gap-3 mb-4">
                        <div class="text-teal" style="color: var(--secondary-color);"><i class="fa-solid fa-square-check fs-4"></i></div>
                        <div>
                            <h6 class="fw-700 text-dark mb-1">Quality Assurance First</h6>
                            <p class="text-muted small mb-0">Every product batch goes through mandatory chromatography & pH verification in our GIDC testing labs.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mb-4">
                        <div class="text-teal" style="color: var(--secondary-color);"><i class="fa-solid fa-shield-halved fs-4"></i></div>
                        <div>
                            <h6 class="fw-700 text-dark mb-1">Environmental Responsibility</h6>
                            <p class="text-muted small mb-0">We actively reject using nonylphenol and phosphates, ensuring our cleaning chemicals disintegrate safely.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="text-teal" style="color: var(--secondary-color);"><i class="fa-solid fa-handshake fs-4"></i></div>
                        <div>
                            <h6 class="fw-700 text-dark mb-1">Client Centric Operations</h6>
                            <p class="text-muted small mb-0">Our support channels remain open 24/7, providing logistics trace reports and immediate bulk dispatches.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Infrastructure & Manufacturing Unit Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-5 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="row g-3">
                    <div class="col-6">
                        <div style="background: linear-gradient(135deg, #0d9488 0%, #0b132b 100%); height: 180px;" class="rounded-4 shadow-sm d-flex align-items-center justify-content-center text-white p-3 text-center">
                            <div>
                                <i class="fa-solid fa-flask-vial fs-1 mb-2"></i>
                                <span class="d-block small">Formulation Lab</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="background: linear-gradient(135deg, #0284c7 0%, #0b132b 100%); height: 180px;" class="rounded-4 shadow-sm d-flex align-items-center justify-content-center text-white p-3 text-center">
                            <div>
                                <i class="fa-solid fa-industry fs-1 mb-2"></i>
                                <span class="d-block small">Automated Bottling</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div style="background: linear-gradient(135deg, #1e293b 0%, #0b132b 100%); height: 180px;" class="rounded-4 shadow-sm d-flex align-items-center justify-content-center text-white p-3 text-center">
                            <div>
                                <i class="fa-solid fa-warehouse fs-1 mb-2"></i>
                                <h6 class="mb-0 fw-700">10,000 Sq. Ft. Warehouse Capacity</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="text-teal fw-600 text-uppercase d-block mb-2" style="color: var(--secondary-color); letter-spacing: 1.5px;">Advanced Facility</span>
                <h2 class="section-title">Our Advanced <span>Manufacturing Plant</span></h2>
                <p class="text-muted mb-4">Operating from GIDC Chemical Estate in Vadodara, Gujarat, our facility is equipped with automated formulation blending chambers, automatic high-speed liquid packaging lines, and a dedicated Quality Control laboratory.</p>
                <div class="p-3 bg-white rounded-3 shadow-sm mb-3">
                    <h6 class="fw-700 text-dark mb-1"><i class="fa-solid fa-circle-check text-teal me-2" style="color: var(--secondary-color);"></i> Automated Liquid Formulation Blenders</h6>
                    <p class="text-muted small mb-0 ps-4">Guarantees precision blending of handwash, floor phenyl, and liquid detergent batches.</p>
                </div>
                <div class="p-3 bg-white rounded-3 shadow-sm">
                    <h6 class="fw-700 text-dark mb-1"><i class="fa-solid fa-circle-check text-teal me-2" style="color: var(--secondary-color);"></i> ISO Testing Laboratory</h6>
                    <p class="text-muted small mb-0 ps-4">Continuous evaluation of chemical shelf stability, thickness, and active cleaning matter percentage.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Members Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-teal fw-600 text-uppercase d-block mb-2" style="color: var(--secondary-color); letter-spacing: 1.5px;">Scientific Leadership</span>
            <h2 class="section-title">Board of <span>Directors & Scientists</span></h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">Meet the dedicated formulation experts and corporate directors driving Sree Chemicals towards premium safety.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($team as $member)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="glass-card text-center h-100 d-flex flex-column">
                    <div class="mx-auto rounded-circle overflow-hidden bg-teal mb-4 d-flex align-items-center justify-content-center" style="width: 120px; height: 120px; background-color: var(--secondary-color);">
                        <i class="fa-solid fa-user-tie display-4 text-white"></i>
                    </div>
                    <h5 class="fw-700 text-dark mb-1">{{ $member->name }}</h5>
                    <span class="badge bg-light text-teal mb-3 px-3 py-1 font-outfit" style="color: var(--secondary-color);">{{ $member->designation }}</span>
                    <p class="text-muted small flex-grow-1 mb-4">{{ $member->bio }}</p>
                    @if($member->linkedin_url)
                        <a href="{{ $member->linkedin_url }}" target="_blank" class="text-teal fs-4" style="color: var(--secondary-color);"><i class="fa-brands fa-linkedin"></i></a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
