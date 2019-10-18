@extends('layouts.appBase') @section('content')

 <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Sub Periodos</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item"><a  href="{{route('periodos')}}">Periodos</a></li>
                <li class="breadcrumb-item active">Sub Periodos</li>

            </ol>
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
       <div class="card">
            <div class="card-body little-profile text-center">
                <h3 class="m-b-0">Subperiodos De <a style="color:#f56e0a">{{$periodo->nombre}}</a></h3>
                @foreach ($periodo->rangos as $perio)
                <input type="text" style="display: block;" id="ininioPeriodo" name="ininioPeriodo" value="{{$perio->inicio}}"/>
                <input type="text" style="display: block;"  id="finPeriodo" name="finPeriodo" value="{{$perio->fin}}"/>
                 @endforeach
            </div>
        </div>
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

        <!-- Column -->
        <div class="card">
                <div class="card-body">
                        <h4 class="card-title">Crear Sub-Periodo</h4>

                        <h6 class="card-subtitle">
                           Ingresa todos los datos del formulario para crear un nuevo Sub Periodo
                        </h6>

                        <form class="form-horizontal p-t-20" method="POST"  action="{{ route('crearSubperiodo') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Nombre</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="ti-world"></i>
                                        </div>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="nombre"
                                            placeholder="Ingresa un nombre "
                                            name="nombre"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="inputPassword4"
                                    class="col-sm-3 control-label"
                                    >Unidad</label
                                >
                                <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="ti-world"></i>
                                            </div>
                                            <select class="form-control custom-select " data-placeholder="Selecciona Unidad de rango" tabindex="1" name="divunidad"  id="divunidad">
                                                <option value="" selected="selected">Seleccione Unidad</option>
                                                <option value="semana">Semana</option>
                                                <option value="mes">Mes</option>
                                                <option value="año">Año</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="inputPassword5"
                                    class="col-sm-3 control-label"
                                    >Rango</label>
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

                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="ti-world"></i>
                                                </div>
                                                <input
                                                    type="hidden"
                                                    class="form-control"
                                                    id="id_periodo"
                                                    name="id_periodo"
                                                    value="{{$periodo->id}}"/>
                                            </div>
                                        </div>
                                    </div>
                            <div class="form-group row" style="display: none;">

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="ti-world"></i>
                                            </div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="inicio"
                                                placeholder="Texto por defecto"
                                                name="inicio"/>
                                        </div>
                                    </div>
                                </div>

                            <div class="form-group row" style="display: none;">
                                    {{-- <label for="exampleInputEmail3" class="col-sm-3 control-label">Nombre Periodo</label> --}}
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="ti-world"></i>
                                            </div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="fin"
                                                name="fin"/>
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group row m-b-0">
                                <div class="offset-sm-3 col-sm-9">
                                    <button style="background:#f56e0a ; border:#f56e0a"
                                        type="submit"
                                        class="btn btn-info waves-effect waves-light">
                                        Guardar
                                    </button>
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
                    <table
                    id="tableSubPeriodos"
                    class="display nowrap table table-hover table-striped table-bordered dataTable"
                    cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th
                                class="sorting_asc"
                                tabindex="0"
                                aria-controls="example23"
                                rowspan="1"
                                colspan="1"
                                aria-sort="ascending"
                                aria-label="Name: activate to sort column descending"
                                {{--
                                style="width: 196px;"
                                --}}>
                                id
                            </th>
                            <th
                                class="sorting"
                                tabindex="0"
                                aria-controls="example23"
                                rowspan="1"
                                colspan="1"
                                aria-label="Position: activate to sort column ascending"
                                {{--
                                style="width: 298px;"
                                --}}
                            >
                            Nombre
                            </th>

                            <th>
                            Acciones
                            </th>

                        </tr>
                    </thead>

                    <tbody>


                      @foreach($subperiodo as $item)
                            <tr class="item{{$item->id}}">

                                <td>{{$item->id}}</td>
                                 <td>{{$item->nombre}}</td>
                                <td>
                                        <form method="POST">
                                            @csrf
                                            <a class="edit-modal btn btn-info" data-toggle="tooltip" data-original-title="Editar" onclick="editarSubPeriodo({{$item}})" value="Editar">
                                                <span class="fa fa-edit" style="color:white"></span>
                                            </a>
                                            <button class="delete-modal btn btn-danger" data-toggle="tooltip" data-original-title="Eliminar" type="submit" name="action"  value="Eliminar">
                                                <span class="fa  fa-trash-o"></span>
                                            </button>
                                              </form>
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

