@extends('frontend.layouts.master')
@section('title', 'Home Page')

@section('content')
    <main>
        <section class="home-area">
            <div class="container">
                <div class="row g-4">

                    @include('frontend.components.intro-section', ['about' => $about])

                    {{-- skills area --}}
                    <div class="col-xl-4">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="card expertise-card">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            My Expert Area
                                        </h3>
                                        <div class="expertise-main mt-24">
                                            <div class="row g-3">
                                                @forelse(($tools ?? collect()) as $tool)
                                                    @php
                                                        $toolName = data_get($tool, 'name', '');
                                                        $toolImageUrl = data_get($tool, 'image.url');
                                                    @endphp
                                                    <div class="col-xl-4 col-md-4 col-sm-6 col-6">
                                                        <div class="expertise-item">
                                                            <div class="image text-center">
                                                                @if ($toolImageUrl)
                                                                    <img src="{{ $toolImageUrl }}" alt="{{ $toolName }}"
                                                                         class="img-fluid" style="max-width: 40px;">
                                                                @else
                                                                    <span
                                                                        class="badge bg-label-primary rounded-circle d-inline-flex align-items-center justify-content-center"
                                                                        style="width: 40px; height: 40px; font-size: 16px;">
                                                                        {{ strtoupper(mb_substr($toolName, 0, 1)) }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="text mt-2">
                                                                <h4 class="title">{{ $toolName }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-12">
                                                        <p class="text-muted mb-0">No tools added yet.</p>
                                                    </div>
                                                @endforelse
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
                                @if(isset($isAvailableForHire) && $isAvailableForHire)
                                    <div class="available-btn mb-3 text-white">
                                        <span>
                                            <i class="fas fa-circle" style="color: var(--primary);"></i>
                                            Available For Hire
                                        </span>
                                    </div>
                                @endif
                                <h3 class="card-title">Recent Projects <a class="link-btn" href="{{ route('website.portfolio') }}">All
                                        Projects
                                        <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.16699 10H15.8337" stroke="#4770FF" stroke-width="1.5"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.833 15L15.833 10" stroke="#4770FF" stroke-width="1.5"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.833 5L15.833 10" stroke="#4770FF" stroke-width="1.5"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                    </a></h3>
                                <div class="projects-main mt-24">
                                    <div class="row g-4 parent-container">
                                        @forelse($homeProjects as $project)
                                            <div class="col-lg-12">
                                                <div class="project-item">
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
                                                        <div class="info">
                                                            <span class="category">
                                                                {{ $project->category->name ?? '-' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <p class="text-muted mb-0">No projects added yet.</p>
                                            </div>
                                        @endforelse
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
                                        <a class="link-btn" href="{{ route('website.services') }}"> See All Services
                                            <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.16699 10H15.8337" stroke="#4770FF" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10.833 15L15.833 10" stroke="#4770FF" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10.833 5L15.833 10" stroke="#4770FF" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>

                                        </a>
                                    </h3>
                                    {{-- services featured --}}
                                    <div class="services-main mt-24">
                                        <div class="row g-4">
                                            @forelse(($services ?? collect()) as $service)
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
                                                @if(isset($isAvailableForHire) && $isAvailableForHire)
                                                    Available For Hire 🚀 Crafting Digital Experiences 🎨 Available For
                                                    Hire 🚀 Crafting Digital
                                                    Experiences 🎨
                                                @else
                                                    Crafting Digital Experiences 🎨 Building Amazing Solutions 🚀 Crafting
                                                    Digital
                                                    Experiences 🎨 Building Amazing Solutions 🚀
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <h3 class="card-title">Let's👋
                                        <span class="d-block">Work Together</span>
                                    </h3>
                                    <a class="link-btn" href="https://wa.me/201212484233" target="_blank"> Let's Talk
                                        <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5 11.6665V6.6665H12.5" stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M17.5 6.6665L10 14.1665L2.5 6.6665" stroke-width="1.5"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
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
