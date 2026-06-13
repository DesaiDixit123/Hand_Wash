@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Upload Gallery Images</h4>
        <p class="text-muted small mb-0">Add secondary showcase images to a product.</p>
    </div>
    <a href="{{ route('product-galleries.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Gallery</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label text-dark fw-500">Associate Product <span class="text-danger">*</span></label>
                <select name="product_id" class="form-select rounded-3 @error('product_id') is-invalid @enderror" required>
                    <option value="">Select a Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label text-dark fw-500">Select Images <span class="text-danger">*</span></label>
                <input type="file" name="images[]" class="form-control rounded-3 @error('images') is-invalid @enderror" multiple required>
                <span class="text-muted small">You can select multiple image files. Recommended: 800x600px. Max: 2MB per file.</span>
                @error('images')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Upload Images</button>
        </form>
    </div>
</div>
@endsection
