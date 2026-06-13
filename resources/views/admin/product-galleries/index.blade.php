@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Product Gallery Images</h4>
        <p class="text-muted small mb-0">Manage secondary product showcase images.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Catalogue</a>
        <a href="{{ route('product-galleries.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add Gallery Images</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Product</th>
                        <th>Preview</th>
                        <th>Type</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($images as $img)
                    <tr>
                        <td class="fw-bold px-4">{{ $img->product->name }}</td>
                        <td>
                            <div class="rounded overflow-hidden" style="width: 80px; height: 50px; background: linear-gradient(135deg, #0d9488 0%, #0284c7 100%);"></div>
                        </td>
                        <td>
                            <span class="badge {{ $img->is_primary ? 'bg-primary' : 'bg-secondary' }}">
                                {{ $img->is_primary ? 'Primary Image' : 'Gallery Image' }}
                            </span>
                        </td>
                        <td class="text-end px-4">
                            @if(!$img->is_primary)
                            <form action="{{ route('product-galleries.destroy', $img->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this image?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                            @else
                            <span class="text-muted small">Cannot delete primary image here. Edit product details instead.</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">No product gallery images configured.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
