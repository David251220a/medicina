<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicare Plan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('inicio/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

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
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Med</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#" class="active">Inicio</a></li>
          <li><a href="#">Sobre Nosotros</a></li>
          <li><a href="#">Servicios</a></li>
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
          <li><a href="#">Contacto</a></li>
          <li><a class="get-a-quote" href="{{route('login')}}">Iniciar Sesión</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2 data-aos="fade-up">Medicare Plan</h2>
            <p data-aos="fade-up" data-aos-delay="100">
                Nuestra misión es brindar atención médica de excelencia, compasiva y centrada en el paciente,
                utilizando tecnología de vanguardia y un enfoque holístico para mejorar la salud y el bienestar
                de nuestros pacientes en un entorno hospitalario seguro y acogedor
            </p>

            <form action="#" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
                <input type="text" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="{{ Storage::url('public/icono/equipo.jpg')}}" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                        <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
                    <div>
                        <h4 class="title">Servicios</h4>
                        <p class="description">Innovadores servicios médicos: diagnóstico, tratamiento, prevención y cuidado integral para pacientes en hospital de vanguardia.</p>
                        <a href="#" class="readmore stretched-link"><span>Leer Más</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex-shrink-0"> <i class="fas fa-user-md"></i></div>
                    <div>
                        <h4 class="title">Doctores</h4>
                        <p class="description">Expertos médicos con amplios conocimientos y experiencia brindando atención médica de calidad a los pacientes del centro medico.</p>
                        <a href="#" class="readmore stretched-link"><span>Leer Más</span><i class="bi bi-arrow-right"></i></a>
                    </div>
            </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon flex-shrink-0"><i class="fas fa-star-of-life"></i></div>
                    <div>
                        <h4 class="title">Estudios Medicos</h4>
                        <p class="description">Avanzados estudios médicos: diagnóstico preciso y tratamiento de vanguardia para la salud de nuestros pacientes en centro privado.</p>
                        <a href="#" class="readmore stretched-link"><span>Leer Más</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->
            </div>

        </section><!-- End Featured Services Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">

                <div class="col-lg-6 content order-last  order-lg-first">
                    <h3>Guía Medica</h3>
                    <p>
                        Solicite información para los días y horarios de atención dado que los mismos están sujetos a modificaciones.
                    </p>
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h5>Atención al Clinte</h5>
                                <p>0211454556</p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h5>Atención al Cliente - Estudios</h5>
                                <p>02544878778</p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h5>Soporte Técnico</h5>
                                <p>1235465447</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="service" class="services pt-0">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <span>Servicios Disponibles</span>
                    <h2>Servicios Disponibles</h2>
                </div>

                <div class="row gy-4">
                    @php
                        $delay = 100;
                    @endphp
                    @foreach ($servicios as $item)
                        @php
                            $delay += 100;
                        @endphp
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{strval($delay)}}">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{Storage::url($item->foto)}}" alt="" class="img-fluid mx-auto" style="width: 100%; height:auto">
                                </div>
                                <h3><a href="service-details.html" class="stretched-link">{{$item->descripcion}}</a></h3>
                            </div>
                        </div><!-- End Card Item -->
                    @endforeach

                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
            <span>Preguntas Frecuentes</span>
            <h2>Preguntas Frecuentes</h2>

            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-10">

                    <div class="accordion accordion-flush" id="faqlist">

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    ¿Cuáles son los costos de los servicios médicos en este centro médico?
                                </button>
                            </h3>
                        <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                Los costos de los servicios médicos pueden variar según el tipo de atención o tratamiento que necesite. Le recomendamos que se comunique
                                con nuestro personal de facturación o atención al cliente para obtener información detallada sobre los costos y opciones de pago.
                            </div>
                        </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                <i class="bi bi-question-circle question-icon"></i>
                                ¿Cuánto tiempo tomará el proceso de diagnóstico y tratamiento?
                            </button>
                        </h3>
                        <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                El tiempo de diagnóstico y tratamiento puede variar según la naturaleza y complejidad del problema de salud.
                                Nuestro equipo médico trabajará diligentemente para realizar un diagnóstico preciso y brindarle un plan de tratamiento adecuado.
                                Sin embargo, el tiempo exacto dependerá de la situación clínica específica.
                            </div>
                        </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                <i class="bi bi-question-circle question-icon"></i>
                                ¿Qué documentos o preparativos necesito antes de mi cita médica?
                            </button>
                        </h3>
                        <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                Para su cita médica, es posible que necesite traer una identificación válida, su tarjeta de seguro médico, una lista de medicamentos
                                que esté tomando actualmente y cualquier informe médico previo relevante. Le recomendamos que se comunique con nuestro personal de recepción
                                o consulte nuestro sitio web para obtener una lista completa de los documentos o preparativos necesarios para su cita.
                            </div>
                        </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                                <i class="bi bi-question-circle question-icon"></i>
                                ¿Cuál es la política de privacidad del centro médico en relación con mis datos médicos?
                            </button>
                        </h3>
                        <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                <i class="bi bi-question-circle question-icon"></i>
                                Sus datos médicos son tratados de manera confidencial y solo se comparten con el personal médico y administrativo necesario para su atención médica.
                                Para obtener más información sobre nuestra política de privacidad, puede consultar nuestra política de privacidad en nuestro sitio web o solicitarla
                                en la recepción del centro médico.
                            </div>
                        </div>
                    </div><!-- # Faq item-->
                </div>

            </div>
            </div>

        </div>
        </section><!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
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
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Nuestros servicios</h4>
                    <ul>
                        <li><a href="#">Consulta Médica</a></li>
                        <li><a href="#">Estudios Clinicos</a></li>
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

    <!-- Template Main JS File -->
    <script src="{{asset('inicio/assets/js/main.js')}}"></script>

</body>

</html>
