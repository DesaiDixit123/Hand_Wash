@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Edit Blog Article</h4>
        <p class="text-muted small mb-0">Modify post contents.</p>
    </div>
    <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Articles</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-4">
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Category <span class="text-danger">*</span></label>
                    <select name="blog_category_id" class="form-select rounded-3 @error('blog_category_id') is-invalid @enderror" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('blog_category_id', $blog->blog_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('blog_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Article Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control rounded-3 @error('title') is-invalid @enderror" value="{{ old('title', $blog->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Author Name</label>
                <input type="text" name="author_name" class="form-control rounded-3" value="{{ old('author_name', $blog->author_name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Article Body Content <span class="text-danger">*</span></label>
                <textarea name="content" class="form-control rounded-3 @error('content') is-invalid @enderror" rows="8" required>{{ old('content', $blog->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Featured Image</label>
                    @if($blog->image_path)
                        <div class="mb-2">
                            <span class="text-muted small d-block mb-1">Current Image:</span>
                            <div style="width: 120px; height: 75px; background: linear-gradient(135deg, #0d9488 0%, #0284c7 100%);" class="rounded"></div>
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control rounded-3">
                    <span class="text-muted small">Leave blank to keep current. Max: 2MB.</span>
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check mb-2">
                        <input type="checkbox" name="status" class="form-check-input" id="statusCheck" {{ $blog->status ? 'checked' : '' }}>
                        <label class="form-check-label text-dark fw-500" for="statusCheck">Published / Visible</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Update Post</button>
        </form>
    </div>
</div>
@endsection
