@extends('layouts.appBase') @section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"> Periodos</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"> Periodos</li>
        </ul>
    </div>

    <div class="col-md-7 col-4 align-self-center">
        <div class="d-flex m-t-10 justify-content-end">
            <div class="">
                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif @if(Session::has('success'))
        <div class="alert alert-info alert-dismissible fade show">
            {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>

    <div class="col-lg-5 col-xlg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" id="tituloCrearEditar">Crear Periodo</h4>
                <div id="">
                    <button style="background:#f56e0a ; border:#f56e0a" id="btncrear" name="action" onclick="nuevoPeriodo()" value="Nuevo Periodo" class="btn btn-info waves-effect waves-light">
                        <i class="fa fa-plus"></i> Nuevo Periodo
                    </button>
                </div>
                {{--
                <h6 class="card-subtitle">
                           Ingresa todos los datos del formulario para crear un nuevo Periodo
                        </h6> --}}

                <form class="form-horizontal p-t-20" method="POST" enctype="multipart/form-data" action="{{ route('crearPeriodo') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Nombre Periodo</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ti-world"></i>
                                </div>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingresa un nombre " name="nombre"  value="{{old('nombre')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">URL imagen</label>
                        <div class="col-sm-9">

                            {{--
                            <div class="input-group-addon">
                                <i class="ti-world"></i>
                            </div> --}}
                            <input id="url_imagen" type="file" class="form-control " name="url_imagen" data-height="100" value="{{old('url_imagen')}}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Tipo periodo</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ti-world"></i>
                                </div>
                                <select class="form-control custom-select" data-placeholder="Selecciona Tipo periodo" tabindex="1" name="tipo_periodo" id="tipo_periodo" value="{{old('tipo_periodo')}}">
                                    <option value="" selected="selected">Seleccione Tipo periodo</option>
                                    <option value="crecimiento">Crecimiento</option>
                                    <option value="control">Control</option>
                                    <option value="vacunas">Vacunas</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Unidad</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ti-world"></i>
                                </div>
                                <select class="form-control custom-select " data-placeholder="Selecciona Unidad de rango" tabindex="1" name="divunidad" id="divunidad" >
                                    <option value="" selected="selected">Seleccione Unidad</option>
                                    <option value="semana">Semana</option>
                                    <option value="mes">Mes</option>
                                    <option value="año">Año</option>

                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword5" class="col-sm-3 control-label">Rango</label>
                        <div class="col-sm-9">
                            <div class="row" id="divsemanas" style="display: none;">
                                <div class="col-md-12">

                                    <div id="range_semanas"></div>
                                </div>
                            </div>
                            <div class="row" id="divmeses" style="display: none;">
                                <div class="col-md-12">
                                    <div id="range_meses"></div>
                                </div>
                            </div>
                            <div class="row" id="divanos" style="display: none;">
                                <div class="col-md-12">
                                    <div id="range_anos"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" style="display: none;">
                        {{--
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Nombre Periodo</label> --}}
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ti-world"></i>
                                </div>
                                <input type="text" class="form-control" id="inicio" placeholder="Texto por defecto" name="inicio" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" style="display: none;">
                        {{--
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Nombre Periodo</label> --}}
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ti-world"></i>
                                </div>
                                <input type="text" class="form-control" id="fin" name="fin" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" style="display: none;">
                        {{--
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Nombre Periodo</label> --}}
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ti-world"></i>
                                </div>
                                <input type="hidden" class="form-control" id="id_periodo" name="id_periodo" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <div id="divbtncrear">
                                <button style="background:#f56e0a ; border:#f56e0a" id="btncrear" name="action" type="submit" value="Guardar" class="btn btn-info waves-effect waves-light">
                                    Guardar
                                </button>
                            </div>

                            <div id="divbtneditar" style="display: none;">
                                <button style="background:#f56e0a ; border:#f56e0a" id="btneditar" name="action" value="Editar" type="submit" class="btn btn-info waves-effect waves-light">
                                    Editar
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-7 col-xlg-8 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabla resultado </h4>
                <h6 class="card-subtitle">Mostrar Solo:</h6>
                <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                </div>
                <table id="tablePeriodos" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" {{-- style="width: 196px;" --}}>
                                id
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" {{-- style="width: 298px;" --}}>
                                Nombre
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" {{-- style="width: 146px;" --}}>
                                Tipo Periodo
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" {{-- style="width: 60px;" --}}>
                                unidad
                            </th>
                            <th>
                                Acciones
                            </th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($period as $item)
                        <tr class="item{{$item->id}}">
                            <td>{{$item->id}}</td>
                            <td>{{$item->nombre}}</td>
                            {{--
                            <td>{{$item->url_imagen}}</td> --}}
                            <td>{{$item->tipo_periodo}}</td>
                            <td>{{$item->unidad}}</td>
                            <td>
                                <form method="POST" action="{{ route('accionesPeriodo',$item->id) }} ">
                                    @csrf
                                    {{--    
                                    <a class="edit-modal btn btn-info" data-toggle="tooltip" data-original-title="Editar" onclick="editarPeriodo({{$item}})" value="Editar">
                                        <span class="fa fa-edit" style="color:white"></span>
                                    </a> 
                                    --}}

                                    <a class="edit-modal btn btn-info" data-toggle="tooltip" data-original-title="Editar"  value="{{$item}}" id="{{$item->id}}">
                                        <span class="fa fa-edit" style="color:white"></span>
                                    </a>
                                    {{-- descomentar cuandoexista el campo estado en la base de datos --}} {{-- @if($item->estado=="0")
                                    <button class="delete-modal btn btn-secondary" data-toggle="tooltip" data-original-title="Habilitar" type="submit" name="action" value="Habilitar">
                                        <span class="fa fa-power-off"></span>
                                    </button>
                                    @endif @if($item->estado=="0")

                                    <button class="delete-modal btn btn-success" data-toggle="tooltip" data-original-title="Habilitar" type="submit" name="action" value="Habilitar">
                                        <span class="fa fa-power-off"></span>
                                    </button>
                                    @endif --}}

                                    <button class="delete-modal btn btn-danger" data-toggle="tooltip" data-original-title="Eliminar" type="submit" name="action" value="Eliminar">
                                        <span class="fa  fa-trash-o"></span>
                                    </button>
                                    <button class="delete-modal btn btn btn-warning" data-toggle="tooltip" data-original-title="Subperiodos" name="action" value="Subperiodos" href="{{ route ('gotosubperiodos')}}">
                                        <span class="fa  fa-dot-circle-o"></span>
                                    </button>

                                </form>

                                {{-- class="btn waves-effect waves-light btn-block btn-success" href="{{ route('gotoPlantilla') }}" >
                                <span>Crear Vacuna</span></a> --}}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
@endsection @push('css') @endpush @push('js')
<script>
    $(document).ready(function() {

        var tablePeriodos = $('#tablePeriodos').DataTable({
            "data": null,
            ordering: true,
            paging: true,
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }

        });

        $("#range_semanas").ionRangeSlider({
            type: "double",
            grid: true,
            min:0,
            max: 400,
            prefix: "semana ",
            onStart: function(data) {},
            onChange: function(data)
            {
                $('#inicio').val(data.from);
                $('#fin').val(data.to);
            },
            onUpdate: function (data) {},
        });
        
        // Saving it's instance to var
        var range_semanas = $("#range_semanas").data("ionRangeSlider");
        range_semanas.reset();

        $("#range_meses").ionRangeSlider({
            type: "double",
            grid: true,
            min:  $('#inicio').val(),
            max:  $('#fin').val(),
            prefix: "mes ",
            onStart: function(data) {},
            onChange: function(data)
            {
                $('#inicio').val(data.from);
                $('#fin').val(data.to);
            },
            onUpdate: function (data) { },
        });

        var range_meses =$("#range_meses").data("ionRangeSlider");
        range_meses.reset();

        $("#range_anos").ionRangeSlider({
            type: "double",
            grid: true,
            min: 0,
            max: 9,
            prefix: "año ",
            onStart: function(data) {},
            onChange: function(data) {
                console.log(data);
            },
        });

        var range_anos = $("#range_anos").data("ionRangeSlider");
        range_anos.reset();

        //en la pagina periodos , con el combo semanas oculto o muestro slides de rangos y agrego valores de inicio y fin por defecto
        $("#divunidad").change(function() {

            if ($("#divunidad option:selected").val() == "semana") {
                $("#divsemanas").show();
                $("#divmeses").hide();
                $("#divanos").hide();


            } else if ($("#divunidad option:selected").val() == "mes") {
                $("#divsemanas").hide();
                $("#divmeses").show();
                $("#divanos").hide();
                $('#inicio').val(0);
                $('#fin').val(108);
            } else if ($("#divunidad option:selected").val() == "año") {
                $("#divsemanas").hide();
                $("#divmeses").hide();
                $("#divanos").show();
                $('#inicio').val(0);
                $('#fin').val(9);
            }

        });

        $('td').on('click', 'a.edit-modal', function() {
            var data=$(this).attr('value');
            data=JSON.parse(data);

            $('#divbtncrear').hide();
            $('#divbtneditar').show();
            $('#tituloCrearEditar').text("Editar Periodo");
            $('#nombre').val(data.nombre);
            $('#tipo_periodo').val(data.tipo_periodo);
            $('#divunidad').val(data.unidad);
            $('#id_periodo').val(data.id);

            //se setea los rangos
            var inicio;
            var fin;
            jQuery.each(data.rango, function(i, val) {
                inicio = val.inicio;
                fin = val.fin;
            });
            $('#inicio').val(inicio);
            $('#fin').val(fin);
            if (data.unidad == "semana") {

                $("#divsemanas").show();
                $("#divmeses").hide();
                $("#divanos").hide();
                range_semanas.update({ fron:$('#inicio').val(), to: $('#fin').val(),});
                range_semanas.reset();

            } else if (data.unidad == "mes") {
                $("#divsemanas").hide();
                $("#divmeses").show();
                $("#divanos").hide();
                var $range_meses = $("#range_meses");
                $("#range_meses").ionRangeSlider({
                    type: "double",
                    grid: true,
                    min: 0,
                    max: 108,
                    from: inicio,
                    to: fin,
                    prefix: "mes "
                });

            } else if (data.unidad == "año") {
                $("#divsemanas").hide();
                $("#divmeses").hide();
                $("#divanos").show();
            }

            //se configura el input file--falta terminar
            /*   console.log(data.url_imagen); */
            var imagenUrl = "";
            var drEvent = $('#url_imagen').dropify({
            /*   defaultFile:'data:image/png;base64,'+ data.url_imagen */
            });
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
            drEvent.settings.defaultFile = 'data:image/png;base64,' + data.url_imagen;
            drEvent.destroy();
            drEvent.init();
        });

        $('#url_imagen').dropify({
            "messages": {
                default: 'Arrastre un archivo o haga clic aquí',
                replace: 'Arrastre un archivo o haga clic en reemplazar',
                remove: 'Eliminar',
                error: 'Lo sentimos, el archivo demasiado grande'
            }
        });

    });

    function nuevoPeriodo() {
        $('#divbtncrear').show();
        $('#divbtneditar').hide();
        $('#tituloCrearEditar').text("Crear Periodo");
        $('#nombre').val("");
        $('#tipo_periodo').val("");
        $('#divunidad').val("");
        $('#url_imagen').val("");
        $('#inicio').val("");
        $('#fin').val("");
        $("#divsemanas").hide();
        $("#divmeses").hide();
        $("#divanos").hide();
        var drEvent = $('#url_imagen').dropify();
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        /*    drEvent.destroy();
        drEvent.init(); */
    }

    function editarPeriodo(data) {

    }


    function dateToTS (date) {
        return date.valueOf();
    }



</script>
@endpush