var tablePeriodos = $('#tableSubPeriodos').DataTable({
            "data": null,
            ordering: true,
            paging: true,
            "language": {
                /* "zeroRecords": "No se encontró datos asociados", //changes words used
                   "lengthMenu": "Mostrar_MENU_ Registros por página", //changes words used
                   "info": "&raquo; Mostrando _START_ de _END_ of _TOTAL_ Registros", //changes words used */
                /*  "search": "Buscar", //changes words used originally - Search programs: */
                /*  "searchPlaceholder": "Ingresa una palabra", */
                /* "infoFiltered": "(filtered from _MAX_ total programs)" */

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


        //en la pagina periodos , con el combo semanas oculto o muestro slides de rangos y agrego valores de inicio y fin por defecto
        $("#divunidad").change(function() {

            if ($("#divunidad option:selected").val() == "semana") {
                $("#divsemanas").show();
                $("#divmeses").hide();
                $("#divanos").hide();

                $('#inicio').val(0);
                $('#fin').val(40);

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

        var $range_semanas = $("#range_semanas");
        $range_semanas.ionRangeSlider({
            type: "double",
            grid: true,
            min: $('#ininioPeriodo').val(),
            max: $('#finPeriodo').val(),
            prefix: "semana ",

            onStart: function(data) {
            },
            onChange: function(data) {
                console.log(data);
            },
        });
        /*  $range_semanas.update({
         from: 0,
         to: 40
        }); */
        $range_semanas.on("change", function() {
            var $inp = $(this);
            var v = $inp.prop("value"); // input value in format FROM;TO
            var from = $inp.data("from"); // input data-from attribute
            var to = $inp.data("to"); // input data-to attribute
            $('#inicio').val(from);
            $('#fin').val(to); // all values
        });

        $("#range_meses").ionRangeSlider({
            type: "double",
            grid: true,
            min: 0,
            max: 108,
            /*   from: 200,
              to: 800, */
            prefix: "mes "
        });

        $("#range_anos").ionRangeSlider({
            type: "double",
            grid: true,
            min: 0,
            max: 9,
            /*  from: 200,
             to: 800, */
            prefix: "año "
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

    function editarSubPeriodo(data) {







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
        if (data.unidad == "semana") {
            $("#divsemanas").show();
            $("#divmeses").hide();
            $("#divanos").hide();
            $('#inicio').val(inicio);
            $('#fin').val(fin);
            var $range_semanas = $("#range_semanas");

            /*  range_semanas.destroy(); */
            $range_semanas.ionRangeSlider({
                type: "double",
                grid: true,
                min: 0,
                max: 40,
                prefix: "semana ",
                from: inicio,
                to: fin,
            });

        } else if (data.unidad == "mes") {
            $("#divsemanas").hide();
            $("#divmeses").show();
            $("#divanos").hide();
            $('#inicio').val(inicio);
            $('#fin').val(fin);
        } else if (data.unidad == "año") {
            $("#divsemanas").hide();
            $("#divmeses").hide();
            $("#divanos").show();
            $('#inicio').val(inicio);
            $('#fin').val(fin);
        }

        //se configura el input file--falta terminar
        console.log(data.url_imagen);
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

    }
</script>


@endpush
