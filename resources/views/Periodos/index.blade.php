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
                                <input type="text" class="form-control" id="nombre" placeholder="Ingresa un nombre " name="nombre" value="{{old('nombre')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Imagen</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input form-control" style="cursor:pointer" name="url_imagen" id="url_imagen" value="{{old('url_imagen')}}" >
                                    <label class="custom-file-label" for="url_imagen" id="labelurl_imagen">Selecciona una imagen </label>
                                </div>

                                <div class="input-group-addon" style="cursor:pointer" data-toggle="Limpiar" data-original-title="Limpiar" id="limpiafile">
                                    <i class="fa fa-trash-o"></i>
                                </div>
                            </div>
                            <div style="border:1px solid rgba(0,0,0,.15);border-radius: .25rem;transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;" class="contenedorpreview">

                                <img src=" {{ ('assets/images/no-image.jpg') }}" alt="Sin Imagen" width="100px" height="100px" class="img" id="previewHolder" value="{{old('previewHolder')}}" />
                            </div>
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
                                    @foreach($selectTipoPeriodo as $item)
                                    <option value="{{ $item[0] }}" {{ (old( "tipo_periodo")==$item[0] ? "selected": "") }}>{{ $item[1] }}</option>
                                    @endforeach
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
                                <select class="form-control custom-select " data-placeholder="Selecciona Unidad de rango" tabindex="1" name="divunidad" id="divunidad">
                                    <option value="" selected="selected">Seleccione Unidad</option>

                                    @foreach($selectUnidad as $items)
                                    <option value="{{ $items[0] }}" {{ (old( "divunidad")==$items[0] ? "selected": "") }}>{{ $items[1] }}</option>
                                    @endforeach
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

                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ti-world"></i>
                                </div>
                                <input type="hidden" class="form-control" id="id_rango" name="id_rango" />

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
                    <div class="dt-buttons">
                        <ul>
                            <li class="btn">
                                <a href="#" tabindex="0" class="all dt-button">Todos</a
                                >
                            </li>
                            <li class="btn">
                                <a href="#" tabindex="0" class="dt-button"
                                    >crecimiento</a
                                >
                            </li>
                            <li class="btn">
                                <a href="#" tabindex="0" class="dt-button"
                                    >vacunas</a
                                >
                            </li>
                            <li class="btn">
                                <a href="#" tabindex="0" class="dt-button">control</a>
                            </li>
                          {{--   <li class="btn">
                                <a href="#" tabindex="0" class="dt-button">tarea</a>
                            </li> --}}
                        </ul>

                    </div>
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
                                Rango
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
                                    @foreach($item->rango as $itemrango)
                                    {{$itemrango->inicio}} - {{$itemrango->fin}}
                                    @endforeach

                            </td>
                            <td>
                                <form method="POST" action="{{ route('accionesPeriodo',$item->id) }} ">
                                    @csrf {{--
                                    <a class="edit-modal btn btn-info" data-toggle="tooltip" data-original-title="Editar" onclick="editarPeriodo({{$item}})" value="Editar">
                                        <span class="fa fa-edit" style="color:white"></span>
                                    </a> --}}

                                    <a class="edit-modal btn btn-info" data-toggle="tooltip" data-original-title="Editar" value="{{$item}}" id="{{$item->id}}">
                                        <span class="fa fa-edit" style="color:white"></span>
                                    </a>
                                   {{--  {{-- descomentar cuandoexista el campo estado en la base de datos --}}
                                    @if($item->estado=="habilitado")
                                    <button class="delete-modal btn btn-success " data-toggle="tooltip" data-original-title="Habilitar" type="submit" name="action" value="Deshabilitar">
                                        <span class="fa fa-power-off" style="color:white"></span>
                                    </button>
                                    @endif 
                                    @if($item->estado=="deshabilitado")

                                    <button class="delete-modal btn btn-secondary" data-toggle="tooltip" data-original-title="Habilitar" type="submit" name="action" value="Habilitar">
                                        <span class="fa fa-power-off" style="color:black"></span>
                                    </button>
                                    @endif 

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
@endsection @push('css') {{--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
<style>
.contenedorpreview
{
    height:150px;
background-image: url('https://www.pngfind.com/img/320bg.png');
}

.contenedorpreview img
{
    object-fit: contain;
width:100%;
height:100%;
}


    .img {
        display: block;
        margin: auto;
    }

    .custom-control-label::before,
    .custom-file-label,
    .custom-select {
        transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .custom-file-input {
        /* position: relative; */
        /* z-index: 2; */
        /* width: 100%; */
        /* height: calc(1.5em + .75rem + 2px); */
        /* margin: 0; */
        /* opacity: 0; */
    }

    .custom-file-label {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: .25rem;
    }
    /* .custom-file-input:lang(en)~.custom-file-label::after {
    content: "Browse";
}
 */
</style>

@endpush @push('js') {{--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {

         $("#limpiafile").click(function() {
            $("#url_imagen").val('');
            $("#labelurl_imagen").text('Selecciona una Imagen');
            $('#previewHolder').attr('src','/assets/images/no-image.jpg');

        });



        /*         function bs_input_file() {
        	$(".input-file").before(
        		function() {
        			if ( ! $(this).prev().hasClass('input-ghost') ) {
        				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
        				element.attr("name",$(this).attr("name"));
        				element.change(function(){
        					element.next(element).find('input').val((element.val()).split('\\').pop());
        				});
        				$(this).find("button.btn-choose").click(function(){
        					element.click();
        				});
        				$(this).find("button.btn-reset").click(function(){
        					element.val(null);
        					$(this).parents(".input-file").find('input').val('');
        				});
        				$(this).find('input').css("cursor","pointer");
        				$(this).find('input').mousedown(function() {
        					$(this).parents('.input-file').prev().click();
        					return false;
        				});
        				return element;
        			}
        		}
        	);
        }
        $(function() {
        	bs_input_file();
        });
         */

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        //esto pinta la foto debajo del input
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewHolder').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#url_imagen").change(function() {

            readURL(this);
        });

        var tablePeriodos = $('#tablePeriodos').DataTable({
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


  // table.column(1).visible(false);


  $('ul').on('click', 'a', function() {

tablePeriodos
.columns(2)
.search($(this).text())
.draw();
});

$('ul').on('click', 'a.all', function() {

tablePeriodos
.search('')
.columns(2)
.search('')
.draw();
});





        $("#range_semanas").ionRangeSlider({
            type: "double",
            grid: true,
            min: 0,
            max: 400,
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
            } else if ($("#divunidad option:selected").val() == "ano") {
                $("#divsemanas").hide();
                $("#divmeses").hide();
                $("#divanos").show();
              /*   $('#inicio').val(0);
                $('#fin').val(9); */
            }

        });

        /*
                var nameImage =  'full path file';
              var url_imagen=  $('#url_imagen').dropify({
                defaultFile: blobFunction() ,
                    "messages": {
                        default: 'Arrastre un archivo o haga clic aquí',
                        replace: 'Arrastre un archivo o haga clic en reemplazar',
                        remove: 'Eliminar',
                        error: 'Lo sentimos, el archivo demasiado grande'
                    },

                }); */
        //boton editar
        $('td').on('click', 'a.edit-modal', function() {
            var data = $(this).attr('value');
            data = JSON.parse(data);

            $('#divbtncrear').hide();
            $('#divbtneditar').show();
            $('#tituloCrearEditar').text("Editar Periodo");
            $('#nombre').val(data.nombre);
            $('#tipo_periodo').val(data.tipo_periodo);
            if(data.unidad=="año"){ $('#divunidad').val("ano");}else{ $('#divunidad').val(data.unidad);}

            $('#id_periodo').val(data.id);

            //se setea los rangos
            var inicio;
            var fin;
            jQuery.each(data.rango, function(i, val) {
                inicio = val.inicio;
                fin = val.fin;
                $('#id_rango').val(val.id);
            });


            $('#inicio').val(inicio);
            $('#fin').val(fin);

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
            $("#labelurl_imagen").text('Cambia la  Imagen');
            $("#previewHolder").attr("src", "data:image/jpeg;base64," + data.url_imagen);

            /*       var drEvent = url_imagen;
              drEvent = drEvent.data('dropify');
              drEvent.destroy();
              drEvent.resetPreview();
              drEvent.clearElement(); */
            /*  var decodedString = atob(encodedString) */
            ;
            /*  drEvent.settings.defaultFile =atob(data.url_imagen); */
            /*     drEvent.settings..defaultFile =" assets/images/android-icon-36x36.png"; */

            /*  drEvent.init(); */

            /*     $('#url_imagen').attr("data-default-file","data:image/jpeg;base64," + data.url_imagen);
            $('#url_imagen').dropify(); */
            /*   $("#url_imagen").attr("data-default-file", "data:image/jpeg;base64,"+ data.url_imagen); */
            /*   $('.dropify').dropify();*/

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
        /*   var drEvent = $('#url_imagen').dropify();
          drEvent = drEvent.data('dropify');
          drEvent.resetPreview();
          drEvent.clearElement(); */
        /*    drEvent.destroy();
        drEvent.init(); */

            $("#url_imagen").val('');
            $("#labelurl_imagen").text('Selecciona una Imagen');
            $("#previewHolder").attr('src','/assets/images/no-image.jpg');
    }

    function editarPeriodo(data) {

    }

    function dateToTS(date) {
        return date.valueOf();
    }
</script>
@endpush
