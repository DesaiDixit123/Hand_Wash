@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Add Product</h4>
        <p class="text-muted small mb-0">Create a new item in the catalogue.</p>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Catalogue</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-4">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-select rounded-3 @error('category_id') is-invalid @enderror" required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3 @error('name') is-invalid @enderror" placeholder="e.g. SoftShield Premium Hand Wash" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Short Description <span class="text-danger">*</span></label>
                <input type="text" name="short_description" class="form-control rounded-3 @error('short_description') is-invalid @enderror" placeholder="A single sentence highlighting efficacy..." value="{{ old('short_description') }}" required>
                @error('short_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Long Description</label>
                <textarea name="description" class="form-control rounded-3 @error('description') is-invalid @enderror" rows="4" placeholder="Detailed product overview, chemical properties etc...">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Custom dynamic list fields -->
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Specifications (One per line: Key: Value)</label>
                    <textarea name="specifications" class="form-control rounded-3" rows="4" placeholder="pH Level: 5.5 - 6.5&#10;Fragrance: Zesty Lemon&#10;Packaging: 5L Can">{{ old('specifications') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Features (One per line)</label>
                    <textarea name="features" class="form-control rounded-3" rows="4" placeholder="Eliminates 99.9% of germs instantly&#10;Contains Aloe Vera extracts&#10;Rich lathering formula">{{ old('features') }}</textarea>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Benefits (One per line)</label>
                    <textarea name="benefits" class="form-control rounded-3" rows="4" placeholder="Keeps hands soft despite frequent washing&#10;Pleasant lingering aqua aroma&#10;Highly cost-effective in bulk">{{ old('benefits') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Applications (One per line)</label>
                    <textarea name="applications" class="form-control rounded-3" rows="4" placeholder="Residential restrooms and washrooms&#10;Corporate office blocks&#10;Hospitals and clinics">{{ old('applications') }}</textarea>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label text-dark fw-500">Product Primary Image</label>
                    <input type="file" name="image" class="form-control rounded-3">
                </div>
                <div class="col-md-4">
                    <label class="form-label text-dark fw-500">Technical Brochure / MSDS (PDF)</label>
                    <input type="file" name="brochure" class="form-control rounded-3">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <div class="form-check mb-2">
                        <input type="checkbox" name="status" class="form-check-input" id="statusCheck" checked>
                        <label class="form-check-label text-dark fw-500" for="statusCheck">Active / Visible</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Create Product</button>
        </form>
    </div>
</div>
@endsection
