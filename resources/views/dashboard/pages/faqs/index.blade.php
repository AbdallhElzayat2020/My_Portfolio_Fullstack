@extends('dashboard.layouts.master')
@section('title', 'FAQs')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Frequently Asked Questions</h5>
                    <a href="{{ route('faqs.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i> Add New FAQ
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
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faqs as $faq)
                                    <tr>
                                        <td>{{ $faq->id }}</td>
                                        <td>
                                            <strong>{{ Str::limit($faq->question, 50) }}</strong>
                                        </td>
                                        <td>{{ Str::limit($faq->answer, 80) }}</td>
                                        <td>
                                            <span class="badge bg-label-info">{{ $faq->order }}</span>
                                        </td>
                                        <td>
                                            @if ($faq->status === 'active')
                                                <span class="badge bg-label-success">Active</span>
                                            @else
                                                <span class="badge bg-label-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $faq->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('faqs.show', $faq) }}" class="btn btn-sm btn-info">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-sm btn-warning">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="{{ route('faqs.destroy', $faq) }}" method="POST" class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
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
                                        <td colspan="7" class="text-center text-muted py-4">
                                            No FAQs added yet. <a href="{{ route('faqs.create') }}">Add one</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($faqs->hasPages())
                        <div class="mt-3">
                            {{ $faqs->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection