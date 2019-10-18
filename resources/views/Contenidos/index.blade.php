@extends('layouts.appBase') 
@section('content')

<div class="row">
    
    <div class="col-12">
        <div class="card">
            <div class="card-body little-profile text-center">
                <h3 class="m-b-0">Contenidos Home</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <!-- <img class="card-img-top" src="../assets/images/background/profile-bg.jpg" alt="Card image cap">-->
            <div class="card-body little-profile text-center">
                <h3 class="m-b-0">Crear</h3>

                <a
                    class="btn waves-effect waves-light btn-block btn-success"
                 {{--    href="{{ route('gotoPlantilla') }}" --}}
                >
                    <span>Crear Vacuna</span></a
                >
                <a class="btn waves-effect waves-light btn-block btn-success" href="{{ route('gotoPlantilla') }}"><span>Crear Beneficios</span></a>
                <a
                    class="btn waves-effect waves-light btn-block btn-success"
                 {{--    href="{{ route('gotoPlantilla') }}" --}}
                >
                    <span>Crear Consejos</span></a
                >
                <a
                    class="btn waves-effect waves-light btn-block btn-success"
                   {{--  href="{{ route('gotoPlantilla') }}" --}}
                >
                    <span>Crear Tareas</span></a
                >
                <a
                    class="btn waves-effect waves-light btn-block btn-success"
                {{--     href="{{ route('gotoPlantilla') }}" --}}
                >
                    <span>Crear Temas</span></a
                >
            </div>
        </div>

    </div>

    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                
                <h6 class="card-subtitle">Mostrar Solo:</h6>

                <div class="dt-buttons">
                    <ul>
                        <li class="btn">
                            <a href="#" tabindex="0" class="all dt-button">Todos</a>
                        </li>
                        <li class="btn">
                            <a href="#" tabindex="0" class="dt-button">beneficio</a>
                        </li>
                        <li class="btn">
                            <a href="#" tabindex="0" class="dt-button">Consejos</a>
                        </li>
                        <li class="btn">
                            <a href="#" tabindex="0" class="dt-button">Temas</a>
                        </li>
                        <li class="btn">
                            <a href="#" tabindex="0" class="dt-button">Temas</a>
                        </li>
                    </ul>

                </div>

                <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <table id="tablaContenido" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >
                                    id
                                </th>
                                <th class="sorting"tabindex="0"aria-controls="example23"rowspan="1"colspan="1"aria-label="Position: activate to sort column ascending">
                                    Tipo Contenido
                                </th>
                                <th class="sorting"tabindex="0"aria-controls="example23"rowspan="1"colspan="1"aria-label="Office: activate to sort column ascending">Titulo</th>

                                <th class="sorting"tabindex="0"aria-controls="example23"rowspan="1"colspan="1"aria-label="Age: activate to sort column ascending"style="width: 60px;">
                                    Periodo
                                </th>
                                <th class="sorting"tabindex="0"aria-controls="example23"rowspan="1"colspan="1"aria-label="Start date: activate to sort column ascending"style="width: 128px;">
                                    Subperiodo
                                </th>
                                 
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                                @foreach($content as $item)
                                <tr class="item{{$item->id}}">
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->tipo_contenido}}</td>
                                    <td>{{$item->imagen_principal_titulo}}</td>
                                    <td>{{$item->periodo}}</td>
                                    @if($item->subperiodo)
                                    <td>{{$item->subperiodo}}</td>
                                    @else
                                <td></td>
                                @endif
                                    <td>

                                        <a class="edit-modal btn btn-info">
                                            <span
                                                class="fa fa-edit" tooltip="dsadsadsadsad"
                                            ></span>
                                        </a>
                                        <a class="delete-modal btn btn-succes">
                                                <span class="fa fa-power-off"></span>
                                        </a>
                                        <a class="delete-modal btn btn-danger">
                                            <span
                                                class="fa  fa-trash-o"
                                            ></span>

                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

</div>

@endsection 
@push('css') @endpush 
@push('js') @endpush
