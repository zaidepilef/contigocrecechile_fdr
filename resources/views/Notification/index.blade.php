@extends('layouts.appBase') @section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"> Notificaciones</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

            <li class="breadcrumb-item active"> Notificaciones</li>

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

        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" id="tituloCrearEditar">Crear Notificaciones</h4>
                <div id="">
                    <button style="background:#f56e0a ; border:#f56e0a" id="btncrear" name="action" onclick="CrearNotificacion()" value="Nuevo Periodo" class="btn btn-info waves-effect waves-light">
                        <i class="fa fa-plus"></i> Nueva Notificación
                    </button>
                </div>
                {{--
                <h6 class="card-subtitle">
                           Ingresa todos los datos del formulario para crear un nuevo Periodo
                        </h6> --}}

                <form class="form-horizontal p-t-20" method="POST" action="{{route('notification.send')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Titulo Notificación</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ti-world"></i>
                                </div>
                                <input type="text" class="form-control" id="tituloNotificacion" placeholder="Ingresa un Titulo " name="title" value="{{old('title')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Mensaje</label>
                        <div class="col-sm-9">

                            {{--
                            <div class="input-group-addon">
                                <i class="ti-world"></i>
                            </div> --}}
                            <textarea class="form-control" rows="5" name="body"  value="{{old('body')}}"> Mensaje desde laravel </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Tipo Periodo</label>
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
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Masivo</label>
                        <div class="col-sm-9">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary" style="background:#f56e0a ; border:#f56e0a">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="RadioMasivoSi" name="RadioMasivo" class="custom-control-input" checked="">
                                        <label class="custom-control-label" for="RadioMasivoSi">Si</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary active" style="background:#f56e0a ; border:#f56e0a">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="RadioMasivoNo" name="RadioMasivo" class="custom-control-input">
                                        <label class="custom-control-label" for="RadioMasivoNo">No</label>
                                    </div>
                                </label>

                            </div>
                        </div>
                    </div>

                    <div class="Box">
                    <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Periodo</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="ti-world"></i>
                                    </div>
                                    <select class="form-control custom-select " data-placeholder="Selecciona un Periodo" tabindex="1" name="selectPeriodo" id="selectPeriodo">
                                        <option value="" selected="selected">Seleccione Periodo</option>
                                        @foreach($periodos as $items)
                                        <option value="{{ $items->id }}" {{ (old( "divunidad")==$items->id ? "selected": "") }}>{{ $items->nombre}}</option>
                                        @endforeach
    
                                    </select>
    
    
    
    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputPassword4" class="col-sm-3 control-label">Sub-Periodo</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="ti-world"></i>
                                        </div>
                                        <select class="form-control custom-select " data-placeholder="Selecciona un Sub-Periodo" tabindex="1" name="selectSubPeriodo" id="selectSubPeriodo">
                                            <option value="" selected="selected">Seleccione Sub-Periodo</option>
                                          {{--   @foreach($periodos as $items)
                                            <option value="{{ $items->id }}" {{ (old( "divunidad")==$items->id ? "selected": "") }}>{{ $items->nombre}}</option>
                                            @endforeach --}}
        
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Automático</label>
                        <div class="col-sm-9">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary" style="background:#f56e0a ; border:#f56e0a">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="RadioAutomaticoSi" name="RadioAutomatico" class="custom-control-input" checked="">
                                        <label class="custom-control-label" for="RadioAutomaticoSi">Si</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary active" style="background:#f56e0a ; border:#f56e0a">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="RadioAutomaticoNo" name="RadioAutomatico" class="custom-control-input">
                                        <label class="custom-control-label" for="RadioAutomaticoNo">No</label>
                                    </div>
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Agendable</label>
                        <div class="col-sm-9">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary" style="background:#f56e0a ; border:#f56e0a">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="RadioAgendableSi" name="RadioAgendable" class="custom-control-input" checked="">
                                        <label class="custom-control-label" for="RadioAgendableSi">Si </label>
                                    </div>
                                </label>
                                <label class="btn btn-primary active" style="background:#f56e0a ; border:#f56e0a">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="RadioAgendableNo" name="RadioAgendable" class="custom-control-input">
                                        <label class="custom-control-label" for="RadioAgendableNo">No</label>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                
                               
                    <div class="form-group row ">
                        <div class="col-sm-3">
                            <div id="divbtncrear">
                                <button style="background:#f56e0a ; border:#f56e0a" id="btncrear" name="action" type="submit" value="Guardar" class="btn btn-info waves-effect waves-light">
                                    Guardar
                                </button>
                            </div>
                        </div>
                            <div class="col-sm-3">
                            <div id="divbtnenviar">
                                    <button style="background:#f56e0a ; border:#f56e0a" id="btnenviar" name="action" type="submit" value="Enviar" class="btn btn-info waves-effect waves-light">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                                <div class="col-sm-3">
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection @push('css') @endpush 




@push('js')


<script>
        $(document).ready(function(){



            $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="ABC"){
            $(".Box").hide('slow');
        }
        if($(this).attr("value")=="PQR"){
            $(".Box").show('slow');

        }        
    });
$('input[type="radio"]').trigger('click');





          $("#selectPeriodo").change(function(){          
            var Periodo = $(this).val();           
             $.get('subperiodosSelect/'+Periodo, function(data){
              //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion   
                var producto_select = '<option value="">Seleccione Sub-Periodo</option>'
                  for (var i=0; i<data.length;i++)
                    producto_select+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';

               /*      <option value="{{ $item[0] }}" {{ (old( "tipo_periodo")==$item[0] ? "selected": "") }}>{{ $item[1] }}</option> */
                  $("#selectSubPeriodo").html(producto_select);
            }); 
 
          });
        });
      </script>
@endpush
