@extends('frontend.layouts.master')

@section('title', 'Blog Details Page')
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
                                        <img src="{{ asset('assets/frontend/img/blog/blog-img-1.jpg') }}" alt="blog-img-1"
                                            class="img-fluid w-100">
                                    </div>
                                    <ul class="list-unstyled article-tags">
                                        <li>15 min read</li>
                                        <li>Nov 6, 2023</li>
                                        <li>1.5k Views</li>
                                    </ul>
                                    <div class="article-details-text">
                                        <h3 class="main-title">Want To Upgrade Your Brain? Stop Doing 7 Things</h3>
                                        <p>Mastering the Art of Email Marketing tips for Success pattern of living,
                                            including their
                                            behaviors, habits, and daily routines. It encompasses everything from
                                            their diet, exercise
                                            routines, and sleep habits to their recreational activities, social
                                            interactions, and work
                                            habits.
                                            A person's lifestyle plays a significant role in determining their
                                            overall well-being, including
                                            their physical and mental health, as well as their happiness and
                                            satisfaction with life. A
                                            healthy
                                            lifestyle, which includes a balanced diet, regular exercise, and a
                                            healthy sleep pattern, can
                                            improve an individual's quality of life
                                        </p>
                                        <p>A healthy lifestyle, which includes a balanced diet, regular exercise,
                                            and a healthy sleep
                                            pattern, can improve an individual's quality of life and reduce the risk
                                            of chronic diseases. On
                                            the other hand, unhealthy lifestyle habits, such as smoking, excessive
                                            alcohol consumption, and
                                            a
                                            sedentary lifestyle, can have negative impacts on one's health and
                                            well-being. Thus, making
                                            intentional choices about one's lifestyle can lead to improved health,
                                            happiness, and longevity.
                                        </p>
                                        <blockquote>
                                            <p>
                                                " There are many different forms of travel, including road trips,
                                                cruises, backpacking, and more, each offering its own unique set of
                                                experiences and adventures. "
                                            </p>
                                        </blockquote>
                                        <p>The Role of Storytelling in Email Marketing CampaignsEmail Marketing
                                            Automation: Streamlining
                                            Your Campaigns for Results can improve an individual's quality of life
                                            and reduce the risk of
                                            chronic diseases. On the other hand, unhealthy lifestyle habits, such as
                                            smoking, excessive
                                            alcohol consumption, and a sedentary lifestyle, can have negative
                                            impacts on one's health and
                                            well-being. Thus, making intentional choices about one's lifestyle can
                                            lead to improved health,
                                            happiness, and longevity</p>
                                        <h3 class="main-title inner-title">The Role of Storytelling in Email
                                            Marketing</h3>
                                        <p>Lifestyle refers to an individual's habits, behaviors, and patterns of
                                            living. encompasses all
                                            aspects of a person's daily life, including their diet, exercise routine
                                            Lifestyle choices can
                                            also impact a person's financial, social, and environmental well-being.
                                            A person's lifestyle
                                            plays
                                            a major role in determining their overall health, happy happiness, and
                                            longevity.
                                        </p>
                                        <ul class="list-unstyled listed-info">
                                            <li>Lifestyle refers to an individual's habits, behaviors, and patterns
                                                of living.</li>
                                            <li>It encompasses all aspects of a person's daily life, including their
                                                diet, exercise routine.
                                            </li>
                                            <li>Lifestyle choices can also impact a person's financial, social, and
                                                environmental
                                                well-being.
                                            </li>
                                            <li>A person's lifestyle plays a major role in determining their overall
                                                health, happiness, and
                                                quality of life.</li>
                                        </ul>
                                        <div class="tags-and-share">
                                            <div class="tags">
                                                <h3 class="title">Tags:</h3>
                                                <ul class="list-unstyled">
                                                    <li><a href="#">Development</a></li>
                                                    <li><a href="#">Design Trend</a></li>
                                                </ul>
                                            </div>
                                            <div class="share">
                                                <h3 class="title">Share:</h3>
                                                <div class="social-media-icon mt-0">
                                                    <ul class="list-unstyled">
                                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-github"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="related-post">
                                            <h2 class="main-common-title">Related Post
                                            </h2>
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="article-publications-item">
                                                        <div class="image">
                                                            <a href="article.html" class="d-block w-100">
                                                                <img src="{{ asset('assets/frontend/img/blog/blog-img-1.jpg') }}"
                                                                    alt="blog-img-1" class="img-fluid w-100">
                                                            </a>
                                                            <a href="{{ route('website.blog-details') }}"
                                                                class="tags">Development</a>
                                                        </div>
                                                        <div class="text">
                                                            <a href="{{ route('website.blog-details') }}" class="title">Want
                                                                To Upgrade
                                                                Your Brain? Stop Doing These 7
                                                                Things</a>
                                                            <ul class="list-unstyled">
                                                                <li>15 min read</li>
                                                                <li>Nov 6, 2023</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="article-publications-item">
                                                        <div class="image">
                                                            <a href="article.html" class="d-block w-100">
                                                                <img src="{{ asset('assets/frontend/img/blog/blog-img-2.jpg') }}"
                                                                    alt="blog-img-2" class="img-fluid w-100">
                                                            </a>
                                                            <a href="{{ route('website.blog-details') }}"
                                                                class="tags">Development</a>
                                                        </div>
                                                        <div class="text">
                                                            <a href="{{ route('website.blog-details') }}" class="title">Want
                                                                To Upgrade
                                                                Your Brain? Stop Doing These 7
                                                                Things</a>
                                                            <ul class="list-unstyled">
                                                                <li>15 min read</li>
                                                                <li>Nov 6, 2023</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
