@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Add Gallery Item</h4>
        <p class="text-muted small mb-0">Record a new media gallery photo.</p>
    </div>
    <a href="{{ route('gallery.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Gallery</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label text-dark fw-500">Image File <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control rounded-3 @error('image') is-invalid @enderror" required>
                <span class="text-muted small">Max: 2MB. Recommended: 800x600px.</span>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Photo Title</label>
                <input type="text" name="title" class="form-control rounded-3" placeholder="e.g. Blending Chamber Unit 3" value="{{ old('title') }}">
            </div>

            <div class="mb-4">
                <label class="form-label text-dark fw-500">Photo Type Tag <span class="text-danger">*</span></label>
                <select name="type" class="form-select rounded-3" required>
                    <option value="product">Products</option>
                    <option value="factory">Manufacturing Unit</option>
                    <option value="team">Team Members</option>
                    <option value="event">Exhibitions & Events</option>
                </select>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Save Photo</button>
        </form>
    </div>
</div>
@endsection
