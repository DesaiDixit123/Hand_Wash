@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Edit Product</h4>
        <p class="text-muted small mb-0">Update item details.</p>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Catalogue</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-4">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-select rounded-3 @error('category_id') is-invalid @enderror" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3 @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Short Description <span class="text-danger">*</span></label>
                <input type="text" name="short_description" class="form-control rounded-3 @error('short_description') is-invalid @enderror" value="{{ old('short_description', $product->short_description) }}" required>
                @error('short_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Long Description</label>
                <textarea name="description" class="form-control rounded-3 @error('description') is-invalid @enderror" rows="4">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Custom dynamic list fields -->
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Specifications (One per line: Key: Value)</label>
                    <textarea name="specifications" class="form-control rounded-3" rows="4" placeholder="pH Level: 5.5 - 6.5&#10;Fragrance: Zesty Lemon">{{ old('specifications', $specsText) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Features (One per line)</label>
                    <textarea name="features" class="form-control rounded-3" rows="4" placeholder="Eliminates 99.9% of germs instantly">{{ old('features', $featuresText) }}</textarea>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Benefits (One per line)</label>
                    <textarea name="benefits" class="form-control rounded-3" rows="4" placeholder="Keeps hands soft despite frequent washing">{{ old('benefits', $benefitsText) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Applications (One per line)</label>
                    <textarea name="applications" class="form-control rounded-3" rows="4" placeholder="Residential restrooms and washrooms">{{ old('applications', $appsText) }}</textarea>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label text-dark fw-500">Product Primary Image</label>
                    @if($product->primaryImage)
                        <div class="mb-2">
                            <span class="text-muted small d-block mb-1">Current Image:</span>
                            <div style="width: 100px; height: 70px; background: linear-gradient(135deg, #0d9488 0%, #0284c7 100%);" class="rounded"></div>
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control rounded-3">
                    <span class="text-muted small">Leave blank to keep current.</span>
                </div>
                <div class="col-md-4">
                    <label class="form-label text-dark fw-500">Technical Brochure / MSDS (PDF)</label>
                    @if($product->brochure_path)
                        <div class="mb-2">
                            <span class="text-muted small d-block mb-1">Current File:</span>
                            <a href="{{ $product->brochure_path }}" target="_blank" class="badge bg-light text-danger border"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                        </div>
                    @endif
                    <input type="file" name="brochure" class="form-control rounded-3">
                    <span class="text-muted small">Leave blank to keep current.</span>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <div class="form-check mb-2">
                        <input type="checkbox" name="status" class="form-check-input" id="statusCheck" {{ $product->status ? 'checked' : '' }}>
                        <label class="form-check-label text-dark fw-500" for="statusCheck">Active / Visible</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Update Product</button>
        </form>
    </div>
</div>
@endsection
