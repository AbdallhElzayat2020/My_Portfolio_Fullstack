@extends('frontend.layouts.master')
@section('title', 'About Abdullah')
@section('content')
    <!-- main area part start -->
    <main>

        <section class="content-box-area mt-4">
            <div class="container">
                <div class="row g-4">
                    {{-- intro --}}
                    @include('frontend.components.intro-section', ['about' => $about])

                    <div class="col-xl-8">
                        <div class="card content-box-card">
                            <div class="card-body">
                                {{-- top info --}}
                                <div class="top-info">
                                    <div class="text">
                                        <h1 class="main-title">Hi, This Is <span>Abdullah Elzayat</span> 👋</h1>
                                        <p>A Passionate <b>Full Stack Developer</b> 🖥️
                                            having
                                            <b>4 years</b> of Experiences over 10+ Country Worldwide.
                                        </p>
                                    </div>
                                    <div class="available-btn">
                                        <span><i class="fas fa-circle"></i> Available For Hire</span>
                                    </div>
                                </div>
                                {{-- counter area --}}
                                <div class="counter-area">
                                    <div class="counter">
                                        @if(isset($numbers) && $numbers)
                                            <div class="counter-item">
                                                <h3 class="number">{{ $numbers->experience_year }}</h3>
                                                <p class="subtitle">Year of Experience</p>
                                            </div>
                                            <div class="counter-item">
                                                <h3 class="number">{{ $numbers->complete_project }}</h3>
                                                <p class="subtitle">Project Completed</p>
                                            </div>
                                            <div class="counter-item">
                                                <h3 class="number">{{ $numbers->happy_client }}</h3>
                                                <p class="subtitle">Happy Client</p>
                                            </div>
                                        @else
                                            <div class="counter-item">
                                                <h3 class="number">4+</h3>
                                                <p class="subtitle">Year of Experience</p>
                                            </div>
                                            <div class="counter-item">
                                                <h3 class="number">86+</h3>
                                                <p class="subtitle">Project Completed</p>
                                            </div>
                                            <div class="counter-item">
                                                <h3 class="number">72+</h3>
                                                <p class="subtitle">Happy Client</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="circle-area">
                                        <div class="circle-text">
                                            <img class="circle-image"
                                                src="{{asset('assets/frontend/img/about-us/circle-text.svg')}}"
                                                alt="circle-text">
                                            <img class="circle-image circle-image-light d-none"
                                                src="{{asset('assets/frontend/img/about-us/circle-text-light.svg')}}"
                                                alt="circle-text">
                                            <span class="arrow-down">
                                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 5V35" stroke="white" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15 30L20 35L25 30" stroke="white" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- brands area --}}
                                @include('frontend.components.brands')

                                {{-- client feedback --}}
                                @include('frontend.components.client-feedback')

                                {{-- @include('frontend.components.awards-recognitions') --}}
                                {{-- awards and recognitions --}}


                                {{-- article and blogs --}}
                                @if(isset($latestBlogs) && $latestBlogs->count() > 0)
                                    <div class="article-publications">
                                        <h2 class="main-common-title">Article and Publications</h2>
                                        <div class="article-publications-main">
                                            <div class="row article-publications-slider">
                                                @foreach($latestBlogs as $blog)
                                                    @php
                                                        $blogImageUrl = $blog->image->url ?? asset('assets/frontend/img/blog/blog-img-1.jpg');
                                                        $categoryName = $blog->category->name ?? 'General';
                                                        $readTime = ceil(str_word_count(strip_tags($blog->full_desc)) / 200);
                                                    @endphp
                                                    <div class="col-lg-6">
                                                        <div class="article-publications-item">
                                                            <div class="image">
                                                                <a href="{{ route('website.blog-details', $blog->slug) }}"
                                                                    class="d-block w-100">
                                                                    <img src="{{ $blogImageUrl }}" alt="{{ $blog->full_name }}"
                                                                        class="img-fluid w-100">
                                                                </a>
                                                                <a href="{{ route('website.blog-details', $blog->slug) }}"
                                                                    class="tags">{{ $categoryName }}</a>
                                                            </div>
                                                            <div class="text">
                                                                <a href="{{ route('website.blog-details', $blog->slug) }}"
                                                                    class="title">{{ $blog->full_name }}</a>
                                                                <ul class="list-unstyled">
                                                                    <li>{{ $readTime }} min read</li>
                                                                    <li>{{ $blog->created_at->format('M d, Y') }}</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- work together slider --}}
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