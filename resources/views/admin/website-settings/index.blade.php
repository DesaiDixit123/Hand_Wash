@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Website Settings</h4>
        <p class="text-muted small mb-0">Configure company contact info, address, and social links.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-4">
        <form action="{{ route('website-settings.update') }}" method="POST">
            @csrf
            
            <h5 class="font-outfit fw-800 text-teal mb-4 pb-2 border-bottom" style="color: var(--secondary-color);"><i class="fa-solid fa-building me-2"></i> Company Information</h5>
            
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Company Name</label>
                    <input type="text" name="company_name" class="form-control rounded-3" value="{{ $settings['company_name'] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Corporate Email</label>
                    <input type="email" name="email" class="form-control rounded-3" value="{{ $settings['email'] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Phone Hotline</label>
                    <input type="text" name="phone" class="form-control rounded-3" value="{{ $settings['phone'] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">WhatsApp Hotline</label>
                    <input type="text" name="whatsapp" class="form-control rounded-3" value="{{ $settings['whatsapp'] ?? '' }}">
                </div>
                <div class="col-12">
                    <label class="form-label text-dark fw-500">Corporate Address</label>
                    <textarea name="address" class="form-control rounded-3" rows="2">{{ $settings['address'] ?? '' }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label text-dark fw-500">Google Map Embed iframe URL</label>
                    <textarea name="map_iframe" class="form-control rounded-3" rows="2">{{ $settings['map_iframe'] ?? '' }}</textarea>
                    <span class="text-muted small">Input only the URL inside the src attribute of the Google Maps iframe code.</span>
                </div>
            </div>

            <h5 class="font-outfit fw-800 text-teal mb-4 pb-2 border-bottom" style="color: var(--secondary-color);"><i class="fa-solid fa-share-nodes me-2"></i> Social Media Networks</h5>
            
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Facebook URL</label>
                    <input type="text" name="facebook_url" class="form-control rounded-3" value="{{ $settings['facebook_url'] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Instagram URL</label>
                    <input type="text" name="instagram_url" class="form-control rounded-3" value="{{ $settings['instagram_url'] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">LinkedIn URL</label>
                    <input type="text" name="linkedin_url" class="form-control rounded-3" value="{{ $settings['linkedin_url'] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">YouTube URL</label>
                    <input type="text" name="youtube_url" class="form-control rounded-3" value="{{ $settings['youtube_url'] ?? '' }}">
                </div>
            </div>

            <h5 class="font-outfit fw-800 text-teal mb-4 pb-2 border-bottom" style="color: var(--secondary-color);"><i class="fa-solid fa-info-circle me-2"></i> About Section & Corporate Values</h5>
            
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label text-dark fw-500">About Intro Text</label>
                    <textarea name="about_intro" class="form-control rounded-3" rows="3">{{ $settings['about_intro'] ?? '' }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label text-dark fw-500">Corporate Mission</label>
                    <textarea name="about_mission" class="form-control rounded-3" rows="2">{{ $settings['about_mission'] ?? '' }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label text-dark fw-500">Corporate Vision</label>
                    <textarea name="about_vision" class="form-control rounded-3" rows="2">{{ $settings['about_vision'] ?? '' }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark fw-500">Manufacturing Experience Milestone</label>
                    <input type="text" name="about_experience" class="form-control rounded-3" value="{{ $settings['about_experience'] ?? '' }}">
                </div>
            </div>

            <button type="submit" class="btn btn-premium rounded-pill font-outfit px-4">Save Configuration</button>
        </form>
    </div>
</div>
@endsection
