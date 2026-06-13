@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Edit SEO: <span class="text-capitalize">{{ str_replace('-', ' ', $setting->page_name) }}</span></h4>
        <p class="text-muted small mb-0">Update search engine optimization parameters for this page.</p>
    </div>
    <a href="{{ route('seo-settings.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to SEO</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('seo-settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label text-dark fw-500">Meta Title <span class="text-danger">*</span></label>
                <input type="text" name="meta_title" class="form-control rounded-3 @error('meta_title') is-invalid @enderror" value="{{ old('meta_title', $setting->meta_title) }}" required>
                @error('meta_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Meta Description <span class="text-danger">*</span></label>
                <textarea name="meta_description" class="form-control rounded-3 @error('meta_description') is-invalid @enderror" rows="3" required>{{ old('meta_description', $setting->meta_description) }}</textarea>
                @error('meta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Keywords (Comma separated)</label>
                <input type="text" name="keywords" class="form-control rounded-3" value="{{ old('keywords', $setting->keywords) }}">
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Canonical URL</label>
                <input type="text" name="canonical_url" class="form-control rounded-3" value="{{ old('canonical_url', $setting->canonical_url) }}">
            </div>

            <div class="mb-4">
                <label class="form-label text-dark fw-500">Open Graph Image (OG Image)</label>
                @if($setting->og_image_path)
                    <div class="mb-2">
                        <span class="text-muted small d-block mb-1">Current OG Image:</span>
                        <div style="width: 120px; height: 70px; background: linear-gradient(135deg, #0d9488 0%, #0284c7 100%);" class="rounded"></div>
                    </div>
                @endif
                <input type="file" name="og_image" class="form-control rounded-3">
                <span class="text-muted small">Max: 2MB. Stays on social cards (WhatsApp, Facebook link shares).</span>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Update SEO</button>
        </form>
    </div>
</div>
@endsection
