@extends('dashboard.layouts.master')
@section('title', 'Projects')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Projects</h5>
                    <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">
                        <i class="ti ti-plus me-1"></i> Add Project
                    </a>
                </div>
                <div class="card-body">
                    <form method="GET" class="row g-2 mb-3">
                        <div class="col-md-4">
                            <input type="text" name="search" value="{{ $search }}" class="form-control"
                                placeholder="Search by title">
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
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>In Home</th>
                                    <th>Featured</th>
                                    <th>Created</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration + ($projects->currentPage() - 1) * $projects->perPage() }}
                                        </td>
                                        <td>{{ $project->short_title }}</td>
                                        <td>{{ $project->category->name ?? '-' }}</td>
                                        <td>
                                            <span
                                                class="badge bg-label-{{ $project->status === 'active' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($project->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($project->in_home)
                                                <span class="badge bg-label-info">Yes</span>
                                            @else
                                                <span class="badge bg-label-secondary">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($project->is_featured)
                                                <span class="badge bg-label-warning">Yes</span>
                                            @else
                                                <span class="badge bg-label-secondary">No</span>
                                            @endif
                                        </td>
                                        <td>{{ $project->created_at?->format('Y-m-d') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('projects.edit', $project) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-info"><i
                                                    class="ti ti-eye"></i></a>
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this project?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">No projects found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
