@extends('dashboard.layouts.master')
@section('title', 'Edit Brand')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Brand</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('brands.update', $brand) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Brand Name <span class="text-danger">*</span></label>
                            <input type="text" name="brand_name" value="{{ old('brand_name', $brand->brand_name) }}"
                                class="form-control @error('brand_name') is-invalid @enderror">
                            @error('brand_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alt Text</label>
                            <input type="text" name="alt_text" value="{{ old('alt_text', $brand->alt_text) }}"
                                class="form-control @error('alt_text') is-invalid @enderror"
                                placeholder="Accessible text for logo">
                            @error('alt_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="active" {{ old('status', $brand->status) === 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive" {{ old('status', $brand->status) === 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Logo Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp,.svg">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="mt-2">
                                @if ($brand->image)
                                    <p class="mb-1">Current Logo:</p>
                                    <img src="{{ $brand->image->url }}" alt="{{ $brand->alt_text ?: $brand->brand_name }}"
                                        style="max-width: 100px; max-height: 60px; object-fit: contain;"
                                        class="border rounded bg-white mb-1">
                                @endif
                            </div>

                            <div id="image-preview" class="mt-2" style="display: none;">
                                <p class="mb-1">New Logo Preview:</p>
                                <img id="preview-img" src="" alt="Preview"
                                    style="max-width: 100px; max-height: 60px; object-fit: contain;"
                                    class="border rounded bg-white">
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