@extends('frontend.layouts.master')
@section('title', 'Services Page')
@section('content')
    <!-- main area part start -->
    <main>

        <section class="content-box-area mt-4">
            <div class="container">
                <div class="row g-4">

                    @include('frontend.components.intro-section', ['about' => $about])

                    <div class="col-xl-8">
                        <div class="card content-box-card">
                            <div class="card-body">
                                <div class="top-info">
                                    <div class="text">
                                        <h1 class="main-title">Services I <span>Offered</span></h1>
                                        <p>Transforming Ideas into Innovative Reality, Elevate Your Vision with Our
                                            Expert <b>Product
                                                Design and Development</b> Services!</p>
                                    </div>
                                    <div class="available-btn">
                                        <span><i class="fas fa-circle"></i> Available For Hire</span>
                                    </div>
                                </div>
                                {{-- services --}}
                                <div class="services">
                                    <div class="row g-4">
                                        @forelse (($services ?? collect()) as $service)
                                            @php
    $serviceName = data_get($service, 'name', '');
    $serviceIconUrl = data_get($service, 'image.url');
                                            @endphp
                                            <div class="col-md-3 col-sm-6 col-6">
                                                <div class="services-item text-center">
                                                    <div class="image">
                                                        @if ($serviceIconUrl)
                                                            <img src="{{ $serviceIconUrl }}" alt="{{ $serviceName }}">
                                                        @else
                                                            <span
                                                                class="badge bg-label-primary rounded-circle d-inline-flex align-items-center justify-content-center"
                                                                style="width: 40px; height: 40px; font-size: 16px;">
                                                                {{ strtoupper(mb_substr($serviceName, 0, 1)) }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="text">
                                                        <h3 class="title">{{ $serviceName }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <p class="text-muted mb-0">No services added yet.</p>
                                            </div>
                                        @endforelse
                                    </div>

                                    <div class="mt-3">
                                        {{ $services->links() }}
                                    </div>
                                </div>
                                {{-- working with area --}}
                                @include('frontend.components.brands')

                                @include('frontend.components.client-feedback')

                                @include('frontend.components.faqs')

                                @include('frontend.components.work-gether')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- background shape area start -->
        @include('frontend.components.images')
        <!-- background shape area end -->
    </main>
    <!-- main area part end -->
@endsection
