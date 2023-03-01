<div>
    @include('ui.titulo')

    <div class="row layout-spacing">
        <div class="col-lg-12">

            <div class="row">

                @include('ui.busqueda')
                @include('ui.agregar')

            </div>

            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">

                        @include('ui.mostrar')

                        @if (count($data) > 0)

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column text-center"> N#</th>
                                        <th class="text-left">Nombre</th>
                                        <th>Preferido</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center dt-no-sorting">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="checkbox-column text-center"> {{$loop->iteration}} </td>
                                            <td>{{$item->descripcion}}</td>
                                            <td>{{($item->preferido == 0 ? 'NO' : 'SI')}}</td>
                                            <td class="text-center text-success">
                                                {{$item->estado->descripcion}}
                                            </td>
                                            <td class="text-center">
                                                <ul class="table-controls">
                                                    <li>
                                                        <a wire:click="editar({{$item}})" class="bs-tooltip px-2" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Editar">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>

                                                        <a wire:click="$emit('eliminar', {{$item->id}})" class="bs-tooltip" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Eliminar">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        @else
                            <h4 class="text-center">No existe Pais</h4>
                        @endif

                    </div>
                </div>
            </div>

            @include('ui.paginado')

            @include('pais.modal')
        </div>
    </div>

</div>
