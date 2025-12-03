@extends('dashboard.layouts.master')
@section('title', 'Create Technology')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Add New Technology / Tool</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('technologies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                                required>
                                <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon / Image</label>
                            <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon"
                                name="icon" accept=".png,.jpg,.jpeg,.svg,.webp" onchange="previewIcon(event)">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-1">Recommended: square image, max 2MB.</small>

                            {{-- Live preview --}}
                            <div class="mt-3" id="icon-preview-wrapper" style="display: none;">
                                <p class="mb-1">Preview:</p>
                                <img id="icon-preview" src="" alt="Icon preview" style="max-width: 80px; max-height: 80px;"
                                    class="border rounded">
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Create Technology</button>
                            <a href="{{ route('technologies.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function previewIcon(event) {
        const file = event.target.files && event.target.files[0] ? event.target.files[0] : null;
        const wrapper = document.getElementById('icon-preview-wrapper');
        const img = document.getElementById('icon-preview');

        if (!file || !wrapper || !img) {
            if (wrapper) wrapper.style.display = 'none';
            if (img) img.src = '';
            return;
        }

        img.src = URL.createObjectURL(file);
        wrapper.style.display = 'block';
    }
</script>
