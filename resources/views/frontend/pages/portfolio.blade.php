@extends('frontend.layouts.master')
@section('title', 'Portfolio Page')
@section('content')
    <main>

        <section class="content-box-area mt-4">
            <div class="container">
                <div class="row g-4">

                    @include('frontend.components.intro-section', ['about' => $about])

                    <div class="col-xl-8">
                        <div class="card content-box-card">
                            <div class="card-body portfolio-card">
                                <div class="top-info">
                                    <div class="text">
                                        <h1 class="main-title">Check Out My Latest <span>Projects</span></h1>
                                        <p>I'm here to help if you're searching for a product designer to bring your
                                            idea to life or a
                                            design partner to help take your business to the next level.</p>
                                    </div>
                                </div>
                                <div class="portfolio-area">
                                    <div class="row g-4 parent-container">
                                        <div class="col-lg-12">
                                            @foreach ($projects as $project)
                                                <div class="portfolio-item">
                                                    <div class="image">
                                                        <a href="{{ route('website.portfolio-details', $project->slug) }}">
                                                            <img src="{{ $project->image->first()->url }}"
                                                                alt="{{ $project->full_title }}" class="img-fluid w-100">
                                                        </a>
                                                        <a href="{{ $project->image->first()->url }}"
                                                            class="gallery-popup full-image-preview parent-container">
                                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5">
                                                                <path d="M10 4.167v11.666M4.167 10h11.666"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="text">
                                                        <div class="info">
                                                            <a href="{{ route('website.portfolio-details', $project->slug) }}"
                                                                class="title">{{ $project->full_title }}</a>
                                                            <p class="subtitle">{{ $project->category->name ?? '-' }}</p>
                                                        </div>
                                                        <div class="visite-btn">
                                                            <a href="{{ $project->link }}" target="_blank">Visit
                                                                Site
                                                                <svg class="arrow-up" width="14" height="15" viewBox="0 0 14 15"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.91634 4.5835L4.08301 10.4168"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                    <path d="M4.66699 4.5835H9.91699V9.8335"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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