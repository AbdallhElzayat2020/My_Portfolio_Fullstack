<div class="client-feedback">
    <h2 class="main-common-title">Trusted By 1200+ Clients
    </h2>
    <div class="row client-feedback-slider">
        @foreach ($testimonials as $testimonial)
            <div class="col-lg-6">
                <div class="feedback-item">
                    <div class="feedback-top-info">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="website">
                            <a href="javascript:void(0)">
                                <svg class="arrow-up" width="14" height="15" viewBox="0 0 14 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.91634 4.5835L4.08301 10.4168" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M4.66699 4.5835H9.91699V9.8335" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="details">
                        <p>
                            {{ $testimonial->client_description }}
                        </p>
                    </div>
                    <div class="designation">
                        <p><span>{{ $testimonial->client_name }}</span> - {{ $testimonial->job ?: '-' }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>