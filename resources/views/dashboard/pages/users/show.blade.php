@extends('dashboard.layouts.master')
@section('title', 'View User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">User Details</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">
                            <i class="ti ti-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Name:</strong> {{ $user->name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong> {{ $user->email }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Role:</strong>
                            @if ($user->role)
                                <span class="badge bg-label-info">{{ $user->role->name }}</span>
                            @else
                                <span class="text-muted">No Role</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}
                        </div>
                    </div>

                    @if ($user->role && $user->role->permissions)
                        <div class="mb-3">
                            <strong>Permissions:</strong>
                            <div class="row mt-2">
                                @php
                                    $permissions = config('permissions.permissions', []);
                                @endphp
                                @foreach ($user->role->permissions as $permissionId)
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
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
