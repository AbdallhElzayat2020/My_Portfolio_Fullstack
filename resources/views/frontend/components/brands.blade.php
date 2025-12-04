@if (isset($brands) && $brands->count() > 0)
    <div class="working-with-area">
        <h2 class="main-common-title">Working With 50+ Brands ✨ Worldwide</h2>
        <div class="working-with-main">
            @if(isset($brands) && $brands->count())
                @foreach ($brands as $brand)
                    @php
                        $logoUrl = $brand->image->url ?? null;
                        $alt = $brand->alt_text ?: $brand->brand_name;
                    @endphp
                    <div class="items">
                        @if ($logoUrl)
                            <img src="{{ $logoUrl }}" alt="{{ $alt }}">
                        @else
                            <span class="text-muted small">{{ $brand->brand_name }}</span>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="items">
                    <span class="text-muted small">No brands added yet.</span>
                </div>
            @endif
        </div>
    </div>

@endif