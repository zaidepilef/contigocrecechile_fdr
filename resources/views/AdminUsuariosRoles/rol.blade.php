@extends('layouts.appBase')
@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Administrador de Usuarios y Roles</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Roles</li>
        </ul>
    </div>
</div>

<!--==============================-->
<!--==== FORMULARIO DE ROLES ==-->
<!--==============================-->
<div class="row">
    <div class="col-md-12">
        @include('AdminUsuariosRoles.infoRol')


        <div class="card">

            <div class="card-header">
                <div class="card-actions">
                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                </div>
                <h4 class="card-title m-b-0">Informaciòn del Rol</h4>
            </div>

            <div class="card-body b-t collapse show">

                @if (session('mensajes_ok'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    {{ session('mensajes_ok') }}
                </div>
                @endif

                @if ( $errors->any() )
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    @foreach($errors->all() as $error)
                    {{$error}}
                    @endforeach
                </div>
                @endif

                <h6 id="tituloCrearEditar" class="card-subtitle">Ingresar Nuevo Rol.</h6>
                <form class="form p-t-20" action="{{ route( 'rolSave' ) }}" id="formRol" method="post" autocomplete="off">

                    @csrf
                    <input type="hidden" name="rolid" id="rolid" value="">

                    <div class="row">

                        <div class="col-md-3">
                            <div id="rolnombreValid" class="form-group">
                                <label class="control-label" for="usernombre">Nombre Rol</label>
                                <input type="text" class="form-control" id="rolnombre" name="rolnombre" placeholder="Rol" required>
                                <p id="rolnombreFeedBack" class="form-control-feedback"></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div id="roldescripcionValid" class="form-group">
                                <label for="userapellido">Descripcion</label>
                                <input type="text" class="form-control" id="roldescripcion" name="roldescripcion" placeholder="Descripcion" required>
                                <p id="roldescripcionFeedBack" class="form-control-feedback"></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">&nbsp;</label>
                                <br>
                                <button type="button" id="btnOk" name="" class="btn btn-success waves-effect waves-light">Ok</button>
                                <button type="button" id="btnCancelar" name="" class="btn btn-inverse waves-effect waves-light">Cancelar</button>
                            </div>
                        </div>

                    </div>

                </form>


            </div>

        </div>
    </div>
</div>

<!--==============================-->
<!--==== TABLAS DE ROLES ======-->
<!--==============================-->
<div class="row">
    <div class="col-md-12">
        @include('AdminUsuariosRoles.grillaRol')
    </div>
</div>

@endsection
@push('css') @endpush
@push('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {

        // BOTON CANCELAR limpair formulario
        $("#btnCancelar").click(function() {

            $('#rolid').val("");
            $('#rolnombreValid').removeClass('has-danger');
            $('#rolnombreFeedBack').text('');
            $("#roldescripcionValid").removeClass('has-danger');
            $('#roldescripcionFeedBack').text('');
            $('#rolnombre').val("");
            $('#roldescripcion').val("");

        });

        $("#btnOk").click(function() {

            $('#rolnombreValid').removeClass('has-danger');
            $('#rolnombreFeedBack').text('');
            $("#roldescripcionValid").removeClass('has-danger');
            $('#roldescripcionFeedBack').text('');

            var rolid = $('#rolid').val();
            var rolnombre = $('#rolnombre').val();
            var roldescripcion = $('#roldescripcion').val();

            if (rolnombre == '') {
                $('#rolnombreValid').addClass('has-danger');
                $('#rolnombreFeedBack').text('Complete Campo Nombre');
            } else if (roldescripcion == '') {
                $('#roldescripcionValid').addClass('has-danger');
                $('#roldescripcionFeedBack').text('Complete Campo Descripcion');

            } else {

                swal({
                    title: "Guardar Cambios",
                    text: "Se modificarán datos de rol",
                    icon: "warning",
                    buttons: [
                        'No, cancel it!',
                        'Yes, I am sure!'
                    ],
                    dangerMode: false,
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        $('#formRol').submit();
                    }
                })

            }

        });

        $('div.role').on('click', 'a.edit-rol', function() {
            //alert('lo tocaste');
            var rolid = $('#rolid').val();
            var data = $(this).attr('value');
            data = JSON.parse(data);
            console.log(data);

            if (rolid != '') {
                $('#rolid').val("");
                $('#rolnombre').val("");
                $('#roldescripcion').val("");
            } else {
                $('#rolid').val(data.id);
                $('#rolnombre').val(data.rol_name);
                $('#roldescripcion').val(data.rol_description);
            }


        });

        $('div.role').on('click', 'a.delete-rol', function() {
            //alert('lo tocaste');
            var data = $(this).attr('value');
            data = JSON.parse(data);
            console.log(data);


            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'Shortlisted!',
                        text: 'Candidates are successfully shortlisted!',
                        icon: 'success'
                    }).then(function() {
                        form.submit(); // <--- submit form programmatically
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            })
        });




    });
</script>
@endpush