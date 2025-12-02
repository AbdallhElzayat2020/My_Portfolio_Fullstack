<!DOCTYPE html>
<html lang="en">


@include('frontend.layouts.head')

<body>

    <!-- Page Loader -->
    <div id="page-loader" class="page-loader">
        <div class="loader-content">
            <div class="loader-spinner"></div>
            {{-- <div class="loader-text">Loading...</div> --}}
        </div>
    </div>

    <div id="page-content">
        <!-- header part start -->
        @include('frontend.layouts.navbar')
        <!-- header part end -->

        <!-- main area part start -->
        @yield('content')
        <!-- main area part end -->

        <!-- footer part start -->
        @include('frontend.layouts.footer')
        <!-- footer part end -->
    </div>

    <!-- JS here -->
    @include('frontend.layouts.scripts')
</body>



</html>
