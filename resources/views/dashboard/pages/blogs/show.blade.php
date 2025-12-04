@extends('dashboard.layouts.master')
@section('title', 'View Blog')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Blog Details</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-warning">
                            <i class="ti ti-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Full Name</label>
                                <h5 class="mb-0">{{ $blog->full_name }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Short Name</label>
                                <p class="mb-0">{{ $blog->short_name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Category</label>
                                <p class="mb-0">
                                    @if ($blog->category)
                                        <span class="badge bg-label-info">{{ $blog->category->name }}</span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Status</label>
                                <div>
                                    @if ($blog->status === 'active')
                                        <span class="badge bg-label-success">Active</span>
                                    @else
                                        <span class="badge bg-label-secondary">Inactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($blog->image)
                        <div class="mb-3">
                            <label class="form-label text-muted">Blog Image</label>
                            <div>
                                <img src="{{ $blog->image->url }}" alt="{{ $blog->full_name }}"
                                    style="max-width: 300px; max-height: 300px; object-fit: cover;" class="border rounded">
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label text-muted">Short Description</label>
                        <div class="border rounded p-3 bg-light">
                            <div>{!! $blog->short_desc !!}</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">Full Description</label>
                        <div class="border rounded p-3 bg-light">
                            <div>{!! $blog->full_desc !!}</div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label text-muted">Slug</label>
                                <p class="mb-0"><code>{{ $blog->slug }}</code></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label text-muted">Created At</label>
                                <p class="mb-0">{{ $blog->created_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label text-muted">Updated At</label>
                                <p class="mb-0">{{ $blog->updated_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection