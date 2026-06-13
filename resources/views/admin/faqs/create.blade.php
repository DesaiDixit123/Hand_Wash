@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Add FAQ</h4>
        <p class="text-muted small mb-0">Record a new homepage accordion entry.</p>
    </div>
    <a href="{{ route('faqs.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to FAQs</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('faqs.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label text-dark fw-500">Question <span class="text-danger">*</span></label>
                <input type="text" name="question" class="form-control rounded-3 @error('question') is-invalid @enderror" placeholder="e.g. Do you supply in custom volumes?" value="{{ old('question') }}" required>
                @error('question')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Answer Explanation <span class="text-danger">*</span></label>
                <textarea name="answer" class="form-control rounded-3 @error('answer') is-invalid @enderror" rows="4" placeholder="Detailed explanation answer..." required>{{ old('answer') }}</textarea>
                @error('answer')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label class="form-label text-dark fw-500">Sort Order</label>
                <input type="number" name="sort_order" class="form-control rounded-3" value="{{ old('sort_order', 0) }}">
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Create FAQ</button>
        </form>
    </div>
</div>
@endsection
