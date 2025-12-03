@extends('dashboard.layouts.master')
@section('title', 'Technologies')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Technologies / Tools</h5>
                    <a href="{{ route('technologies.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i> Add New Technology
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tools as $technology)
                                    <tr>
                                        <td>{{ $technology->id }}</td>
                                        <td>
                                            @if ($technology->image)
                                                <img src="{{ $technology->image->url }}" alt="{{ $technology->name }}"
                                                    style="width:32px;height:32px;object-fit:contain;">
                                            @else
                                                <span
                                                    class="badge bg-label-primary rounded-circle d-inline-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px; font-size: 14px;">
                                                    {{ strtoupper(mb_substr($technology->name, 0, 1)) }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $technology->name }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $technology->status === 'active' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($technology->status) }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('technologies.show', $technology) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('technologies.edit', $technology) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="{{ route('technologies.destroy', $technology) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this technology?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No technologies found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $tools->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
