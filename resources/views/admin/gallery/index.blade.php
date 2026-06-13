@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Media Gallery</h4>
        <p class="text-muted small mb-0">Manage factory, product, and event photos.</p>
    </div>
    <a href="{{ route('gallery.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add Gallery Item</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Title</th>
                        <th>Preview</th>
                        <th>Type Tag</th>
                        <th>Added Date</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr>
                        <td class="fw-bold px-4">{{ $item->title ?? 'Untitled' }}</td>
                        <td>
                            <div class="rounded overflow-hidden" style="width: 80px; height: 50px; background: linear-gradient(135deg, #0d9488 0%, #0284c7 100%);"></div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border text-uppercase">
                                {{ $item->type }}
                            </span>
                        </td>
                        <td>{{ $item->created_at->format('M d, Y') }}</td>
                        <td class="text-end px-4">
                            <form action="{{ route('gallery.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this image?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No media gallery photos added yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
