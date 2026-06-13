@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">SEO Settings</h4>
        <p class="text-muted small mb-0">Manage page-by-page meta tags for search engines.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Page</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        <th>Keywords</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($settings as $setting)
                    <tr>
                        <td class="fw-bold px-4 text-capitalize">{{ str_replace('-', ' ', $setting->page_name) }}</td>
                        <td class="fw-bold text-dark">{{ Str::limit($setting->meta_title, 40) }}</td>
                        <td class="text-muted">{{ Str::limit($setting->meta_description, 60) }}</td>
                        <td><code style="font-size: 0.8rem;">{{ Str::limit($setting->keywords, 40) }}</code></td>
                        <td class="text-end px-4">
                            <a href="{{ route('seo-settings.edit', $setting->id) }}" class="btn btn-sm btn-outline-premium rounded-pill font-outfit btn-sm px-3">Edit SEO</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
