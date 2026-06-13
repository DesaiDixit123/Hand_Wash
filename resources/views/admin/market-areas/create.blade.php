@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Add Location</h4>
        <p class="text-muted small mb-0">Record a new dealer footprint region.</p>
    </div>
    <a href="{{ route('market-areas.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Network</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('market-areas.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label text-dark fw-500">State Name <span class="text-danger">*</span></label>
                <input type="text" name="state" class="form-control rounded-3 @error('state') is-invalid @enderror" placeholder="e.g. Maharashtra" value="{{ old('state') }}" required>
                @error('state')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Key City Hub <span class="text-danger">*</span></label>
                <input type="text" name="city" class="form-control rounded-3 @error('city') is-invalid @enderror" placeholder="e.g. Mumbai, Pune" value="{{ old('city') }}" required>
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label text-dark fw-500">Active Dealers Count <span class="text-danger">*</span></label>
                <input type="number" name="dealer_count" class="form-control rounded-3 @error('dealer_count') is-invalid @enderror" value="{{ old('dealer_count', 0) }}" required>
                @error('dealer_count')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label text-dark fw-500">Details Summary</label>
                <input type="text" name="details" class="form-control rounded-3" placeholder="e.g. Distribution office, 4 warehouses." value="{{ old('details') }}">
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Create Location</button>
        </form>
    </div>
</div>
@endsection
