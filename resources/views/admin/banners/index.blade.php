@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Hero Banners</h4>
        <p class="text-muted small mb-0">Manage homepage slideshow slides.</p>
    </div>
    <a href="{{ route('banners.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add Banner</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Slide</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($banners as $banner)
                    <tr>
                        <td class="px-4">
                            <div class="rounded overflow-hidden" style="width: 80px; height: 50px; background: linear-gradient(135deg, #0d9488 0%, #0284c7 100%);">
                                <!-- Background box fallback -->
                            </div>
                        </td>
                        <td class="fw-bold">{{ $banner->title }}</td>
                        <td class="text-muted">{{ Str::limit($banner->subtitle, 50) }}</td>
                        <td>{{ $banner->sort_order }}</td>
                        <td>
                            <span class="badge {{ $banner->status ? 'bg-success' : 'bg-secondary' }}">
                                {{ $banner->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="text-end px-4">
                            <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-sm btn-outline-secondary border-0"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this banner slide?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No banner slides configured.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
