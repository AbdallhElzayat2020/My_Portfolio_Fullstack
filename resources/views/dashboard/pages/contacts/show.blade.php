@extends('dashboard.layouts.master')
@section('title', 'View Contact Message')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Contact Message Details</h5>
                    <div class="d-flex gap-2">
                        <a href="mailto:{{ $contact->email }}" class="btn btn-primary">
                            <i class="ti ti-mail me-1"></i> Reply
                        </a>
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Name</label>
                                <h5 class="mb-0">{{ $contact->name }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Email</label>
                                <p class="mb-0">
                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Service</label>
                                <p class="mb-0">
                                    @if ($contact->service)
                                        <span class="badge bg-label-primary">{{ $contact->service->name }}</span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Subject</label>
                                <p class="mb-0">{{ $contact->subject ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Phone Number</label>
                                <p class="mb-0">
                                    @if ($contact->phone_number)
                                        <span class="badge bg-label-info">{{ $contact->phone_number }}</span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">Message</label>
                        <div class="border rounded p-3 bg-light">
                            <p class="mb-0">{{ $contact->message }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label text-muted">Status</label>
                                <div>
                                    @if ($contact->status === 'pending')
                                        <span class="badge bg-label-warning">Pending</span>
                                    @else
                                        <span class="badge bg-label-success">Read</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label text-muted">Created At</label>
                                <p class="mb-0">{{ $contact->created_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label text-muted">Updated At</label>
                                <p class="mb-0">{{ $contact->updated_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="ti ti-trash me-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection