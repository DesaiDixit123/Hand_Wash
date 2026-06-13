@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Add Team Member</h4>
        <p class="text-muted small mb-0">Record a new scientific board member.</p>
    </div>
    <a href="{{ route('team-members.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Team</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('team-members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label text-dark fw-500">Member Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control rounded-3 @error('name') is-invalid @enderror" placeholder="e.g. Suresh V. Desai" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Designation / Role <span class="text-danger">*</span></label>
                <input type="text" name="designation" class="form-control rounded-3 @error('designation') is-invalid @enderror" placeholder="e.g. Founder & Managing Director" value="{{ old('designation') }}" required>
                @error('designation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Short Bio</label>
                <textarea name="bio" class="form-control rounded-3" rows="3" placeholder="Brief summary of professional experience...">{{ old('bio') }}</textarea>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">LinkedIn Profile URL</label>
                    <input type="text" name="linkedin_url" class="form-control rounded-3" placeholder="e.g. https://linkedin.com/in/suresh-desai" value="{{ old('linkedin_url') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control rounded-3" value="{{ old('sort_order', 0) }}">
                </div>
                <div class="col-12">
                    <label class="form-label text-dark fw-500">Photo Image</label>
                    <input type="file" name="image" class="form-control rounded-3">
                </div>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Create Member</button>
        </form>
    </div>
</div>
@endsection
