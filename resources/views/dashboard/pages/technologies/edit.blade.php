@extends('dashboard.layouts.master')
@section('title', 'Edit Technology')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Technology / Tool</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('technologies.update', $technology) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $technology->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                                required>
                                <option value="active" {{ old('status', $technology->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $technology->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon / Image</label>
                            <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon"
                                name="icon" accept=".png,.jpg,.jpeg,.svg,.webp">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if ($technology->image)
                                <div class="mt-2">
                                    <p class="mb-1">Current Icon:</p>
                                    <img src="{{ $technology->image->url }}" alt="{{ $technology->name }}"
                                        style="max-width: 60px;">
                                </div>
                            @endif
                            <small class="text-muted d-block mt-1">Uploading a new file will replace the current
                                icon.</small>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update Technology</button>
                            <a href="{{ route('technologies.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
