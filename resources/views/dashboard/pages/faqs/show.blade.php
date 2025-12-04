@extends('dashboard.layouts.master')
@section('title', 'View FAQ')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">FAQ Details</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-warning">
                            <i class="ti ti-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('faqs.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label text-muted">Question</label>
                        <h5 class="mb-0">{{ $faq->question }}</h5>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">Answer</label>
                        <p class="mb-0">{{ $faq->answer }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label text-muted">Status</label>
                                <div>
                                    @if ($faq->status === 'active')
                                        <span class="badge bg-label-success">Active</span>
                                    @else
                                        <span class="badge bg-label-secondary">Inactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label text-muted">Order</label>
                                <p class="mb-0"><span class="badge bg-label-info">{{ $faq->order }}</span></p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Created At</label>
                                <p class="mb-0">{{ $faq->created_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Updated At</label>
                                <p class="mb-0">{{ $faq->updated_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection