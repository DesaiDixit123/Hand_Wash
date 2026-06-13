@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Testimonials</h4>
        <p class="text-muted small mb-0">Manage customer reviews and ratings.</p>
    </div>
    <a href="{{ route('testimonials.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add Testimonial</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Client Name</th>
                        <th>Designation</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $t)
                    <tr>
                        <td class="fw-bold px-4">{{ $t->client_name }}</td>
                        <td>{{ $t->designation }}</td>
                        <td class="text-muted">{{ Str::limit($t->review, 60) }}</td>
                        <td class="text-warning">
                            @for($i = 0; $i < $t->rating; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </td>
                        <td class="text-end px-4">
                            <form action="{{ route('testimonials.destroy', $t->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this testimonial?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No testimonials received yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
