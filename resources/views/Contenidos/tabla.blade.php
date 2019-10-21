@extends('layouts.appBase') @section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Sub Periodos</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('periodos')}}">Periodos</a></li>
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
                <h3 class="m-b-0">tabla <a style="color:#f56e0a"></a></h3>

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
                    {{--
                    <button style="background:#f56e0a ; border:#f56e0a" id="btncrear" name="action" onclick="nuevoPeriodo()" value="Nuevo Sub-Periodo" class="btn btn-info waves-effect waves-light">
                        <i class="fa fa-plus"></i> Nuevo Sub-Periodo
                    </button> --}}
                    <a style="background:#f56e0a ; border:#f56e0a ;color:#ffffff" name="action" value="Nuevo Sub-Periodo" class="bclasscrear btn btn-info waves-effect waves-light">
                        <i class="fa fa-plus"></i> Nuevo Sub-Periodo
                    </a>

                    {{--
                    <a class="edit-modal btn btn-info" data-toggle="tooltip" data-original-title="Editar" style="font-family: Poppins, sans-serif;">
                        <i class="fa fa-plus"></i> Nuevo Sub-Periodo
                    </a> --}}
                </div>
                {{--
                <h6 class="card-subtitle">
                           Ingresa todos los datos del formulario para crear un nuevo Sub Periodo
                        </h6> --}}

                <form class="form-horizontal p-t-20" method="POST" action="{{ route('crearSubperiodo') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ti-world"></i>
                                </div>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingresa un nombre " name="nombre" />
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

                            <img src="../assets/images/alert/alert5.png" alt="alert" class="img-responsive model_img" id="sa-params">

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
                                        <a href="#" tabindex="0" class="all dt-button">Todos</a>
                                    </li>
                                    <li class="btn">
                                        <a href="#" tabindex="0" class="dt-button">beneficio</a>
                                    </li>
                                    <li class="btn">
                                        <a href="#" tabindex="0" class="dt-button">consejo</a>
                                    </li>
                                    <li class="btn">
                                        <a href="#" tabindex="0" class="dt-button">tres</a>
                                    </li>
                                    <li class="btn">
                                        <a href="#" tabindex="0" class="dt-button">cuatro</a>
                                    </li>
                                </ul>

                            </div>

                    <table id="example" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >
                                            orden
                                        </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >
                                    id
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" {{-- style="width: 298px;" --}}>
                                    Tipo Contenido
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" {{-- style="width: 146px;" --}}>
                                    Titulo
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 60px;">
                                    Periodo
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 128px;">
                                    Subperiodo
                                </th>
                                {{--
                                <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 98px;">
                                    Salary
                                </th>
                                --}}
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($content as $item)
                            <tr class="item{{$item->id}}">
                                    <td>{{$item->orden}}</td>
                               <td>{{$item->id}}</td>                              
                                <td>{{$item->tipo_contenido}}</td>
                                <td>{{$item->titulo_contenido}}</td>
                                <td>{{$item->periodo}}</td>
                                @if($item->subperiodo)
                                <td>{{$item->subperiodo}}</td>
                                @else
                                <td></td>
                                @endif
                                <td>

                                   {{--  <form method="get" action="{{ route('habilitaTabla',$item->id)}}"> --}}
                                            <a class="edit-modal btn btn-info" data-toggle="tooltip" data-original-title="Editar" value="{{$item}}" id="{{$item->id}}">
                                                    <span class="fa fa-edit" style="color:white"></span>
                                                </a>

                                        <!-- <a class="edit-modal btn btn-info" href="{{ route('editarContenido',$item) }}">
                                                            <span
                                                                class="fa fa-edit" tooltip="dsadsadsadsad"
                                                            ></span>
                                                        </a> -->
               {{--                          <a class="delete-modal btn btn-succes">
                                            <span class="fa fa-power-off"></span>
                                        </a>
                                        <a class="delete-modal btn btn-danger " id="" >
                                            <span class="fa  fa-trash-o"></span>

                                        </a> --}}
                                        <a class="delete-modal btn btn btn-warning" data-toggle="tooltip" data-original-title="Subperiodos" name="action" value="Subperiodos" href="{{route('habilitaTabla',$item->id)}}">
                                                <span class="fa  fa-dot-circle-o"></span>
                                        </a>
                                      
                                  {{--   </form> --}}
                                   
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


<!-- ============================================================== -->
<!-- End PAge Content -->
@endsection @push('css') {{--
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
<link href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css" rel="stylesheet">
<link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

<style>
    #result {
        border: 1px solid #888;
        background: #f7f7f7;
        padding: 1em;
        margin-bottom: 1em;
    }
</style>

@endpush @push('js')

<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="../assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
{{--
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}

<script>

    $(document).ready(function() {

//href="{{ route('eliminarContenido',$item->id) }}"


$('td').on('click', 'a.edit-modal', function() {
            var data = $(this).attr('value');
            data = JSON.parse(data);
            swal({
           title: "Esta seguro de eliminar ?"+data.titulo_contenido,
              text: "¡No podrá recuperar este registro!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, elimínalo!",
            cancelButtonText: "No, cancelar!",
            closeOnConfirm: false,
            closeOnCancel: false 
        }, function(isConfirm){
   
            if (isConfirm) {
                swal("Eliminado!", "Eliminación Exitosa.", "success");
            } else {
                swal("Cancelado", "Eliminación Cancelada, el registro esta intacto", "error");
            }
        });

});





   //Parameter
   $('#sa-params').click(function(id){

    alert(id);
        swal({
           title: "Esta seguro?",
              text: "¡No podrá recuperar este archivo!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, elimínalo!",
            cancelButtonText: "No, cancelar!",
            closeOnConfirm: false,
            closeOnCancel: false 
        }, function(isConfirm){
   
            if (isConfirm) {
                swal("Eliminado!", "Eliminacion exitosa.", "success");
            } else {
                swal("Cancelado", "eliminacion cancelada, tu registro esta intacto", "error");
            }
        });
    });





        var table = $('#example').DataTable({
            "columnDefs": [
            {
                /* "targets": [ 2 ],
                "visible": false,
                "searchable": false */
            },
            {
                "targets": [ 1 ],
                "visible": false
            }
        ],
            rowReorder: true
        });
        table.on('row-reorder', function(e, diff, edit) {
            var result = 'Reorder started on row: ' + edit.triggerRow.data()[1] + '<br>';
            for (var i = 0, ien = diff.length; i < ien; i++) {
                var rowData = table.row(diff[i].node).data();
                result += rowData[1] + ' updated to be in position ' +
                diff[i].newData + ' (was ' + diff[i].oldData + ')<br>';
            }
            $('#result').html('Event result:<br>' + result);
        });


   /*      table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw(); */


  $('ul').on('click', 'a', function() {

table
.columns(2)
.search($(this).text())
.draw();
});

$('ul').on('click', 'a.all', function() {

table
.search('')
.columns(2)
.search('')
.draw();
});
 


    });
</script>
@endpush
