@extends('dashboard.layouts.master')
@section('title', 'Edit FAQ')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit FAQ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('faqs.update', $faq) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Question <span class="text-danger">*</span></label>
                            <input type="text" name="question" value="{{ old('question', $faq->question) }}"
                                class="form-control @error('question') is-invalid @enderror"
                                placeholder="e.g. What does a product designer need to know?">
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Answer <span class="text-danger">*</span></label>
                            <textarea name="answer" rows="5"
                                class="form-control @error('answer') is-invalid @enderror"
                                placeholder="Enter the answer to the question...">{{ old('answer', $faq->answer) }}</textarea>
                            @error('answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="active"
                                            {{ old('status', $faq->status) === 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive"
                                            {{ old('status', $faq->status) === 'inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Order</label>
                                    <input type="number" name="order" value="{{ old('order', $faq->order) }}"
                                        class="form-control @error('order') is-invalid @enderror" min="0"
                                        placeholder="0">
                                    <small class="text-muted">Lower numbers appear first</small>
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Update
                        </button>
                        <a href="{{ route('faqs.index') }}" class="btn btn-secondary">
                            <i class="ti ti-x me-1"></i> Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
