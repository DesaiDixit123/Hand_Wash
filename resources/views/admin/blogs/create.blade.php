@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Add Blog Article</h4>
        <p class="text-muted small mb-0">Create a new post in hygiene insights.</p>
    </div>
    <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Articles</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-4">
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Category <span class="text-danger">*</span></label>
                    <select name="blog_category_id" class="form-select rounded-3 @error('blog_category_id') is-invalid @enderror" required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('blog_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Article Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control rounded-3 @error('title') is-invalid @enderror" placeholder="e.g. Hand Wash Efficacy Standards" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Author Name</label>
                <input type="text" name="author_name" class="form-control rounded-3" placeholder="e.g. Dr. Amit Trivedi (Head Scientist)" value="{{ old('author_name', 'Admin') }}">
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Article Body Content <span class="text-danger">*</span></label>
                <textarea name="content" class="form-control rounded-3 @error('content') is-invalid @enderror" rows="8" placeholder="Write the main blog article text here (supports HTML markup)..." required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Featured Image</label>
                    <input type="file" name="image" class="form-control rounded-3">
                    <span class="text-muted small">Max: 2MB. Recommended: 800x500px.</span>
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check mb-2">
                        <input type="checkbox" name="status" class="form-check-input" id="statusCheck" checked>
                        <label class="form-check-label text-dark fw-500" for="statusCheck">Publish Immediately</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Create Post</button>
        </form>
    </div>
</div>
@endsection
