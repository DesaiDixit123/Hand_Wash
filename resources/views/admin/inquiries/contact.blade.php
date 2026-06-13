@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Contact Inquiries</h4>
        <p class="text-muted small mb-0">General customer inquiries and lead forms.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Sender</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr>
                        <td class="px-4">
                            <div class="fw-bold">{{ $contact->name }}</div>
                            <div class="small text-muted"><i class="fa-solid fa-phone me-1"></i> {{ $contact->mobile }}</div>
                            <div class="small text-muted"><i class="fa-regular fa-envelope me-1"></i> {{ $contact->email }}</div>
                        </td>
                        <td class="fw-bold text-dark">{{ $contact->subject ?? 'No subject' }}</td>
                        <td>
                            <p class="mb-0 text-muted small" style="max-width: 350px;">{{ $contact->message }}</p>
                        </td>
                        <td>
                            <span class="badge {{ $contact->is_read ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $contact->is_read ? 'Read' : 'Unread' }}
                            </span>
                        </td>
                        <td class="text-end px-4">
                            @if(!$contact->is_read)
                            <form action="{{ route('inquiries.contact.read', $contact->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-premium font-outfit rounded-pill px-3 py-1">Mark Read</button>
                            </form>
                            @else
                            <span class="text-muted small">Completed</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No contact inquiries received.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
