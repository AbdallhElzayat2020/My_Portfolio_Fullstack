@extends('dashboard.layouts.master')
@section('title', 'Welcome')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card text-center shadow-sm">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <div class="avatar avatar-xl mb-3">
                                <span class="avatar-initial rounded-circle bg-primary bg-label-primary">
                                    <i class="ti ti-user ti-lg"></i>
                                </span>
                            </div>
                            <h2 class="mb-2">مرحباً {{ $user->name }} 👋</h2>
                            <p class="text-muted mb-4">
                                مرحباً بك في لوحة التحكم
                            </p>
                        </div>

                        <div class="alert alert-info mb-4" role="alert">
                            <div class="alert-body">
                                <i class="ti ti-info-circle me-2"></i>
                                <strong>ملاحظة:</strong> ليس لديك صلاحية للوصول إلى صفحة Dashboard الرئيسية.
                                يمكنك الوصول فقط إلى الصفحات التي لديك صلاحية لها من القائمة الجانبية.
                            </div>
                        </div>

                        @php
                            $permissions = config('permissions.permissions', []);
                            $userPermissions = $user->role ? $user->role->permissions : [];
                            $availablePermissions = [];

                            foreach ($permissions as $id => $permission) {
                                if ($id != 1 && ($user->isAdmin() || in_array($id, $userPermissions))) {
                                    $availablePermissions[] = $permission;
                                }
                            }
                        @endphp

                        @if (count($availablePermissions) > 0)
                            <div class="mt-4">
                                <h5 class="mb-3">الصفحات المتاحة لك:</h5>
                                <div class="row g-3">
                                    @foreach ($availablePermissions as $permission)
                                        @php
                                            $routeName = $permission['route'] ?? null;
                                        @endphp
                                        <div class="col-md-6">
                                            <div class="card border h-100">
                                                <div class="card-body d-flex flex-column">
                                                    <h6 class="mb-2">{{ $permission['name'] }}</h6>
                                                    <p class="text-muted small mb-3 flex-grow-1">
                                                        {{ $permission['description'] }}</p>
                                                    @if ($routeName && Route::has($routeName))
                                                        <a href="{{ route($routeName) }}"
                                                            class="btn btn-sm btn-outline-primary">
                                                            <i class="ti ti-arrow-right me-1"></i>
                                                            الذهاب للصفحة
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <i class="ti ti-alert-triangle me-2"></i>
                                لا توجد صفحات متاحة لك حالياً. يرجى التواصل مع الإدارة للحصول على الصلاحيات المناسبة.
                            </div>
                        @endif

                        <div class="mt-5 pt-4 border-top">
                            <a href="{{ route('dashboard.profile.edit') }}" class="btn btn-primary me-2">
                                <i class="ti ti-user-circle me-2"></i>
                                تعديل الملف الشخصي
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary">
                                    <i class="ti ti-logout me-2"></i>
                                    تسجيل الخروج
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
