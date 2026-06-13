@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Products Range</h4>
        <p class="text-muted small mb-0">Manage items in the product catalogue.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('product-galleries.index') }}" class="btn btn-outline-premium rounded-pill font-outfit btn-sm">Manage Product Gallery</a>
        <a href="{{ route('products.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add Product</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Product Name</th>
                        <th>Category</th>
                        <th>Short Description</th>
                        <th>Status</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="fw-bold px-4">{{ $product->name }}</td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $product->category->name }}
                            </span>
                        </td>
                        <td class="text-muted">{{ Str::limit($product->short_description, 60) }}</td>
                        <td>
                            <span class="badge {{ $product->status ? 'bg-success' : 'bg-secondary' }}">
                                {{ $product->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="text-end px-4">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-secondary border-0"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No products configured in the catalogue.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
