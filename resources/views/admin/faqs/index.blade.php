@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">FAQs Accordions</h4>
        <p class="text-muted small mb-0">Manage frequently asked questions on the homepage.</p>
    </div>
    <a href="{{ route('faqs.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add FAQ</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Question</th>
                        <th>Answer</th>
                        <th>Order</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faqs as $faq)
                    <tr>
                        <td class="fw-bold px-4">{{ Str::limit($faq->question, 50) }}</td>
                        <td class="text-muted">{{ Str::limit($faq->answer, 80) }}</td>
                        <td>{{ $faq->sort_order }}</td>
                        <td class="text-end px-4">
                            <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this FAQ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">No FAQs created yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
