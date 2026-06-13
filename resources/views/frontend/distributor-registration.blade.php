@extends('layouts.frontend')

@section('content')
<!-- Page Banner Header -->
<section class="section-padding text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, #1e293b 100%); margin-bottom: 50px;">
    <div class="container text-center">
        <h1 class="display-4 font-outfit fw-800 text-white" data-aos="fade-down">Distributor Partnership Program</h1>
        <p class="fs-6 text-muted-white mx-auto" style="max-width: 600px; color: #cbd5e1;" data-aos="fade-up">Become our exclusive distribution partner for your district or territory.</p>
    </div>
</section>

<!-- Registration Form Section -->
<section class="section-padding bg-white pt-0">
    <div class="container">
        
        <!-- Alerts for Success/Error -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-5" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-5 align-items-center">
            
            <!-- Marketing copy (Left Column) -->
            <div class="col-lg-5" data-aos="fade-right">
                <span class="text-teal fw-600 text-uppercase d-block mb-2" style="color: var(--secondary-color); letter-spacing: 1.5px;">Exclusive Rights</span>
                <h2 class="font-outfit fw-800 text-dark mb-4">Distributorship Benefits</h2>
                
                <div class="d-flex gap-3 mb-4">
                    <div class="text-teal" style="color: var(--secondary-color);"><i class="fa-solid fa-map-location fs-3"></i></div>
                    <div>
                        <h6 class="fw-700 text-dark mb-1">Exclusive Territory Rights</h6>
                        <p class="text-muted small mb-0">Secure exclusive supply rights for your designated district or territory. All local dealer orders route through you.</p>
                    </div>
                </div>

                <div class="d-flex gap-3 mb-4">
                    <div class="text-teal" style="color: var(--secondary-color);"><i class="fa-solid fa-boxes-packing fs-3"></i></div>
                    <div>
                        <h6 class="fw-700 text-dark mb-1">Promotional Material & Merchandising</h6>
                        <p class="text-muted small mb-0">We supply free marketing banners, product catalogs, retail brochures, and salesperson training support.</p>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <div class="text-teal" style="color: var(--secondary-color);"><i class="fa-solid fa-hand-holding-dollar fs-3"></i></div>
                    <div>
                        <h6 class="fw-700 text-dark mb-1">High ROI & Credit Terms</h6>
                        <p class="text-muted small mb-0">Enjoy accelerated returns on investment with flexible credit arrangements for established distribution firms.</p>
                    </div>
                </div>
            </div>

            <!-- Form Card (Right Column) -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="glass-card p-4" style="border-top: 5px solid var(--secondary-color);">
                    <h4 class="font-outfit fw-800 text-dark mb-4">Submit Distributorship Request</h4>
                    
                    <form action="{{ route('distributor.submit') }}" method="POST">
                        @csrf
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-500">Distribution Firm Name <span class="text-danger">*</span></label>
                                <input type="text" name="company_name" class="form-control rounded-3 @error('company_name') is-invalid @enderror" placeholder="Firm or Agency Name" value="{{ old('company_name') }}" required>
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-500">Contact Person <span class="text-danger">*</span></label>
                                <input type="text" name="contact_person" class="form-control rounded-3 @error('contact_person') is-invalid @enderror" placeholder="Contact Person Full Name" value="{{ old('contact_person') }}" required>
                                @error('contact_person')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-500">Contact Number (Mobile) <span class="text-danger">*</span></label>
                                <input type="text" name="mobile" class="form-control rounded-3 @error('mobile') is-invalid @enderror" placeholder="Enter phone" value="{{ old('mobile') }}" required>
                                @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-500">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror" placeholder="Enter email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label text-dark fw-500">Prior Business Experience (Years / Sectors)</label>
                                <textarea name="business_experience" class="form-control rounded-3 @error('business_experience') is-invalid @enderror" rows="3" placeholder="Describe your experience in wholesale distribution, chemical sales, FMCG products etc...">{{ old('business_experience') }}</textarea>
                                @error('business_experience')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label text-dark fw-500">Full Business Address <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control rounded-3 @error('address') is-invalid @enderror" rows="3" placeholder="Specify corporate office address with state and city..." required>{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Submit Distributor Request</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
