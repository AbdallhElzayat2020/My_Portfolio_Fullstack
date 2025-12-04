@extends('dashboard.layouts.master')
@section('title', 'Numbers / Statistics')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Numbers / Statistics</h5>
                    <a href="{{ route('main-steps.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i> Add New
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Experience Year</th>
                                    <th>Complete Project</th>
                                    <th>Happy Client</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($numbers as $number)
                                    <tr>
                                        <td>{{ $number->id }}</td>
                                        <td><strong>{{ $number->experience_year }}</strong></td>
                                        <td><strong>{{ $number->complete_project }}</strong></td>
                                        <td><strong>{{ $number->happy_client }}</strong></td>
                                        <td>{{ $number->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('main-steps.show', $number) }}" class="btn btn-sm btn-info">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('main-steps.edit', $number) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="{{ route('main-steps.destroy', $number) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this?');">
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
                                        <td colspan="6" class="text-center text-muted py-4">
                                            No numbers added yet. <a href="{{ route('main-steps.create') }}">Add one</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($numbers->hasPages())
                        <div class="mt-3">
                            {{ $numbers->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection