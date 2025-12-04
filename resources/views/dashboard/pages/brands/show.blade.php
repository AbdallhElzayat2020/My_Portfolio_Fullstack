@extends('dashboard.layouts.master')
@section('title', 'Brand Details')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Brand Details</h5>
                    <a href="{{ route('brands.index') }}" class="btn btn-sm btn-secondary">
                        <i class="ti ti-arrow-left me-1"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $brand->brand_name }}</dd>

                        <dt class="col-sm-3">Alt Text</dt>
                        <dd class="col-sm-9">{{ $brand->alt_text ?: '-' }}</dd>

                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">
                            <span class="badge bg-label-{{ $brand->status === 'active' ? 'success' : 'secondary' }}">
                                {{ ucfirst($brand->status) }}
                            </span>
                        </dd>

                        <dt class="col-sm-3">Logo</dt>
                        <dd class="col-sm-9">
                            @if ($brand->image)
                                <img src="{{ $brand->image->url }}" alt="{{ $brand->alt_text ?: $brand->brand_name }}"
                                    style="max-width: 120px; max-height: 70px; object-fit: contain;"
                                    class="border rounded bg-white">
                            @else
                                <span class="text-muted">No logo uploaded</span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection