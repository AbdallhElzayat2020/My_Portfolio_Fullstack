<form method="post" action="{{ route('dashboard.password.update') }}" class="space-y-4">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="current_password" class="form-label">Current Password</label>
        <input type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
            id="current_password" name="current_password" required>
        @error('current_password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">New Password</label>
        <input type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror"
            id="password" name="password" required>
        @error('password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>

    <div class="d-flex align-items-center gap-3">
        <button type="submit" class="btn btn-primary">Update Password</button>
        @if (session('status') === 'password-updated')
            <div class="text-success">
                <i class="ti ti-check me-1"></i>Password updated.
            </div>
        @endif
    </div>
</form>
