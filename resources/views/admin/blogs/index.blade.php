@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Blogs & News Articles</h4>
        <p class="text-muted small mb-0">Manage insights and educational articles.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('blog-categories.index') }}" class="btn btn-outline-premium rounded-pill font-outfit btn-sm">Blog Categories</a>
        <a href="{{ route('blogs.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add Article</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr>
                        <td class="fw-bold px-4">{{ Str::limit($blog->title, 50) }}</td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $blog->category->name }}
                            </span>
                        </td>
                        <td>{{ $blog->author_name }}</td>
                        <td>
                            <span class="badge {{ $blog->status ? 'bg-success' : 'bg-secondary' }}">
                                {{ $blog->status ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ $blog->created_at->format('M d, Y') }}</td>
                        <td class="text-end px-4">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-outline-secondary border-0"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this article?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No blog articles created.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
