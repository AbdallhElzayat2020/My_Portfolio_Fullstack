@extends('dashboard.layouts.master')
@section('title', 'Testimonial Details')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Testimonial Details</h5>
                    <a href="{{ route('testimonials.index') }}" class="btn btn-sm btn-secondary">
                        <i class="ti ti-arrow-left me-1"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Client Name</dt>
                        <dd class="col-sm-9">{{ $testimonial->client_name }}</dd>

                        <dt class="col-sm-3">Job / Position</dt>
                        <dd class="col-sm-9">{{ $testimonial->job ?: '-' }}</dd>

                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">
                            <span class="badge bg-label-{{ $testimonial->status === 'active' ? 'success' : 'secondary' }}">
                                {{ ucfirst($testimonial->status) }}
                            </span>
                        </dd>

                        <dt class="col-sm-3">Testimonial</dt>
                        <dd class="col-sm-9">
                            {{ $testimonial->client_description }}
                        </dd>

                        <dt class="col-sm-3">Image</dt>
                        <dd class="col-sm-9">
                            @if ($testimonial->image)
                                <img src="{{ $testimonial->image->url }}" alt="{{ $testimonial->client_name }}"
                                    style="max-width: 80px; max-height: 80px; object-fit: cover;" class="border rounded">
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection