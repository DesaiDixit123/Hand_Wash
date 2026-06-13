@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Dealer Registrations</h4>
        <p class="text-muted small mb-0">Manage retail dealership requests.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Company / Owner</th>
                        <th>Contact Details</th>
                        <th>GST Number</th>
                        <th>State / City</th>
                        <th>Status</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dealers as $dealer)
                    <tr>
                        <td class="px-4">
                            <div class="fw-bold">{{ $dealer->company_name }}</div>
                            <span class="text-muted small">Owner: {{ $dealer->owner_name }}</span>
                        </td>
                        <td>
                            <div><i class="fa-solid fa-phone me-1 text-muted"></i> {{ $dealer->mobile }}</div>
                            <div class="small text-muted"><i class="fa-regular fa-envelope me-1"></i> {{ $dealer->email }}</div>
                        </td>
                        <td><code>{{ $dealer->gst_number ?? 'Not provided' }}</code></td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $dealer->state }}</span>
                            <span class="d-block small text-muted mt-1">{{ $dealer->city }}</span>
                        </td>
                        <td>
                            <span class="badge {{ $dealer->status == 'Approved' ? 'bg-success' : ($dealer->status == 'Rejected' ? 'bg-danger' : 'bg-warning text-dark') }}">
                                {{ $dealer->status }}
                            </span>
                        </td>
                        <td class="text-end px-4">
                            @if($dealer->status == 'Pending')
                            <form action="{{ route('inquiries.dealers.status', [$dealer->id, 'Approved']) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-success font-outfit rounded-pill px-3 py-1">Approve</button>
                            </form>
                            <form action="{{ route('inquiries.dealers.status', [$dealer->id, 'Rejected']) }}" method="POST" class="d-inline ms-1">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger font-outfit rounded-pill px-3 py-1">Reject</button>
                            </form>
                            @else
                            <span class="text-muted small">Processed</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No dealer registration requests received.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
