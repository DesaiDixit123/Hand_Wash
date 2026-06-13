@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Board of Directors</h4>
        <p class="text-muted small mb-0">Manage corporate leadership and research teams.</p>
    </div>
    <a href="{{ route('team-members.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add Team Member</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Member Name</th>
                        <th>Designation</th>
                        <th>LinkedIn URL</th>
                        <th>Sort Order</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $m)
                    <tr>
                        <td class="fw-bold px-4">{{ $m->name }}</td>
                        <td>{{ $m->designation }}</td>
                        <td>
                            @if($m->linkedin_url)
                                <a href="{{ $m->linkedin_url }}" target="_blank" class="badge bg-light text-teal border text-decoration-none" style="color: var(--secondary-color);"><i class="fa-brands fa-linkedin me-1"></i> LinkedIn Profile</a>
                            @else
                                <span class="text-muted small">Not provided</span>
                            @endif
                        </td>
                        <td>{{ $m->sort_order }}</td>
                        <td class="text-end px-4">
                            <form action="{{ route('team-members.destroy', $m->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this team member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No board or team members added yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
