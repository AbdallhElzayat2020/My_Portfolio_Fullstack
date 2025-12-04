@extends('dashboard.layouts.master')
@section('title', 'Create Numbers')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Create Numbers / Statistics</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('main-steps.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Experience Year <span class="text-danger">*</span></label>
                                    <input type="text" name="experience_year" value="{{ old('experience_year') }}"
                                        class="form-control @error('experience_year') is-invalid @enderror"
                                        placeholder="e.g. 4+">
                                    <small class="text-muted">Years of experience (e.g., "4+", "5+")</small>
                                    @error('experience_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Complete Project <span class="text-danger">*</span></label>
                                    <input type="text" name="complete_project" value="{{ old('complete_project') }}"
                                        class="form-control @error('complete_project') is-invalid @enderror"
                                        placeholder="e.g. 86+">
                                    <small class="text-muted">Number of completed projects (e.g., "86+", "100+")</small>
                                    @error('complete_project')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Happy Client <span class="text-danger">*</span></label>
                                    <input type="text" name="happy_client" value="{{ old('happy_client') }}"
                                        class="form-control @error('happy_client') is-invalid @enderror"
                                        placeholder="e.g. 72+">
                                    <small class="text-muted">Number of happy clients (e.g., "72+", "90+")</small>
                                    @error('happy_client')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Save
                        </button>
                        <a href="{{ route('main-steps.index') }}" class="btn btn-secondary">
                            <i class="ti ti-x me-1"></i> Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection