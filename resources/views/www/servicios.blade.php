@extends('layouts.www')

@section('title', 'Med - Servicios')


@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('/storage/icono/equipo.jpg');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Servicios</h2>
                            <p>
                                Innovadores servicios médicos: diagnóstico, tratamiento, prevención y cuidado integral para pacientes en hospital de vanguardia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{route('w_inicio')}}">Inicio</a></li>
                        <li>Servicios</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Services Section ======= -->
        <section id="service" class="services pt-0">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    {{-- <span>Servicios Disponibles</span> --}}
                    <h2>Servicios Medicos</h2>
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
                                <h3><a class="stretched-link">{{$item->descripcion}}</a></h3>
                            </div>
                        </div><!-- End Card Item -->
                    @endforeach

                </div>
            </div>
        </section><!-- End Services Section -->


        <section id="service" class="services pt-0">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    {{-- <span>Servicios Disponibles</span> --}}
                    <h2>Estudios Medicos</h2>
                </div>

                <div class="row gy-4">
                    @php
                        $delay = 100;
                    @endphp
                    @foreach ($estudios as $item)
                        @php
                            $delay += 100;
                        @endphp
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{strval($delay)}}">
                            <div class="card">
                                {{-- <div class="card-img">
                                    <img src="{{Storage::url($item->foto)}}" alt="" class="img-fluid mx-auto" style="width: 100%; height:auto">
                                </div> --}}
                                <h3><a class="stretched-link">{{$item->descripcion}}</a></h3>
                            </div>
                        </div><!-- End Card Item -->
                    @endforeach

                </div>
            </div>
        </section><!-- End Services Section -->


    </main>
    <!-- End #main -->
@endsection
