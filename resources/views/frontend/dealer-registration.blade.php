@extends('layouts.frontend')

@section('content')
<!-- Page Banner Header -->
<section class="section-padding text-white" style="background: linear-gradient(135deg, var(--primary-slate-900) 0%, var(--primary-slate-800) 100%); margin-bottom: 50px;">
    <div class="container text-center">
        <h1 class="display-4 font-outfit fw-800 text-white" data-aos="fade-down">Dealer Partnership Program</h1>
        <p class="fs-6 text-muted-white mx-auto" style="max-width: 600px; color: #cbd5e1;" data-aos="fade-up">Apply in 3 simple steps to become an authorized Sree Chemicals retail partner.</p>
    </div>
</section>

<!-- Multi-step Registration Wizard Section -->
<section class="section-padding bg-white pt-0">
    <div class="container">
        
        <!-- Alerts for Success/Error -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-5" role="alert" data-aos="zoom-in">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                
                <!-- Progress Indicator -->
                <div class="position-relative progress-indicator-bar mb-5">
                    <div class="progress-indicator-fill" id="wizard-progress-fill"></div>
                    <div class="step-bullet-wrapper">
                        <div class="step-bullet active" id="bullet-1"></div>
                        <div class="step-bullet" id="bullet-2"></div>
                        <div class="step-bullet" id="bullet-3"></div>
                    </div>
                </div>

                <!-- Registration Multi-step Form Card -->
                <div class="glass-card p-4" style="border-top: 5px solid var(--secondary-blue-500);">
                    <form action="{{ route('dealer.submit') }}" method="POST" id="dealerWizardForm">
                        @csrf
                        
                        <!-- STEP 1: Corporate Profile -->
                        <div class="form-step active" id="step-1">
                            <h4 class="font-outfit fw-800 text-dark mb-4"><i class="fa-solid fa-building text-teal me-2" style="color: var(--secondary-blue-500);"></i> Step 1: Corporate Profile</h4>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-dark fw-500">Company / Shop Name <span class="text-danger">*</span></label>
                                    <input type="text" name="company_name" id="company_name" class="form-control rounded-3" placeholder="e.g. Patel Chemical Traders" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark fw-500">Proprietor / Owner Name <span class="text-danger">*</span></label>
                                    <input type="text" name="owner_name" id="owner_name" class="form-control rounded-3" placeholder="Owner Full Name" required>
                                </div>
                                <div class="col-12 mt-4 text-end">
                                    <button type="button" class="btn btn-premium rounded-pill font-outfit px-4" onclick="nextStep(2)">Next Step <i class="fa-solid fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- STEP 2: Location & Identification -->
                        <div class="form-step" id="step-2">
                            <h4 class="font-outfit fw-800 text-dark mb-4"><i class="fa-solid fa-map-location-dot text-teal me-2" style="color: var(--secondary-blue-500);"></i> Step 2: Location & Licensing</h4>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-dark fw-500">State <span class="text-danger">*</span></label>
                                    <input type="text" name="state" id="state" class="form-control rounded-3" placeholder="e.g. Gujarat" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark fw-500">City / Town <span class="text-danger">*</span></label>
                                    <input type="text" name="city" id="city" class="form-control rounded-3" placeholder="e.g. Vadodara" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-dark fw-500">GST Registration Number</label>
                                    <input type="text" name="gst_number" class="form-control rounded-3" placeholder="e.g. 24AAAAA0000A1Z5">
                                </div>
                                <div class="col-12 mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-premium rounded-pill font-outfit px-4" onclick="prevStep(1)"><i class="fa-solid fa-arrow-left me-2"></i> Back</button>
                                    <button type="button" class="btn btn-premium rounded-pill font-outfit px-4" onclick="nextStep(3)">Next Step <i class="fa-solid fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- STEP 3: Contact & Address Details -->
                        <div class="form-step" id="step-3">
                            <h4 class="font-outfit fw-800 text-dark mb-4"><i class="fa-solid fa-envelope-open-text text-teal me-2" style="color: var(--secondary-blue-500);"></i> Step 3: Contact & Address Details</h4>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-dark fw-500">Mobile Number (WhatsApp) <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" id="mobile" class="form-control rounded-3" placeholder="e.g. +91 9876543210" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark fw-500">Corporate Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control rounded-3" placeholder="e.g. office@company.com" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-dark fw-500">Full Business Address <span class="text-danger">*</span></label>
                                    <textarea name="address" id="address" class="form-control rounded-3" rows="3" placeholder="Specify shop/office address, road details, landmark, and pincode..." required></textarea>
                                </div>
                                <div class="col-12 mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-premium rounded-pill font-outfit px-4" onclick="prevStep(2)"><i class="fa-solid fa-arrow-left me-2"></i> Back</button>
                                    <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Submit Application <i class="fa-solid fa-circle-check ms-2"></i></button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
