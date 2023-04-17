@extends('layouts.www')

@section('title', 'Med - Sobre Nosotros')


@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('/storage/icono/equipo.jpg');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Sobre Nosotros</h2>
                            <p>
                                Nuestra misión es brindar atención médica de excelencia, compasiva y centrada en el paciente,
                                utilizando tecnología de vanguardia y un enfoque holístico para mejorar la salud y el bienestar de nuestros
                                pacientes en un entorno hospitalario seguro y acogedor
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{route('w_inicio')}}">Inicio</a></li>
                        <li>Sobre Nosotros</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">
                    <div class="col-lg-6 content order-last  order-lg-first">
                        <h3>Misión</h3>
                        <p>
                            Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae
                            quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.
                        </p>
                    </div>

                    <div class="col-lg-6 content order-last  order-lg-first">
                        <h3>Visión</h3>
                        <p>
                            Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae
                            quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us Section -->

    </main>
    <!-- End #main -->
@endsection
