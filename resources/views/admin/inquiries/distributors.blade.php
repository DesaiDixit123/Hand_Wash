@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Distributor Registrations</h4>
        <p class="text-muted small mb-0">Manage exclusive territory distribution requests.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Firm / Contact</th>
                        <th>Contact Details</th>
                        <th>Experience</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($distributors as $dist)
                    <tr>
                        <td class="px-4">
                            <div class="fw-bold">{{ $dist->company_name }}</div>
                            <span class="text-muted small">Person: {{ $dist->contact_person }}</span>
                        </td>
                        <td>
                            <div><i class="fa-solid fa-phone me-1 text-muted"></i> {{ $dist->mobile }}</div>
                            <div class="small text-muted"><i class="fa-regular fa-envelope me-1"></i> {{ $dist->email }}</div>
                        </td>
                        <td>
                            <p class="mb-0 text-muted small" style="max-width: 250px;">{{ Str::limit($dist->business_experience, 100) }}</p>
                        </td>
                        <td>
                            <p class="mb-0 text-muted small" style="max-width: 200px;">{{ Str::limit($dist->address, 100) }}</p>
                        </td>
                        <td>
                            <span class="badge {{ $dist->status == 'Approved' ? 'bg-success' : ($dist->status == 'Rejected' ? 'bg-danger' : 'bg-warning text-dark') }}">
                                {{ $dist->status }}
                            </span>
                        </td>
                        <td class="text-end px-4">
                            @if($dist->status == 'Pending')
                            <form action="{{ route('inquiries.distributors.status', [$dist->id, 'Approved']) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-success font-outfit rounded-pill px-3 py-1">Approve</button>
                            </form>
                            <form action="{{ route('inquiries.distributors.status', [$dist->id, 'Rejected']) }}" method="POST" class="d-inline ms-1">
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
                        <td colspan="6" class="text-center py-4 text-muted">No distributor requests received.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
