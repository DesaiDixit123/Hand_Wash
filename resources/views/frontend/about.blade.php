@extends('layouts.frontend')

@section('content')
<!-- Page Banner Header -->
<section class="section-padding text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, #1e293b 100%); padding: 80px 0 60px;">
    <div class="container text-center">
        <h1 class="display-4 font-outfit fw-800 text-white mb-3" data-aos="fade-down">About Sree Chemicals</h1>
        <p class="fs-5 text-muted-white mx-auto mb-0" style="max-width: 650px; color: #cbd5e1; font-weight: 300;" data-aos="fade-up">Dedicated to delivering high-performance, eco-friendly cleaning formulations for domestic and commercial hygiene.</p>
    </div>
</section>

<!-- Simple Clean About Us Content -->
<section class="section-padding bg-white">
    <div class="container" style="max-width: 900px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-teal fw-600 text-uppercase d-block mb-2" style="color: var(--secondary-color); letter-spacing: 1.5px;">Our Story</span>
            <h2 class="font-outfit fw-800 text-dark display-6 mb-4">Formulating Safe & Effective Cleaning Solutions</h2>
            <div class="mx-auto bg-teal mb-4" style="width: 60px; height: 3px; background-color: var(--secondary-color);"></div>
        </div>

        <div class="fs-5 text-slate body-text mb-5" style="line-height: 1.8; font-weight: 300;" data-aos="fade-up">
            <p class="mb-4">
                Sree Chemicals is a trusted manufacturer of premium household and commercial cleaning products. Our flagship <strong>Orvin</strong> brand includes high-performance Hand Wash Gels, Dish Washer Liquids, Toilet Cleaners, Floor Cleaners, and Laundry Liquids formulated for maximum germ protection and safety.
            </p>
            <p class="mb-4">
                Operating from our modern manufacturing facility located in <strong>Nadiad, Gujarat</strong>, we serve an expanding network of over 500+ authorized dealers and distributors across India. Every product is developed using naturally-derived, bio-degradable active ingredients that effectively eliminate 99.9% of germs while remaining safe for families, pets, and the environment.
            </p>
            <p class="mb-0">
                Our mission is simple: to provide reliable, affordable, and eco-friendly cleaning formulations that deliver uncompromised hygiene and peace of mind for every home and business.
            </p>
        </div>

        <!-- Three Simple Highlights -->
        <div class="row g-4 text-center pt-5 border-top" data-aos="fade-up">
            <div class="col-md-4">
                <div class="p-3">
                    <i class="fa-solid fa-leaf display-5 text-teal mb-3" style="color: var(--secondary-color);"></i>
                    <h5 class="fw-700 text-dark font-outfit mb-2">100% Eco-Safe</h5>
                    <p class="text-muted small mb-0">Biodegradable ingredients gentle on skin and environment.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <i class="fa-solid fa-shield-halved display-5 text-teal mb-3" style="color: var(--secondary-color);"></i>
                    <h5 class="fw-700 text-dark font-outfit mb-2">99.9% Germ Protection</h5>
                    <p class="text-muted small mb-0">Powerful protection for complete family hygiene.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <i class="fa-solid fa-truck-fast display-5 text-teal mb-3" style="color: var(--secondary-color);"></i>
                    <h5 class="fw-700 text-dark font-outfit mb-2">Nationwide Network</h5>
                    <p class="text-muted small mb-0">Serving 500+ dealers with prompt logistics and support.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
