@extends('dashboard.layouts.master')
@section('title', 'Technology Details')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Technology Details</h5>
                    <a href="{{ route('technologies.edit', $technology) }}" class="btn btn-sm btn-warning">
                        <i class="ti ti-edit me-1"></i> Edit
                    </a>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3">ID</dt>
                        <dd class="col-sm-9">{{ $technology->id }}</dd>

                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $technology->name }}</dd>

                        <dt class="col-sm-3">Icon</dt>
                        <dd class="col-sm-9">
                            @if ($technology->image)
                                <img src="{{ $technology->image->url }}" alt="{{ $technology->name }}" style="max-width: 60px;">
                            @else
                                <span class="text-muted">No icon uploaded</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">
                            <span
                                class="badge bg-{{ $technology->status === 'active' ? 'success' : 'secondary' }}">{{ ucfirst($technology->status) }}</span>
                        </dd>

                        <dt class="col-sm-3">Created At</dt>
                        <dd class="col-sm-9">{{ $technology->created_at?->format('Y-m-d H:i') ?? '-' }}</dd>

                        <dt class="col-sm-3">Updated At</dt>
                        <dd class="col-sm-9">{{ $technology->updated_at?->format('Y-m-d H:i') ?? '-' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
