@extends('frontend.layouts.master')
@section('title', $project->full_title . ' - Portfolio Details Page')
@section('content')
    <main>

        <section class="content-box-area mt-4">
            <div class="container">
                <div class="row g-4">
                    @include('frontend.components.intro-section', ['about' => $about])
                    <div class="col-xl-8">
                        <div class="card content-box-card">
                            <div class="card-body portfolio-card">
                                <h1 class="main-title my-2">{{ $project->full_title }}</h1>
                                <div class="portfolio-details-area">
                                    <div class="main-image">
                                        <img src="{{ $project->image->first()->url }}" alt="project-details-1">
                                    </div>
                                    <div class="portfolio-details-text">
                                        <div class="overview">
                                            <div class="short-info">
                                                <div class="info-item">
                                                    <p class="subtitle">Category:</p>
                                                    <h4 class="card-title">{{ $project->category->name ?? '-' }}</h4>
                                                </div>
                                            </div>
                                            <h4 class="card-title">Overview</h4>
                                            <p>{!! $project->full_desc !!}</p>
                                        </div>
                                    </div>
                                </div>

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
@endsection
