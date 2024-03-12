<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>Jobby - Home</title>

    <!-- Favicon Icon -->
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{ asset('images/fav.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Stylesheets -->
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- Semantic Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/semantic/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>

    <!-- Header Start -->
    @include('frontend.tools.header')
    <!-- Header End -->

    <!-- Body Start -->
    @yield('frontend')
    <!-- Body End -->

    <!-- footer Start -->
    @include('serviceuser.tools.footer')
    <!-- footer End -->

    <!-- Scroll to Top Button Start -->
    <button onclick="topFunction()" id="pageup" title="Go to top"><i class="fas fa-arrow-up"></i></button>
    <!-- Scroll to Top Button End -->
    {{-- @yield('scripts') --}}

    <!-- Scripts js -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/OwlCarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/vendor/semantic/semantic.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom1.js') }}"></script>

    <script>
        window.oncontextmenu = function() {
            return false;
        }
        $(document).keydown(function(event) {
            if (event.keyCode == 123) {
                return false;
            } else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event
                    .shiftKey && event.keyCode == 74)) {
                return false;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
</body>

</html>
