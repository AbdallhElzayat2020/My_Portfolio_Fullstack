@extends('dashboard.layouts.master')
@section('title', 'View Role')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Role Details</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">
                            <i class="ti ti-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Name:</strong> {{ $role->name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Slug:</strong> <span class="badge bg-label-secondary">{{ $role->slug }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Status:</strong>
                            <span class="badge bg-{{ $role->status === 'active' ? 'success' : 'secondary' }}">
                                {{ ucfirst($role->status) }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <strong>Users Count:</strong> {{ $role->users()->count() }}
                        </div>
                    </div>

                    @if ($role->description)
                        <div class="mb-3">
                            <strong>Description:</strong>
                            <p>{{ $role->description }}</p>
                        </div>
                    @endif

                    <div class="mb-3">
                        <strong>Permissions:</strong>
                        <div class="row mt-2">
                            @if ($role->permissions && count($role->permissions) > 0)
                                @foreach ($role->permissions as $permissionId)
                                    @if (isset($permissions[$permissionId]))
                                        <div class="col-md-6 col-lg-4 mb-2">
                                            <div class="card">
                                                <div class="card-body p-2">
                                                    <strong>{{ $permissions[$permissionId]['name'] }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $permissions[$permissionId]['description'] }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <p class="text-muted">No permissions assigned.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
