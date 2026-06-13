@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Blog Categories</h4>
        <p class="text-muted small mb-0">Manage sorting categories for news articles.</p>
    </div>
    <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill font-outfit">Back to Articles</a>
</div>

<div class="row g-4">
    <!-- List Table (Left) -->
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-4 bg-white">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4">Category Name</th>
                                <th>Slug</th>
                                <th>Articles Count</th>
                                <th class="text-end px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td class="fw-bold px-4">{{ $category->name }}</td>
                                <td><code>{{ $category->slug }}</code></td>
                                <td>{{ $category->blogs()->count() }}</td>
                                <td class="text-end px-4">
                                    <form action="{{ route('blog-categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this blog category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No blog categories configured.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Card (Right) -->
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
            <h5 class="font-outfit fw-800 text-dark mb-3">Add Category</h5>
            
            <form action="{{ route('blog-categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-dark fw-500">Category Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3" placeholder="e.g. Health & Safety" required>
                </div>
                <button type="submit" class="btn btn-premium w-100 rounded-pill font-outfit">Create Category</button>
            </form>
        </div>
    </div>
</div>
@endsection
