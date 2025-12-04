@extends('dashboard.layouts.master')
@section('title', 'Services')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Services</h5>
                    <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm">
                        <i class="ti ti-plus me-1"></i> Add Service
                    </a>
                </div>
                <div class="card-body">
                    <form method="GET" class="row g-2 mb-3">
                        <div class="col-md-4">
                            <input type="text" name="search" value="{{ $search }}" class="form-control"
                                placeholder="Search by name">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-secondary w-100">Search</button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr>
                                        <td>{{ $loop->iteration + ($services->currentPage() - 1) * $services->perPage() }}</td>
                                        <td>
                                            @if ($service->image)
                                                <img src="{{ $service->image->url }}" alt="{{ $service->name }}"
                                                    style="width: 32px; height: 32px; object-fit: cover;" class="rounded border">
                                            @else
                                                <span
                                                    class="badge bg-label-primary rounded-circle d-inline-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px;">
                                                    {{ strtoupper(mb_substr($service->name, 0, 1)) }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $service->name }}</td>
                                        <td>
                                            <span
                                                class="badge bg-label-{{ $service->status === 'active' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($service->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $service->created_at?->format('Y-m-d') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('services.edit', $service) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('services.destroy', $service) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this service?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No services found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
