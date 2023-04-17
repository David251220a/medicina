@extends('layouts.www')

@section('title', 'Med')


@section('content')

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
                                <h3><a href="#" class="stretched-link">{{$item->descripcion}}</a></h3>
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

    </main>
    <!-- End #main -->

@endsection
