@extends('layouts.admin')

@section('styles')
    <link href="{{asset('assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="layout-px-spacing">
        <div class="row">
            <div class="col-12">
                <h5 class="mt-3 mb-4">Agenda Consulta</h5>
            </div>

        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-4">
                <form action="" method="get">
                    <div class="search-input-group-style input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="submit" style="padding: 0px; margin: 0px;" class="btn btn-primary">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search..."
                        aria-label="Username" aria-describedby="basic-addon1" value="{{( empty($search) ? '' : $search)}}">
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach ($especialidad as $item)
                <div id="card_3" class="col-xl-3 col-lg-3 col-md-3 col-sm-4 layout-spacing">
                    <div class="">
                        <div class="card component-card_2">
                            <img src="{{Storage::url($item->foto)}}" class="card-img-top" alt="widget-card-2">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center">{{$item->descripcion}}</h5>
                                @can('agenda_consulta.especialidad')
                                    <a href="{{route('agenda_consulta.especialidad', $item)}}" class="btn btn-primary form-control" style="margin: 10px 0 0 0;">Agendar</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('js')

@endsection
