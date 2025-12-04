@extends('dashboard.layouts.master')
@section('title', 'Edit Service')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Service</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $service->name) }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', $service->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="active" {{ old('status', $service->status) === 'active' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="inactive" {{ old('status', $service->status) === 'inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Icon (optional)</label>
                            <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.svg,.webp">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if ($service->image)
                                <div class="mt-2">
                                    <p class="mb-1">Current Icon:</p>
                                    <img src="{{ $service->image->url }}" alt="{{ $service->name }}"
                                        style="width: 48px; height: 48px; object-fit: cover;" class="rounded border">
                                </div>
                            @endif
                        </div>

                        <button class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
