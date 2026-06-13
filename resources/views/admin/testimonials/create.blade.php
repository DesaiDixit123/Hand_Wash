@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Add Testimonial</h4>
        <p class="text-muted small mb-0">Record a new client review.</p>
    </div>
    <a href="{{ route('testimonials.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Testimonials</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label text-dark fw-500">Client Name <span class="text-danger">*</span></label>
                <input type="text" name="client_name" class="form-control rounded-3 @error('client_name') is-invalid @enderror" placeholder="e.g. Rajesh Sharma" value="{{ old('client_name') }}" required>
                @error('client_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Designation / Company</label>
                <input type="text" name="designation" class="form-control rounded-3" placeholder="e.g. Procurement Manager, Hotel Diamond" value="{{ old('designation') }}">
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Review Text <span class="text-danger">*</span></label>
                <textarea name="review" class="form-control rounded-3 @error('review') is-invalid @enderror" rows="4" placeholder="Client review content..." required>{{ old('review') }}</textarea>
                @error('review')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Rating (1 to 5 Stars)</label>
                    <select name="rating" class="form-select rounded-3">
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="2">2 Stars</option>
                        <option value="1">1 Star</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Client Image</label>
                    <input type="file" name="image" class="form-control rounded-3">
                </div>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Create Testimonial</button>
        </form>
    </div>
</div>
@endsection
