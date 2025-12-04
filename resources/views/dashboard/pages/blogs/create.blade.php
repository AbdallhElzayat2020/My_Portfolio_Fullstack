@extends('dashboard.layouts.master')
@section('title', 'Create Blog')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Create Blog</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="full_name" value="{{ old('full_name') }}"
                                        class="form-control @error('full_name') is-invalid @enderror">
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Short Name <span class="text-danger">*</span></label>
                                    <input type="text" name="short_name" value="{{ old('short_name') }}"
                                        class="form-control @error('short_name') is-invalid @enderror">
                                    @error('short_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Short Description <span class="text-danger">*</span></label>
                            <textarea id="short_desc" name="short_desc" rows="3"
                                class="form-control @error('short_desc') is-invalid @enderror">{{ old('short_desc') }}</textarea>
                            @error('short_desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Full Description <span class="text-danger">*</span></label>
                            <textarea id="full_desc" name="full_desc"
                                class="form-control @error('full_desc') is-invalid @enderror">{{ old('full_desc') }}</textarea>
                            @error('full_desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Blog Image</label>
                            <input type="file" id="image" name="image"
                                class="form-control @error('image') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div id="image-preview" class="mt-2" style="display: none;">
                                <p class="mb-1">Preview:</p>
                                <img id="preview-img" src="" alt="Preview"
                                    style="max-width: 150px; max-height: 150px; object-fit: cover;"
                                    class="border rounded">
                            </div>
                        </div>

                        <button class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            if (typeof $.fn.summernote === 'undefined') {
                console.error('Summernote is not loaded!');
                return;
            }

            $('#full_desc').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                placeholder: 'Write blog full description...',
                tabsize: 2,
                focus: false,
                dialogsInBody: true,
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                    link: [
                        ['link', ['linkDialogShow', 'unlink']]
                    ],
                    table: [
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ]
                }
            });

            $('#short_desc').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                placeholder: 'Write short description...',
                tabsize: 2,
                focus: false,
                dialogsInBody: true
            });

            $(document).on('click', '.note-btn-group .dropdown-toggle', function (e) {
                e.preventDefault();
                e.stopPropagation();
                var $this = $(this);
                var $group = $this.closest('.note-btn-group');
                var $menu = $group.find('.note-dropdown-menu');

                $('.note-btn-group').not($group).removeClass('open');
                $('.note-dropdown-menu').not($menu).removeClass('open').hide();

                $group.toggleClass('open');
                $menu.toggleClass('open').toggle();
            });

            $(document).on('click', function (e) {
                if (!$(e.target).closest('.note-btn-group').length) {
                    $('.note-btn-group').removeClass('open');
                    $('.note-dropdown-menu').removeClass('open').hide();
                }
            });

            // Image preview
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
        });
    </script>
@endpush
