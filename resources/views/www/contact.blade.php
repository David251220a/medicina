@extends('layouts.www')

@section('title', 'Med - Contacto')


@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('storage/icono/equipo.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                      <h2>Contáctanos</h2>
                        {{-- <p>
                            Benjamin Constant 955 c/ Colon y Montevideo
                            <br>
                            Asunción - Paraguay
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{route('w_inicio')}}">Inicio</a></li>
                    <li>Contacto</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div>
                <iframe style="border:0; width: 100%; height: 340px;"
                    {{-- src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen> --}}
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.8043674010883!2d-57.642287823655636!3d-25.277165626863997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945da78b6ed8125d%3A0x378dde5fd35011a1!2sCaja%20De%20Jubilaciones%20y%20Pensiones%20del%20Personal%20Municipal!5e0!3m2!1ses!2spy!4v1681737392250!5m2!1ses!2spy">
                </iframe>
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.8043674010883!2d-57.642287823655636!3d-25.277165626863997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945da78b6ed8125d%3A0x378dde5fd35011a1!2sCaja%20De%20Jubilaciones%20y%20Pensiones%20del%20Personal%20Municipal!5e0!3m2!1ses!2spy!4v1681737392250!5m2!1ses!2spy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
            </div><!-- End Google Maps -->

            <div class="row gy-4 mt-4">

                <div class="col-lg-4">

                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Ubicación:</h4>
                            <p>Benjamin Constant 955 c/ Colon y Montevideo</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Celular:</h4>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div><!-- End Info Item -->
                </div>

                <div class="col-lg-8">
                    <form action="#" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Tu Nombre" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Tu Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
                    </form>
                </div><!-- End Contact Form -->
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
</main>
<!-- End #main -->

@endsection
