@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Product Categories</h4>
        <p class="text-muted small mb-0">Manage catalog categories.</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add Category</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Name</th>
                        <th>Slug</th>
                        <th>Short Description</th>
                        <th>Products Count</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td class="fw-bold px-4">{{ $category->name }}</td>
                        <td><code>{{ $category->slug }}</code></td>
                        <td class="text-muted">{{ Str::limit($category->short_description, 60) }}</td>
                        <td>
                            <span class="badge bg-teal" style="background-color: var(--secondary-color);">
                                {{ $category->products()->count() }}
                            </span>
                        </td>
                        <td class="text-end px-4">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-secondary border-0"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category? This will delete all products under it.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No product categories created.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
