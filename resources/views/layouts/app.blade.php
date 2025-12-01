<!doctype html>
<html lang="en" class=" layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-skin="default" data-assets-path="{{ asset('') }}" data-template="vertical-menu-template-semi-dark" data-bs-theme="light">

<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template-semi-dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Apr 2025 07:56:53 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex" />
    <title>@yield('title', 'Default Title')</title>


    <meta name="description" content="Vuexy is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
    <!-- Canonical SEO -->
    <meta name="keywords" content="Vuexy bootstrap dashboard, vuexy bootstrap 5 dashboard, themeselection, html dashboard, web dashboard, frontend dashboard, responsive bootstrap theme" />
    <meta property="og:title" content="Vuexy bootstrap Dashboard by Pixinvent" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599" />
    <meta property="og:description" content="Vuexy is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
    <meta property="og:site_name" content="Pixinvent" />


    <!-- Favicon -->

    <link rel="icon" href="{{ asset('img/Fav_light.png') }}" media="(prefers-color-scheme: light)">
    <link rel="icon" href="{{ asset('img/Fav.png') }}" media="(prefers-color-scheme: dark)">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />
    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@$ICONS_VERSION/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}">
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <!-- endbuild -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }} " />
    <script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>
    {{-- <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script> --}}
    <script src="{{ asset('assets/js/config.js') }}"></script>
    
    @yield('head')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">

            <!-- Menu -->
            @include('backend.components.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('backend.components.navbar')
                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('container')
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>

    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
 
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    @yield('js')
  
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Default options Toastr
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: 3000,
                extendedTimeOut: 1000,
                showMethod: "fadeIn",
                hideMethod: "fadeOut"
            };

            // Tampilkan flash message
            @if(session('success'))
                toastr.success("{{ session('success') }}", "Success");
            @endif

            @if(session('error'))
                toastr.error("{{ session('error') }}", "Error");
            @endif
        });
        </script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
 
</body>
</html>


