@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="font-outfit fw-800 text-dark mb-1">User Accounts</h4>
        <p class="text-muted small mb-0">Manage system administrators and editors.</p>
    </div>
    <a href="{{ route('users.create') }}" class="btn btn-premium rounded-pill font-outfit btn-sm">Add User</a>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white col-lg-10">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Name</th>
                        <th>Email Address</th>
                        <th>Assigned Role</th>
                        <th>Created Date</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                    <tr>
                        <td class="fw-bold px-4">{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <span class="badge {{ $u->role->slug == 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                {{ $u->role->name }}
                            </span>
                        </td>
                        <td>{{ $u->created_at->format('M d, Y') }}</td>
                        <td class="text-end px-4">
                            <a href="{{ route('users.edit', $u->id) }}" class="btn btn-sm btn-outline-secondary border-0"><i class="fa-solid fa-pen-to-square"></i></a>
                            @if(auth()->id() !== $u->id)
                            <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this user account?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
