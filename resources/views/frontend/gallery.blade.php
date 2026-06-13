@extends('layouts.frontend')

@section('content')
<!-- Page Banner Header -->
<section class="section-padding text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, #1e293b 100%); margin-bottom: 50px;">
    <div class="container text-center">
        <h1 class="display-4 font-outfit fw-800 text-white" data-aos="fade-down">Media Gallery</h1>
        <p class="fs-6 text-muted-white mx-auto" style="max-width: 600px; color: #cbd5e1;" data-aos="fade-up">A visual tour of our GIDC chemical plant, laboratories, products, and exhibitions.</p>
    </div>
</section>

<!-- Gallery Section -->
<section class="section-padding bg-white pt-0">
    <div class="container">
        
        <!-- Filter Buttons -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5" data-aos="fade-up">
            <button class="btn btn-premium gallery-filter-btn active" data-filter="all">All Media</button>
            <button class="btn btn-outline-premium gallery-filter-btn" data-filter="product">Products</button>
            <button class="btn btn-outline-premium gallery-filter-btn" data-filter="factory">Manufacturing Unit</button>
            <button class="btn btn-outline-premium gallery-filter-btn" data-filter="team">Team Members</button>
            <button class="btn btn-outline-premium gallery-filter-btn" data-filter="event">Exhibitions & Events</button>
        </div>

        <!-- Gallery Grid -->
        <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
            @forelse($galleryItems as $item)
            <div class="col-lg-4 col-md-6 gallery-item" data-type="{{ $item->type }}" style="transition: all 0.3s ease;">
                <div class="product-card overflow-hidden position-relative group">
                    <a href="{{ $item->image_path }}" data-lightbox data-title="{{ $item->title }}" class="d-block">
                        <div class="position-relative" style="height: 250px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; background-image: linear-gradient(135deg, #0d9488 0%, #0284c7 100%); color: #fff;">
                            <div class="text-center p-3">
                                <i class="fa-solid fa-image display-3 opacity-25 mb-2"></i>
                                <h6 class="fw-700 font-outfit mb-0">{{ $item->title }}</h6>
                                <span class="badge bg-white-50 text-dark small mt-2 text-uppercase">{{ $item->type }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">
                <p>No gallery images found.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

<!-- Lightbox Modal Markup -->
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 bg-transparent text-white">
            <div class="modal-header border-0 bg-transparent p-0 justify-content-end mb-2">
                <button type="button" class="btn-close btn-close-white fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 text-center position-relative">
                <div class="shadow-lg rounded-4 overflow-hidden" style="background: rgba(0,0,0,0.8);">
                    <!-- We show standard fallback colored box if image doesn't exist -->
                    <div style="height: 400px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #0b132b 0%, #0d9488 100%);">
                        <div class="text-center">
                            <i class="fa-solid fa-image display-1 text-white-50 mb-3"></i>
                            <h4 class="lightbox-title font-outfit text-white">Image Preview</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
