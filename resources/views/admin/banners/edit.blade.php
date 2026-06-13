@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Edit Hero Banner</h4>
        <p class="text-muted small mb-0">Update slide details.</p>
    </div>
    <a href="{{ route('banners.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Banners</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label text-dark fw-500">Banner Image</label>
                <div class="mb-2">
                    <span class="text-muted small d-block mb-1">Current image:</span>
                    <div style="width: 150px; height: 80px; background: linear-gradient(135deg, #0d9488 0%, #0284c7 100%);" class="rounded"></div>
                </div>
                <input type="file" name="image" class="form-control rounded-3 @error('image') is-invalid @enderror">
                <span class="text-muted small">Leave blank to keep current image. Recommended size: 1920x800px.</span>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Slide Main Title</label>
                <input type="text" name="title" class="form-control rounded-3" value="{{ old('title', $banner->title) }}">
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Slide Subtitle</label>
                <input type="text" name="subtitle" class="form-control rounded-3" value="{{ old('subtitle', $banner->subtitle) }}">
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Button Text</label>
                    <input type="text" name="button_text" class="form-control rounded-3" value="{{ old('button_text', $banner->button_text) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Button Link</label>
                    <input type="text" name="button_link" class="form-control rounded-3" value="{{ old('button_link', $banner->button_link) }}">
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control rounded-3" value="{{ old('sort_order', $banner->sort_order) }}">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check mb-2">
                        <input type="checkbox" name="status" class="form-check-input" id="statusCheck" {{ $banner->status ? 'checked' : '' }}>
                        <label class="form-check-label text-dark fw-500" for="statusCheck">Active / Visible</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Update Slide</button>
        </form>
    </div>
</div>
@endsection
