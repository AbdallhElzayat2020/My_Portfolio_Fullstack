@extends('frontend.layouts.master')

@section('title', $blog->full_name . ' - Blog Details')
@section('content')
    <main>

        <section class="content-box-area mt-4">
            <div class="container">
                <div class="row g-4">
                    @include('frontend.components.intro-section')
                    <div class="col-xl-8">
                        <div class="card content-box-card">
                            <div class="card-body portfolio-card article-details-card">
                                <div class="article-details-area">
                                    <div class="main-image">
                                        @php
                                            $blogImageUrl = $blog->image->url ?? asset('assets/frontend/img/blog/blog-img-1.jpg');
                                        @endphp
                                        <img src="{{ $blogImageUrl }}" alt="{{ $blog->full_name }}"
                                            class="img-fluid w-100">
                                    </div>
                                    <ul class="list-unstyled article-tags">
                                        @php
                                            $readTime = ceil(str_word_count(strip_tags($blog->full_desc)) / 200);
                                            $categoryName = $blog->category->name ?? 'General';
                                        @endphp
                                        <li>{{ $readTime }} min read</li>
                                        <li>{{ $blog->created_at->format('M d, Y') }}</li>
                                        <li>{{ $categoryName }}</li>
                                    </ul>
                                    <div class="article-details-text">
                                        <h3 class="main-title">{{ $blog->full_name }}</h3>

                                        @if ($blog->short_desc)
                                            <div class="short-description mb-4">
                                                {!! $blog->short_desc !!}
                                            </div>
                                        @endif

                                        <div class="full-description">
                                            {!! $blog->full_desc !!}
                                        </div>

                                        <div class="tags-and-share mt-4">
                                            <div class="tags">
                                                <h3 class="title">Tags:</h3>
                                                <ul class="list-unstyled">
                                                    @if ($blog->category)
                                                        <li><a href="#">{{ $blog->category->name }}</a></li>
                                                    @endif
                                                    <li><a href="#">Development</a></li>
                                                    <li><a href="#">Design Trend</a></li>
                                                </ul>
                                            </div>
                                            <div class="share">
                                                <h3 class="title">Share:</h3>
                                                <div class="social-media-icon mt-0">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                                                target="_blank">
                                                                <i class="fab fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->fullUrl()) }}&description={{ urlencode($blog->full_name) }}"
                                                                target="_blank">
                                                                <i class="fab fa-pinterest"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://github.com" target="_blank">
                                                                <i class="fab fa-github"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.youtube.com" target="_blank">
                                                                <i class="fab fa-youtube"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        @if (isset($relatedBlogs) && $relatedBlogs->count() > 0)
                                            <div class="related-post mt-5">
                                                <h2 class="main-common-title">Related Post</h2>
                                                <div class="row g-4">
                                                    @foreach ($relatedBlogs as $relatedBlog)
                                                        @php
                                                            $relatedImageUrl = $relatedBlog->image->url ?? asset('assets/frontend/img/blog/blog-img-1.jpg');
                                                            $relatedCategoryName = $relatedBlog->category->name ?? 'General';
                                                            $relatedReadTime = ceil(str_word_count(strip_tags($relatedBlog->full_desc)) / 200);
                                                        @endphp
                                                        <div class="col-md-6">
                                                            <div class="article-publications-item">
                                                                <div class="image">
                                                                    <a href="{{ route('website.blog-details', $relatedBlog->slug) }}"
                                                                        class="d-block w-100">
                                                                        <img src="{{ $relatedImageUrl }}"
                                                                            alt="{{ $relatedBlog->full_name }}"
                                                                            class="img-fluid w-100">
                                                                    </a>
                                                                    <a href="{{ route('website.blog-details', $relatedBlog->slug) }}"
                                                                        class="tags">{{ $relatedCategoryName }}</a>
                                                                </div>
                                                                <div class="text">
                                                                    <a href="{{ route('website.blog-details', $relatedBlog->slug) }}"
                                                                        class="title">{{ $relatedBlog->full_name }}</a>
                                                                    <ul class="list-unstyled">
                                                                        <li>{{ $relatedReadTime }} min read</li>
                                                                        <li>{{ $relatedBlog->created_at->format('M d, Y') }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
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
