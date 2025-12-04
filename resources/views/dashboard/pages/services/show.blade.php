@extends('dashboard.layouts.master')
@section('title', 'Service Details')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Service Details</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3 text-center">
                        @if ($service->image)
                            <img src="{{ $service->image->url }}" alt="{{ $service->name }}"
                                style="width: 64px; height: 64px; object-fit: cover;" class="rounded border">
                        @else
                            <span
                                class="badge bg-label-primary rounded-circle d-inline-flex align-items-center justify-content-center"
                                style="width: 64px; height: 64px; font-size: 24px;">
                                {{ strtoupper(mb_substr($service->name, 0, 1)) }}
                            </span>
                        @endif
                    </div>

                    <dl class="row mb-0">
                        <dt class="col-sm-4">Name</dt>
                        <dd class="col-sm-8">{{ $service->name }}</dd>

                        <dt class="col-sm-4">Slug</dt>
                        <dd class="col-sm-8">{{ $service->slug }}</dd>

                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-8">
                            <span class="badge bg-label-{{ $service->status === 'active' ? 'success' : 'secondary' }}">
                                {{ ucfirst($service->status) }}
                            </span>
                        </dd>

                        <dt class="col-sm-4">Description</dt>
                        <dd class="col-sm-8">
                            {{ $service->description ?? '-' }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
