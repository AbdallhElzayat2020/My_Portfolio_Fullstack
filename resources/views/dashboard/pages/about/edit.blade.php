@extends('dashboard.layouts.master')
@section('title', 'About Me')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">About Me Content</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('abouts.update', 1) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $about->name ?? 'Abdullah Elzayat') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="intro" class="form-label">Intro Text <span class="text-danger">*</span></label>
                            <textarea id="intro" name="intro" rows="4"
                                class="form-control @error('intro') is-invalid @enderror"
                                required>{{ old('intro', $about->description['intro'] ?? 'A Passionate Fullstack Laravel Developer having 4 years of Experiences. Worked as a sole developer and in small teams, reporting to senior developers and product managers. Worked with people from all around the world and in different time zones, so I\'m confident in my communication skills.') }}</textarea>
                            @error('intro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience Text <span
                                    class="text-danger">*</span></label>
                            <textarea id="experience" name="experience" rows="3"
                                class="form-control @error('experience') is-invalid @enderror"
                                required>{{ old('experience', $about->description['experience'] ?? 'Full-stack web developer with 2 years of Laravel experience, 2 years of React experience, and 5 years of coding experience.') }}</textarea>
                            @error('experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $about->email ?? 'abdallhelzayat194@gmail.com') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="text" id="phone" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone', $about->phone ?? '+201212484233') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="upwork_link" class="form-label">Upwork Link</label>
                                    <input type="url" id="upwork_link" name="upwork_link"
                                        class="form-control @error('upwork_link') is-invalid @enderror"
                                        value="{{ old('upwork_link', $about->upwork_link ?? 'https://www.upwork.com/freelancers/~0118efbb6f6aad23b8') }}">
                                    @error('upwork_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="linkedin_link" class="form-label">LinkedIn Link</label>
                                    <input type="url" id="linkedin_link" name="linkedin_link"
                                        class="form-control @error('linkedin_link') is-invalid @enderror"
                                        value="{{ old('linkedin_link', $about->linkedin_link ?? 'https://www.linkedin.com/in/abdallh-elzayat-924a00259/') }}">
                                    @error('linkedin_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="facebook_link" class="form-label">Facebook Link</label>
                                    <input type="url" id="facebook_link" name="facebook_link"
                                        class="form-control @error('facebook_link') is-invalid @enderror"
                                        value="{{ old('facebook_link', $about->facebook_link ?? 'https://www.facebook.com/abdalla.elzayat.73/') }}">
                                    @error('facebook_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="github_link" class="form-label">GitHub Link</label>
                                    <input type="url" id="github_link" name="github_link"
                                        class="form-control @error('github_link') is-invalid @enderror"
                                        value="{{ old('github_link', $about->github_link ?? 'https://github.com/AbdallhElzayat2020') }}">
                                    @error('github_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="whatsapp_link" class="form-label">WhatsApp Link</label>
                            <input type="url" id="whatsapp_link" name="whatsapp_link"
                                class="form-control @error('whatsapp_link') is-invalid @enderror"
                                value="{{ old('whatsapp_link', $about->whatsapp_link ?? 'https://wa.me/201212484233') }}">
                            @error('whatsapp_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" id="image" name="image"
                                class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp"
                                onchange="previewImage(this)">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="mt-2">
                                @if (!empty($about?->image?->url))
                                    <p class="mb-1">Current Image:</p>
                                    <img id="currentImage" src="{{ $about->image->url }}"
                                        alt="{{ $about->name ?? 'Profile image' }}"
                                        style="max-width: 150px; max-height: 150px; object-fit: cover;" class="border rounded">
                                @else
                                    <p class="mb-1 text-muted">No image uploaded yet</p>
                                    <img id="currentImage" src="" alt="Preview"
                                        style="max-width: 150px; max-height: 150px; object-fit: cover; display: none;"
                                        class="border rounded">
                                @endif
                                <img id="imagePreview" src="" alt="Preview"
                                    style="max-width: 150px; max-height: 150px; object-fit: cover; display: none; margin-top: 10px;"
                                    class="border rounded">
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-device-floppy me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const currentImage = document.getElementById('currentImage');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    if (currentImage) {
                        currentImage.style.display = 'none';
                    }
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
                if (currentImage && currentImage.src) {
                    currentImage.style.display = 'block';
                }
            }
        }
    </script>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            if (typeof $.fn.summernote === 'undefined') {
                console.error('Summernote is not loaded!');
                return;
            }

            $('#intro').summernote({
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
                placeholder: 'Write intro text...',
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

            $('#experience').summernote({
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
                placeholder: 'Write experience text...',
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
        });
    </script>
@endpush
