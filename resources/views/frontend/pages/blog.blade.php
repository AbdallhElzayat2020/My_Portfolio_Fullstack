@extends('frontend.layouts.master')

@section('title', 'Blog Page')
@section('content')
    <main>

        <section class="content-box-area mt-4">
            <div class="container">
                <div class="row g-4">

                    @include('frontend.components.intro-section')
                    <div class="col-xl-8">
                        <div class="card content-box-card">
                            <div class="card-body portfolio-card">
                                <div class="top-info">
                                    <div class="text">
                                        <h1 class="main-title">My Recent Article and Publications</h1>
                                        <p>I'm here to help if you're searching for a product designer to bring your
                                            idea to life or a
                                            design partner to help take your business to the next level.</p>
                                    </div>
                                </div>
                                <div class="article-publications article-area">
                                    <div class="article-publications-main">
                                        <div class="row">
                                            @forelse($blogs as $blog)
                                                @php
    $blogImageUrl = $blog->image->url ?? asset('assets/frontend/img/blog/blog-img-1.jpg');
    $categoryName = $blog->category->name ?? 'General';
    $readTime = ceil(str_word_count(strip_tags($blog->full_desc)) / 200); // Estimate reading time
                                                @endphp
                                                <div class="col-xl-6 col-lg-4 col-md-6">
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
                                            @empty
                                                <div class="col-12">
                                                    <p class="text-muted text-center py-4">No blog posts available yet.</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>

                                @if ($blogs->hasPages())
                                    <div class="pagination">
                                        {{ $blogs->links() }}
                                    </div>
                                @endif
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
