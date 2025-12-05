@extends('dashboard.layouts.master')
@section('title', 'Available For Hire')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Available For Hire Status</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('available-for-hire.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="status" value="0">
                                        <input type="checkbox" name="status" value="1"
                                            class="form-check-input @error('status') is-invalid @enderror" id="statusSwitch"
                                            {{ old('status', $availableForHire->status ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="statusSwitch">
                                            <span id="statusText">
                                                {{ old('status', $availableForHire->status ?? false) ? 'Available For Hire' : 'Not Available For Hire' }}
                                            </span>
                                        </label>
                                    </div>
                                    <small class="text-muted d-block mt-2">
                                        Toggle this switch to change your availability status. When enabled, visitors will
                                        see that you are available for hire.
                                    </small>
                                    @error('status')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Update Status
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const statusSwitch = document.getElementById('statusSwitch');
            const statusText = document.getElementById('statusText');

            statusSwitch.addEventListener('change', function () {
                if (this.checked) {
                    statusText.textContent = 'Available For Hire';
                } else {
                    statusText.textContent = 'Not Available For Hire';
                }
            });
        });
    </script>
@endsection
