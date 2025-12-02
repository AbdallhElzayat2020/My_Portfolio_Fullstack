@extends('frontend.layouts.master')
@section('title', 'Services Page')
@section('content')
    <!-- main area part start -->
    <main>

        <section class="content-box-area mt-4">
            <div class="container">
                <div class="row g-4">

                    @include('frontend.components.intro-section')

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
                                        <div class="col-md-3 col-sm-6 col-6">
                                            <div class="services-item text-center">
                                                <div class="image">
                                                    <img src="{{ asset('assets/frontend/img/icons/ui-ux.svg') }}"
                                                        alt="ui-ux">
                                                </div>
                                                <div class="text">
                                                    <h3 class="title">UI UX Design</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-6">
                                            <div class="services-item text-center">
                                                <div class="image">
                                                    <img src="{{ asset('assets/frontend/img/icons/ui-ux.svg') }}"
                                                        alt="ui-ux">
                                                </div>
                                                <div class="text">
                                                    <h3 class="title">UI UX Design</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-6">
                                            <div class="services-item text-center">
                                                <div class="image">
                                                    <img src="{{ asset('assets/frontend/img/icons/ui-ux.svg') }}"
                                                        alt="ui-ux">
                                                </div>
                                                <div class="text">
                                                    <h3 class="title">UI UX Design</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-6">
                                            <div class="services-item text-center">
                                                <div class="image">
                                                    <img src="{{ asset('assets/frontend/img/icons/ui-ux.svg') }}"
                                                        alt="ui-ux">
                                                </div>
                                                <div class="text">
                                                    <h3 class="title">UI UX Design</h3>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                {{-- working with area --}}
                                <div class="working-with-area">
                                    <h2 class="main-common-title">Working With 50+ Brands ✨ Worldwide
                                    </h2>
                                    <div class="working-with-main">
                                        <div class="items">
                                            <img src="{{ asset('assets/frontend/img/icons/notion.svg') }}" alt="notion">
                                        </div>

                                    </div>
                                </div>

                                @include('frontend.components.client-feedback')

                                @include('frontend.components.awards-recognitions')

                                @include('frontend.components.faqs')

                                @include('frontend.components.work-gether')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- background shape area start -->
        <div class="background-shapes">
            <div class="shape-1 common-shape">
                <img src="assets/img/bg/banner-shape-1.png" alt="banner-shape-1">
            </div>
            <div class="shape-2 common-shape">
                <img src="assets/img/bg/banner-shape-1.png" alt="banner-shape-1">
            </div>
            <div class="threed-shape-1 move-with-cursor" data-value="1">
                <img src="assets/img/bg/object-3d-1.png" alt="object-3d-1">
            </div>
            <div class="threed-shape-2 move-with-cursor" data-value="1">
                <img src="assets/img/bg/object-3d-2.png" alt="object-3d-2">
            </div>
        </div>
        <!-- background shape area end -->
    </main>
    <!-- main area part end -->
@endsection
