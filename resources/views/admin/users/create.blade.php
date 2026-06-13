@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Add User Account</h4>
        <p class="text-muted small mb-0">Create administrative credentials.</p>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Users</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label text-dark fw-500">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control rounded-3 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Full Name" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Email Address <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="corporate@sreechemicals.com" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-500">Access Role <span class="text-danger">*</span></label>
                <select name="role_id" class="form-select rounded-3 @error('role_id') is-invalid @enderror" required>
                    <option value="">Select a Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }} ({{ $role->slug }})</option>
                    @endforeach
                </select>
                @error('role_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control rounded-3 @error('password') is-invalid @enderror" placeholder="••••••••" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" class="form-control rounded-3" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Create Account</button>
        </form>
    </div>
</div>
@endsection
