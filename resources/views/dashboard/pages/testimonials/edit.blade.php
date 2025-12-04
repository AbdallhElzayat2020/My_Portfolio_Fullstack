@extends('dashboard.layouts.master')
@section('title', 'Edit Testimonial')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Client Testimonial</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('testimonials.update', $testimonial) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Client Name <span class="text-danger">*</span></label>
                            <input type="text" name="client_name"
                                value="{{ old('client_name', $testimonial->client_name) }}"
                                class="form-control @error('client_name') is-invalid @enderror">
                            @error('client_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Job / Position</label>
                            <input type="text" name="job" value="{{ old('job', $testimonial->job) }}"
                                class="form-control @error('job') is-invalid @enderror" placeholder="e.g. CEO at Company">
                            @error('job')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Testimonial <span class="text-danger">*</span></label>
                            <textarea name="client_description" rows="4"
                                class="form-control @error('client_description') is-invalid @enderror"
                                placeholder="Client feedback...">{{ old('client_description', $testimonial->client_description) }}</textarea>
                            @error('client_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="active" {{ old('status', $testimonial->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $testimonial->status) === 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Client Image (optional)</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="mt-2">
                                @if ($testimonial->image)
                                    <p class="mb-1">Current Image:</p>
                                    <img src="{{ $testimonial->image->url }}" alt="{{ $testimonial->client_name }}"
                                        style="max-width: 80px; max-height: 80px; object-fit: cover;"
                                        class="border rounded mb-1">
                                @endif
                            </div>

                            <div id="image-preview" class="mt-2" style="display: none;">
                                <p class="mb-1">New Image Preview:</p>
                                <img id="preview-img" src="" alt="Preview"
                                    style="max-width: 80px; max-height: 80px; object-fit: cover;" class="border rounded">
                            </div>
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

@push('js')
    <script>
        document.getElementById('image').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const previewContainer = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');

            if (file && previewContainer && previewImg) {
                const reader = new FileReader();
                reader.onload = function (ev) {
                    previewImg.src = ev.target.result;
                    previewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else if (previewContainer) {
                previewContainer.style.display = 'none';
            }
        });
    </script>
@endpush
