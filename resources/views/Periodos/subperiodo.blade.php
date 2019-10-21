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
                <input type="hidden" style="display: block;" id="ininioPeriodo" name="ininioPeriodo" value="{{$perio->inicio}}"/>
                <input type="hidden" style="display: block;"  id="finPeriodo" name="finPeriodo" value="{{$perio->fin}}"/>
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
                       
                        <h4 class="card-title" id="tituloCrearEditar">Crear Sub-Periodo</h4>
                        <div id="btncrear">
                 {{--            <button style="background:#f56e0a ; border:#f56e0a" id="btncrear" name="action" onclick="nuevoPeriodo()" value="Nuevo Sub-Periodo" class="btn btn-info waves-effect waves-light">
                                <i class="fa fa-plus"></i> Nuevo Sub-Periodo
                            </button> --}}
                            <a  style="background:#f56e0a ; border:#f56e0a ;color:#ffffff"  name="action" value="Nuevo Sub-Periodo" class="bclasscrear btn btn-info waves-effect waves-light">
                                    <i class="fa fa-plus" ></i> Nuevo Sub-Periodo 
                                </a >

                          {{--   <a class="edit-modal btn btn-info" data-toggle="tooltip" data-original-title="Editar" style="font-family: Poppins, sans-serif;" >
                                    <i class="fa fa-plus"></i> Nuevo Sub-Periodo
                                </a> --}}
                        </div>
                     {{--    <h6 class="card-subtitle">
                           Ingresa todos los datos del formulario para crear un nuevo Sub Periodo
                        </h6> --}}

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

                                        <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="ti-world"></i>
                                                    </div>
                                                    <input type="hidden" class="form-control" id="id_rango" name="id_rango" />
                    
                                                </div>
                                            </div>

                                            <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="ti-world"></i>
                                                        </div>
                                                        <input type="hidden" class="form-control" id="id_subperiodo" name="id_subperiodo" />
                        
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
                                    Unidad
                                    </th>
                          
                            <th>
                                    Rango
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
                                 <td>{{$item->unidad}}</td>


                           {{--  @if($item->inicio==$item->fin){<td>{{$item->inicio}}</td>}
                            @else{ <td>{{$item->inicio}} -{{$item->fin}}</td> --}}
                            <td>{{$item->inicio}} -{{$item->fin}}</td>
                                
                                <td>
                                        <form method="POST">
                                            @csrf
                                          {{--   <a class="edit-modal btn btn-info" data-toggle="tooltip" data-original-title="Editar" onclick="editarSubPeriodo({{$item}})" value="Editar">
                                                <span class="fa fa-edit" style="color:white"></span>
                                            </a> --}}


                                            <a class="edit-modal btn btn-info" data-toggle="tooltip" data-original-title="Editar" value="{{$item}}" id="{{$item->id}}">
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
      
        $("#range_semanas").ionRangeSlider({
            type: "double",
            grid: true,
            min: $("#ininioPeriodo").val(),
            max:  $("#finPeriodo").val(),
          /*   from:0,
            to:400, */
            prefix: "semana ",
            onStart: function(data) {
                $('#inicio').val(data.min);
                $('#fin').val(data.max);
            },
            onChange: function(data) {
                $('#inicio').val(data.from);
                $('#fin').val(data.to);
            },
            onUpdate: function(data) {},
        });

        // Saving it's instance to var
        var range_semanas = $("#range_semanas").data("ionRangeSlider");
        range_semanas.reset();

        $("#range_meses").ionRangeSlider({
            type: "double",
            grid: true,
            min: 0,
            max: 108,
          /*   from:0,
            to:400, */
            prefix: "mes ",
            onStart: function(data) {
                $('#inicio').val(data.min);
                $('#fin').val(data.max);
            },
            onChange: function(data) {
                $('#inicio').val(data.from);
                $('#fin').val(data.to);
            },
            onUpdate: function(data) {},
        });

        var range_meses = $("#range_meses").data("ionRangeSlider");
        range_meses.reset();

        $("#range_anos").ionRangeSlider({
            type: "double",
            grid: true,
            min: 0,
            max: 9,
           /*   from: 0,
             to: 9, */
            prefix: "año ",
            onStart: function(data) {
                $('#inicio').val(data.min);
                $('#fin').val(data.max);
            },
            onChange: function(data) {
                $('#inicio').val(data.from);
                $('#fin').val(data.to);
            },
            onUpdate: function(data) {},
        });

        var range_anos = $("#range_anos").data("ionRangeSlider");
        range_anos.reset();

        //en la pagina periodos , con el combo semanas oculto o muestro slides de rangos
        $("#divunidad").change(function() {

            if ($("#divunidad option:selected").val() == "semana") {
                $("#divsemanas").show();
                $("#divmeses").hide();
                $("#divanos").hide();

            } else if ($("#divunidad option:selected").val() == "mes") {
                $("#divsemanas").hide();
                $("#divmeses").show();
                $("#divanos").hide();
               /*  $('#inicio').val(0);
                $('#fin').val(108); */
            } else if ($("#divunidad option:selected").val() == "año") {
                $("#divsemanas").hide();
                $("#divmeses").hide();
                $("#divanos").show();
              /*   $('#inicio').val(0);
                $('#fin').val(9); */
            }

        });

     
                
              
        
        //boton editar
        $('td').on('click', 'a.edit-modal', function() {

            alert("llegue");
            var data = $(this).attr('value');
            data = JSON.parse(data);

            $('#divbtncrear').hide();
            $('#divbtneditar').show();
            $('#tituloCrearEditar').text("Editar Periodo");
            $('#nombre').val(data.nombre);
            $('#tipo_periodo').val(data.tipo_periodo);
            if(data.unidad=="año"){ $('#divunidad').val("ano");}else{ $('#divunidad').val(data.unidad);}

            $('#id_periodo').val(data.id_periodo);
            $('#id_subperiodo').val(data.id);
            
   /*          //se setea los rangos
            var inicio;
            var fin;
            jQuery.each(data.rango, function(i, val) {
                inicio = val.inicio;
                fin = val.fin;
                $('#id_rango').val(val.id);
            });

alert(data.fin); */
            $('#inicio').val(data.inicio);
            $('#fin').val(data.fin);
            $('#id_rango').val(data.id_rango    );

            if (data.unidad == "semana") {
                $("#divsemanas").show();
                $("#divmeses").hide();
                $("#divanos").hide();

                range_semanas.update({
                    from: $('#inicio').val(),
                    to: $('#fin').val(),
                });
                range_semanas.reset();

            } else if (data.unidad == "mes") {
                $("#divsemanas").hide();
                $("#divmeses").show();
                $("#divanos").hide();

                range_meses.update({
                    from: $('#inicio').val(),
                    to: $('#fin').val(),
                });
                range_meses.reset();
            } else if (data.unidad == "año") {
                $("#divsemanas").hide();
                $("#divmeses").hide();
                $("#divanos").show();

                range_anos.update({
                    from: $('#inicio').val(),
                    to: $('#fin').val(),
                });
                range_anos.reset();

            }
        });

       

        $('div').on('click', 'a.bclasscrear', function() {
            $('#divbtncrear').show();
        $('#divbtneditar').hide();
        $('#tituloCrearEditar').text("Crear Sub-Periodo");
        $('#nombre').val("");
        $('#tipo_periodo').val("");
        $('#divunidad').val("");
        $('#url_imagen').val("");
        $('#inicio').val("");
        $('#fin').val("");
        $("#divsemanas").hide();
        $("#divmeses").hide();
        $("#divanos").hide();
        range_anos.reset();
     /*     range_semanas.destroy(); */
        
        });



    });

    function nuevoPeriodo() {
     /*    $('#divbtncrear').show();
        $('#divbtneditar').hide();
        $('#tituloCrearEditar').text("Crear Sub-Periodo");
        $('#nombre').val("");
        $('#tipo_periodo').val("");
        $('#divunidad').val("");
        $('#url_imagen').val("");
        $('#inicio').val("");
        $('#fin').val("");
        $("#divsemanas").hide();
        $("#divmeses").hide();
        $("#divanos").hide();
         range_semanas.destroy(); */
        /*   var drEvent = $('#url_imagen').dropify();
          drEvent = drEvent.data('dropify');
          drEvent.resetPreview();
          drEvent.clearElement(); */
        /*    drEvent.destroy();
        drEvent.init(); */

         /*    $("#url_imagen").val('');
            $("#labelurl_imagen").text('Selecciona una Imagen');
            $("#previewHolder").attr('src','/assets/images/no-image.jpg'); */
    }
</script>


@endpush
