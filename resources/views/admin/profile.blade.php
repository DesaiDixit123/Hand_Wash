@extends('layouts.admin')

@section('content')
<div class="container-fluid" data-aos="fade-up">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="font-outfit fw-800 text-dark mb-1">My Account Profile</h2>
            <p class="text-muted mb-0">Manage your password, credentials, and personal profile information.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-premium rounded-pill px-4"><i class="fa-solid fa-arrow-left me-2"></i> Dashboard</a>
    </div>

    <!-- Form row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-4 rounded-4 bg-white">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label text-dark fw-600">Full Name</label>
                        <input type="text" name="name" class="form-control rounded-3 py-2 @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-600">Email Address</label>
                        <input type="email" name="email" class="form-control rounded-3 py-2 @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-600">Current Role</label>
                        <input type="text" class="form-control rounded-3 py-2 bg-light text-muted" value="{{ $user->role->name ?? 'User' }}" disabled>
                        <small class="text-muted">Account role permissions cannot be edited from this screen.</small>
                    </div>

                    <hr class="my-4" style="border-top: 1px solid rgba(0,0,0,0.08);">
                    <h5 class="font-outfit fw-800 text-dark mb-3">Change Password</h5>
                    <p class="text-muted small">Leave password fields blank if you do not wish to modify your current login password.</p>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-600">New Password</label>
                        <input type="password" name="password" class="form-control rounded-3 py-2 @error('password') is-invalid @enderror" placeholder="Enter new password (min. 8 characters)">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-dark fw-600">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control rounded-3 py-2" placeholder="Confirm new password">
                    </div>

                    <button type="submit" class="btn btn-premium rounded-pill w-100 py-2" style="height: 50px;">Save Profile Changes</button>
                </form>
            </div>
        </div>

        <!-- Info side card -->
        <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="card border-0 shadow-sm p-4 rounded-4 text-white h-100 d-flex flex-column justify-content-between" style="background: linear-gradient(135deg, var(--primary-slate-900) 0%, var(--primary-slate-800) 100%);">
                <div>
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="bg-primary bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background-color: rgba(0,180,216,0.15);">
                            <i class="fa-regular fa-user-circle fs-2 text-teal" style="color: var(--secondary-blue-500);"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 font-outfit fw-800">{{ $user->name }}</h5>
                            <span class="text-white-50 small">{{ $user->role->name ?? 'User Account' }}</span>
                        </div>
                    </div>

                    <p class="mb-4" style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.6;">You are currently logged into the Sree Chemicals management portal. Keep your login credentials confidential. We recommend changing your password periodically to ensure system safety and data protection.</p>

                    <div class="d-flex flex-column gap-2 text-white-50 small">
                        <div><i class="fa-regular fa-envelope me-2"></i> {{ $user->email }}</div>
                        <div><i class="fa-solid fa-clock-rotate-left me-2"></i> Account Created: {{ $user->created_at->format('M d, Y H:i A') }}</div>
                    </div>
                </div>

                <div class="border-top border-secondary border-opacity-25 pt-3 mt-4 text-center">
                    <span class="text-white-50 small">Management Panel Profile v1.0</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
