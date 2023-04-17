<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="{{asset('inicio/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{asset('inicio/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link href="{{asset('inicio/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('inicio/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('inicio/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('inicio/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('inicio/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('inicio/assets/css/main.css')}}" rel="stylesheet">
  @yield('styles')
  <!-- =======================================================
  * Template Name: Logis
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{route('w_inicio')}}" class="logo d-flex align-items-center">
            <h1>Med</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
            <li><a href="{{route('w_inicio')}}" class="{{ (Route::currentRouteName() == 'w_inicio' ? 'active' : '')}}">Inicio </a></li>
            <li><a href="{{route('w_sobre_nosotros')}}" class="{{ (Route::currentRouteName() == 'w_sobre_nosotros' ? 'active' : '')}}">Sobre Nosotros</a></li>
            <li><a href="{{route('w_servicios')}}" class="{{ (Route::currentRouteName() == 'w_servicios' ? 'active' : '')}}">Servicios</a></li>
            {{-- <li><a href="#">Pricing</a></li> --}}
            {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
                </ul>
            </li> --}}
            <li><a href="{{route('w_contacto')}}" class="{{ (Route::currentRouteName() == 'w_contacto' ? 'active' : '')}}">Contacto</a></li>
            <li><a class="get-a-quote" href="{{route('login')}}">Iniciar Sesión</a></li>
            </ul>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <!-- End Header -->
    @yield('content')
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="{{route('w_inicio')}}" class="logo d-flex align-items-center">
                        <span>Medicare Plan</span>
                    </a>
                    <p>Mantenten informado en nuestras redes.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Enlaces útiles</h4>
                    <ul>
                        <li><a href="{{route('w_inicio')}}">Inicio</a></li>
                        <li><a href="{{route('w_sobre_nosotros')}}">Sobre Nosotros</a></li>
                        {{-- <li><a href="#">Services</a></li> --}}
                        <li><a>Terminos de Servicio</a></li>
                        <li><a>Política de privacidad</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Nuestros servicios</h4>
                    <ul>
                        <li><a href="{{route('w_servicios')}}">Consulta Médica</a></li>
                        <li><a href="{{route('w_servicios')}}">Estudios Clinicos</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contáctenos</h4>
                    <p>
                        Benjamin Constant 955 c/ Colon y Montevideo <br>
                        Asunción - Paraguay <br><br>
                        <strong>Telefono:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>

                </div>

            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>dev_dortiz</span></strong>. All Rights Reserved
            </div>
            <div class="credits">


            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{asset('inicio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('inicio/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('inicio/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('inicio/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('inicio/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('inicio/assets/vendor/php-email-form/validate.js')}}"></script>
    @yield('js')
    <!-- Template Main JS File -->
    <script src="{{asset('inicio/assets/js/main.js')}}"></script>

</body>

</html>
