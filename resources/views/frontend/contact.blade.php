@extends('layouts.frontend')

@section('content')
<!-- Page Banner Header -->
<section class="section-padding text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, #1e293b 100%); margin-bottom: 50px;">
    <div class="container text-center">
        <h1 class="display-4 font-outfit fw-800 text-white" data-aos="fade-down">Connect With Us</h1>
        <p class="fs-6 text-muted-white mx-auto" style="max-width: 600px; color: #cbd5e1;" data-aos="fade-up">Get in touch for bulk supplies, dealerships, product certifications, or general questions.</p>
    </div>
</section>

<!-- Contact Form and Details -->
<section class="section-padding bg-white pt-0">
    <div class="container">
        
        <!-- Alerts for Success/Error -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-5" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-5">
            
            <!-- Details & Google Map (Left Column) -->
            <div class="col-lg-5" data-aos="fade-right">
                
                <!-- Contact cards -->
                <div class="d-flex gap-3 mb-4">
                    <div class="p-3 rounded-circle bg-light text-teal d-flex align-items-center justify-content-center flex-shrink-0" style="width: 55px; height: 55px; color: var(--secondary-color);">
                        <i class="fa-solid fa-map-location-dot fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-700 text-dark mb-1">Corporate HQ & Plant</h6>
                        <p class="text-muted small mb-0">{{ $settings['address'] ?? '124, Nexus-1, Uttarsanda Road, Nadiad, Gujarat, India' }}</p>
                    </div>
                </div>

                <div class="d-flex gap-3 mb-4">
                    <div class="p-3 rounded-circle bg-light text-teal d-flex align-items-center justify-content-center flex-shrink-0" style="width: 55px; height: 55px; color: var(--secondary-color);">
                        <i class="fa-solid fa-phone-volume fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-700 text-dark mb-1">Call Representative</h6>
                        <p class="text-muted small mb-0">{{ $settings['phone'] ?? '+91 98765 43210' }}</p>
                    </div>
                </div>

                <div class="d-flex gap-3 mb-4">
                    <div class="p-3 rounded-circle bg-light text-teal d-flex align-items-center justify-content-center flex-shrink-0" style="width: 55px; height: 55px; color: var(--secondary-color);">
                        <i class="fa-solid fa-envelope-open-text fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-700 text-dark mb-1">Email Correspondence</h6>
                        <p class="text-muted small mb-0">{{ $settings['email'] ?? 'info@cleanhouse.com' }}</p>
                    </div>
                </div>

                <!-- Google Map Embed -->
                <div class="rounded-4 overflow-hidden shadow-sm border mt-4">
                    <iframe src="{{ $settings['map_iframe'] ?? 'https://www.google.com/maps/embed' }}" 
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>

            <!-- Contact Form (Right Column) -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="glass-card p-4">
                    <h4 class="font-outfit fw-800 text-dark mb-4">Send a Message</h4>
                    
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-500">Your Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control rounded-3 @error('name') is-invalid @enderror" placeholder="e.g. John Doe" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-500">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror" placeholder="e.g. john@company.com" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-500">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control rounded-3 @error('mobile') is-invalid @enderror" placeholder="e.g. +91 9876543210" value="{{ old('mobile') }}">
                                @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-500">Inquiry Subject</label>
                                <input type="text" name="subject" class="form-control rounded-3 @error('subject') is-invalid @enderror" placeholder="e.g. Dealership Quote / Bulk Order" value="{{ old('subject') }}">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label text-dark fw-500">Your Message <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control rounded-3 @error('message') is-invalid @enderror" rows="5" placeholder="Specify your chemical requirements or general question..." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Submit Message</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
