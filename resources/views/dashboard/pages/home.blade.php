@extends('dashboard.layouts.master')
@section('title', 'Home Page')
@section('content')
    <div class="row">
        @if (isset($stats))
            @php
                $iconMap = [
                    'categories' => 'ti ti-category',
                    'partners' => 'ti ti-users',
                    'faqs' => 'ti ti-help',
                    'achievements' => 'ti ti-trophy',
                    'testimonials' => 'ti ti-messages',
                    'industrials' => 'ti ti-building-factory-2',
                    'blogs' => 'ti ti-news',
                    'services' => 'ti ti-briefcase',
                    'technologies' => 'ti ti-cpu',
                    'projects' => 'ti ti-layout-kanban',
                    'contacts' => 'ti ti-mail',
                    'get_quotes' => 'ti ti-file-invoice',
                    'main_steps' => 'ti ti-list-check',
                ];
                $routeMap = [
                    'categories' => 'categories.index',
                    'partners' => 'partners.index',
                    'faqs' => 'faqs.index',
                    'achievements' => 'achievements.index',
                    'testimonials' => 'testimonials.index',
                    'industrials' => 'industrials.index',
                    'blogs' => 'blogs.index',
                    'services' => 'services.index',
                    'technologies' => 'technologies.index',
                    'projects' => 'projects.index',
                    'contacts' => 'contacts.index',
                    'get_quotes' => 'get-quotes.index',
                    'main_steps' => 'main-steps.index',
                ];
            @endphp

            <div class="col-12 mb-4">
                <div class="row g-3">
                    @foreach ($stats as $s)
                        @php
                            $icon = $iconMap[$s['key']] ?? 'ti ti-database';
                            $routeName = $routeMap[$s['key']] ?? null;
                        @endphp
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-start justify-content-between mb-2">
                                        <div class="avatar flex-shrink-0">
                                            <span class="avatar-initial rounded bg-primary">
                                                <i class="{{ $icon }} text-white"></i>
                                            </span>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                @if ($routeName)
                                                    <a class="dropdown-item" href="{{ route($routeName) }}">View details</a>
                                                @else
                                                    <span class="dropdown-item disabled">View details</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="mb-1">{{ $s['label'] }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-3">
                                        <div>
                                            <h4 class="mb-0">{{ $s['total'] }}</h4>
                                            <small class="text-muted">Total</small>
                                        </div>
                                        @if (!is_null($s['active']))
                                            <div class="text-end">
                                                <div class="mb-1">
                                                    <span class="badge bg-label-success me-1"></span>
                                                    <small class="text-muted">Active: </small>
                                                    <span class="fw-semibold">{{ $s['active'] }}</span>
                                                </div>
                                                <div>
                                                    <span class="badge bg-label-secondary me-1"></span>
                                                    <small class="text-muted">Inactive: </small>
                                                    <span class="fw-semibold">{{ $s['inactive'] }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
