@extends('frontend.layouts.master')
@section('title', 'Home Page')

@section('content')
    <main>
        <section class="home-area">
            <div class="container">
                <div class="row g-4">

                    @include('frontend.components.intro-section')

                    {{-- skills area --}}
                    <div class="col-xl-4">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="card expertise-card">
                                    <div class="card-body">
                                        <h3 class="card-title">My Expert Area
                                        </h3>
                                        <div class="expertise-main mt-24">
                                            <div class="row g-3">

                                                <div class="col-xl-4 col-md-4 col-sm-6 col-6">
                                                    <div class="expertise-item">
                                                        <div class="image text-center">
                                                            <img src="{{asset('assets/frontend/img/skills/bootstrap.svg')}}"
                                                                alt="figma">
                                                        </div>
                                                        <div class="text">
                                                            <h4 class="title">Figma</h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-md-4 col-sm-6 col-6">
                                                    <div class="expertise-item">
                                                        <div class="image text-center">
                                                            <img src="{{asset('assets/frontend/img/skills/CSS.svg')}}"
                                                                alt="figma">
                                                        </div>
                                                        <div class="text">
                                                            <h4 class="title">CSS</h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-md-4 col-sm-6 col-6">
                                                    <div class="expertise-item">
                                                        <div class="image text-center">
                                                            <img src="{{asset('assets/frontend/img/skills/figma.svg')}}"
                                                                alt="figma">
                                                        </div>
                                                        <div class="text">
                                                            <h4 class="title">Figma</h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-md-4 col-sm-6 col-6">
                                                    <div class="expertise-item">
                                                        <div class="image text-center">
                                                            <img src="{{asset('assets/frontend/img/skills/git.svg')}}"
                                                                alt="figma">
                                                        </div>
                                                        <div class="text">
                                                            <h4 class="title">Git</h4>
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

                    {{-- Recent Projects --}}
                    <div class="col-xl-4">
                        <div class="card card-projects">
                            <div class="card-body">

                                <h3 class="card-title">Recent Projects <a class="link-btn" href="#">All
                                        Projects
                                        <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.16699 10H15.8337" stroke="#4770FF" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10.833 15L15.833 10" stroke="#4770FF" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10.833 5L15.833 10" stroke="#4770FF" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </a></h3>
                                <div class="projects-main mt-24">
                                    <div class="row g-4 parent-container">
                                        <div class="col-lg-12">
                                            <div class="project-item">
                                                <div class="image">
                                                    <img src="{{asset('assets/frontend/img/projects/project-1.png')}}"
                                                        alt="project-1" class="img-fluid w-100">
                                                    <a href="{{asset('assets/frontend/img/projects/project-1.png')}}"
                                                        class="gallery-popup full-image-preview parent-container">
                                                        <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5">
                                                            <path d="M10 4.167v11.666M4.167 10h11.666"></path>
                                                        </svg>
                                                    </a>
                                                    <div class="info">
                                                        <span class="category">Product Design</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="project-item">
                                                <div class="image">
                                                    <img src="{{asset('assets/frontend/img/projects/project-2.png')}}"
                                                        alt="project-2" class="img-fluid w-100">
                                                    <a href="{{asset('assets/frontend/img/projects/project-2.png')}}"
                                                        class="gallery-popup full-image-preview parent-container">
                                                        <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5">
                                                            <path d="M10 4.167v11.666M4.167 10h11.666"></path>
                                                        </svg>
                                                    </a>
                                                    <div class="info">
                                                        <span class="category">Product Design</span>
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

                {{-- services area start --}}
                <div class="services-area mt-24">
                    <div class="row g-4">
                        <div class="col-xl-8">
                            <div class="card services-card">
                                <div class="card-body">
                                    <h3 class="card-title">Services I Offered
                                        <a class="link-btn" href="#"> See All Services
                                            <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.16699 10H15.8337" stroke="#4770FF" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10.833 15L15.833 10" stroke="#4770FF" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10.833 5L15.833 10" stroke="#4770FF" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </h3>
                                    {{-- services featired --}}
                                    <div class="services-main mt-24">
                                        <div class="row g-4">
                                            <div class="col-md-3 col-sm-6 col-6">
                                                <div class="services-item text-center">
                                                    <div class="image">
                                                        <img src="{{asset('assets/frontend/img/icons/ui-ux.svg')}}"
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
                                                        <img src="{{asset('assets/frontend/img/icons/app.svg')}}" alt="app">
                                                    </div>
                                                    <div class="text">
                                                        <h3 class="title">Mobile App</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-6">
                                                <div class="services-item text-center">
                                                    <div class="image">
                                                        <img src="{{asset('assets/frontend/img/icons/prd-design.svg')}}"
                                                            alt="prd-design">
                                                    </div>
                                                    <div class="text">
                                                        <h3 class="title">Product Design</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-6">
                                                <div class="services-item text-center">
                                                    <div class="image">
                                                        <img src="{{asset('assets/frontend/img/icons/branding.svg')}}"
                                                            alt="branding">
                                                    </div>
                                                    <div class="text">
                                                        <h3 class="title">Branding</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- contact area --}}
                        <div class="col-xl-4">
                            <div class="card lets-talk-together-card">
                                <div class="card-body">
                                    <div class="scrolling-info">
                                        <div class="slider-item">
                                            <p>
                                                Available For Hire 🚀 Crafting Digital Experiences 🎨 Available For
                                                Hire 🚀 Crafting Digital
                                                Experiences 🎨
                                            </p>
                                        </div>
                                    </div>
                                    <h3 class="card-title">Let's👋
                                        <span class="d-block">Work Together</span>
                                    </h3>
                                    <a class="link-btn" href=""> Let's Talk
                                        <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5 11.6665V6.6665H12.5" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M17.5 6.6665L10 14.1665L2.5 6.6665" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- services area end --}}
            </div>
        </section>
        <!-- background shape area start -->
        @include('frontend.components.images')
        <!-- background shape area end -->
    </main>
@endsection
