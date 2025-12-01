<!DOCTYPE html>
<html lang="eng">
<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="HTML5 Template Andrew Multi-Purpose themeforest">
    <meta name="description" content="Andrew - Multi-Purpose HTML5 Template">
    <meta name="author" content="">

    <!-- Title  -->
    <title>Asep Surya Somantri</title>

    <!-- Favicon -->
    <!-- Favicon for LIGHT MODE -->
    <link rel="icon" href="{{ asset('img/Fav_light.png') }}" media="(prefers-color-scheme: light)">

    <!-- Favicon for DARK MODE -->
    <link rel="icon" href="{{ asset('img/Fav.png') }}" media="(prefers-color-scheme: dark)">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
       <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
      
        <style>
    #particles-js {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1; /* supaya di belakang semua */
    }

   
</style>

       
</head>

<body>

       <div id="particles-js"></div>

    <!-- ==================== Start Loading ==================== -->

    <div class="loader-wrap">
        <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
            <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
        </svg>

        <div class="loader-wrap-heading">
            <div class="load-text">
                <span>A</span>
                <span>S</span>
                <span>E</span>
                <span>P</span>
                <span></span>
                <span>S</span>
                <span>U</span>
                <span>R</span>
                <span>Y</span>
                <span>A</span>       
            </div>
        </div>
    </div>

    <!-- ==================== End Loading ==================== -->


    <div class="cursor"></div>


    <!-- ==================== Start progress-scroll-button ==================== -->

    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- ==================== End progress-scroll-button ==================== -->



    <!-- ==================== Start Navbar ==================== -->

    @include('elements.header')

    <!-- ==================== End Navbar ==================== -->


    <main class="pt-80">
   
        <!-- ==================== Start Hero ==================== -->
       @yield('container')
        <!-- ==================== End Hero ==================== -->
    </main>


    <!-- ==================== Start Footer ==================== -->

    <footer>
        <div class="container pb-30 pt-30 bord-thin-top">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <p class="fz-13">
                            &copy; {{ date('Y') }} Asep Surya Somantri. All rights reserved.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ==================== End Footer ==================== -->



    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.4.0.min.js') }}"></script>

    <!-- plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- custom scripts -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    @yield('js')
</body>
  <!-- PARTICLE CONFIG -->
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 85, "density": { "enable": true, "value_area": 800 }},
                "color": { "value": "#ffffff" },
                "shape": { "type": "circle" },
                "opacity": { "value": 0.15, "random": true },
                "size": { "value": 3, "random": true },
                "line_linked": {
                    "enable": true,
                    "distance": 130,
                    "color": "#ffffff",
                    "opacity": 0.12,
                    "width": 1
                },
                "move": { "enable": true, "speed": 1.2, "direction": "none", "out_mode": "bounce" }
            },
            "interactivity": {
                "events": { "onhover": { "enable": true, "mode": "grab" } }
            },
            "retina_detect": true
        });
    </script>


</html>