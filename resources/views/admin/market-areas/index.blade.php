@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">Market Network Locations</h4>
        <p class="text-muted small mb-0">Manage regions, states, cities, and active dealer statistics.</p>
    </div>
    <a href="{{ route('market-areas.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add Location</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">State</th>
                        <th>Key City Hub</th>
                        <th>Dealers Count</th>
                        <th>Details Summary</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($areas as $area)
                    <tr>
                        <td class="fw-bold px-4">{{ $area->state }}</td>
                        <td>{{ $area->city }}</td>
                        <td>
                            <span class="badge bg-teal" style="background-color: var(--secondary-color);">
                                {{ $area->dealer_count }}
                            </span>
                        </td>
                        <td class="text-muted small">{{ Str::limit($area->details, 60) }}</td>
                        <td class="text-end px-4">
                            <form action="{{ route('market-areas.destroy', $area->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this region?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No market network locations added.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
