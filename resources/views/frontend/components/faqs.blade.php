@if (isset($faqs) && $faqs->count() > 0)
    <div class="frequently-asked-questions">
        <h2 class="main-common-title">Frequently Asked Questions</h2>
        <div class="frequently-asked-questions-main">
            <div class="accordion" id="accordionExample">
                @foreach ($faqs as $index => $faq)
                    @php
                        $headingId = 'heading' . ($index + 1);
                        $collapseId = 'collapse' . ($index + 1);
                        $isFirst = $index === 0;
                    @endphp
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="{{ $headingId }}">
                            <button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                                aria-expanded="{{ $isFirst ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                                {{ $faq->question }}
                                <span class="ms-auto">
                                    <span class="icon ms-4">
                                        <img class="icon-plus" src="{{ asset('assets/frontend/img/icons/plus.svg') }}"
                                            alt="plus">
                                        <img class="icon-minus d-none" src="{{ asset('assets/frontend/img/icons/minus.svg') }}"
                                            alt="minus">
                                    </span>
                                </span>
                            </button>
                        </h4>
                        <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                            aria-labelledby="{{ $headingId }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif