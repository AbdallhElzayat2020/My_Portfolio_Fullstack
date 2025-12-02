<!DOCTYPE html>
<html lang="en">


@include('frontend.layouts.head')

<body>

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
