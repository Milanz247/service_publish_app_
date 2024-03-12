<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <base href="/public">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="">
    <meta name="keywords"
        content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5, bootstrap 5 admin template, job board admin, job portal admin, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, frontend">
    <meta name="description"
        content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
    <meta property="og:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
    <meta property="og:description"
        content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
    <meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <meta name="twitter:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
    <meta name="twitter:description"
        content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
    <meta name="twitter:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
    <meta name="twitter:card" content="summary_large_image">


    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title -->
    <title>Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">

    <!-- All StyleSheet -->
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- Globle CSS -->
    <link class="main-css" href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>


    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">





        <!--**********************************
            Nav header start
        ***********************************-->
        @include('admin.tools.nav_header')
        <!--**********************************
            Nav header end
        ***********************************-->






        <!--**********************************
            Header start
        ***********************************-->
        @include('admin.tools.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->




        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.tools.Sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @yield('admin')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.tools.footer')
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************

 Scripts
 @yield('script')
***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>

    <script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>

    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/responsive/responsive.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function JobickCarousel() {
            /*  testimonial one function by = owl.carousel.js */
            jQuery('.front-view-slider').owlCarousel({
                loop: false,
                margin: 30,
                nav: false,
                autoplaySpeed: 3000,
                navSpeed: 3000,
                autoWidth: true,
                paginationSpeed: 3000,
                slideSpeed: 3000,
                smartSpeed: 3000,
                autoplay: false,
                animateOut: 'fadeOut',
                dots: false,
                navText: ['', ''],
                responsive: {
                    0: {
                        items: 1,

                        margin: 10
                    },

                    480: {
                        items: 1
                    },

                    767: {
                        items: 3
                    },
                    1750: {
                        items: 3
                    }
                }
            })
        }
        jQuery(window).on('load', function() {
            setTimeout(function() {
                JobickCarousel();
            }, 1000);
        });
    </script>

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
