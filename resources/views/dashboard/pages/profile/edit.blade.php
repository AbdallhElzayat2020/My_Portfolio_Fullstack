@extends('dashboard.layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Profile Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Profile Information</h5>
                    <small class="text-muted">Update your account's profile information and email address.</small>
                </div>
                <div class="card-body">
                    @include('dashboard.pages.profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Update Password</h5>
                    <small class="text-muted">Ensure your account is using a long, random password to stay secure.</small>
                </div>
                <div class="card-body">
                    @include('dashboard.pages.profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
@endsection
