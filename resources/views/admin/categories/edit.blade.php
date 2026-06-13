@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Edit Category</h4>
        <p class="text-muted small mb-0">Update category details.</p>
    </div>
    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Categories</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label text-dark fw-500">Category Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control rounded-3 @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Short Description</label>
                <textarea name="short_description" class="form-control rounded-3 @error('short_description') is-invalid @enderror" rows="3">{{ old('short_description', $category->short_description) }}</textarea>
                @error('short_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label text-dark fw-500">Category Image</label>
                @if($category->image_path)
                    <div class="mb-2">
                        <span class="text-muted small d-block mb-1">Current image:</span>
                        <div style="width: 100px; height: 70px; background: linear-gradient(135deg, #0d9488 0%, #0284c7 100%);" class="rounded"></div>
                    </div>
                @endif
                <input type="file" name="image" class="form-control rounded-3 @error('image') is-invalid @enderror">
                <span class="text-muted small">Leave blank to keep current. Recommended: 600x400px. Max: 2MB.</span>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Update Category</button>
        </form>
    </div>
</div>
@endsection
