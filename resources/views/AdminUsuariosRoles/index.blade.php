@extends('layouts.appBase')
@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Administrador de Usuarios y Roles</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Usuarios y Roles</li>
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



<!--==============================-->
<!--==== FORMULARIO DE USUARIOS ==-->
<!--==============================-->
<div class="row">
    <div class="col-md-12">
        @include('AdminUsuariosRoles.infoUsuario')
    </div>
</div>

<!--==============================-->
<!--==== TABLAS DE USUARIOS ======-->
<!--==============================-->
<div class="row">
    <div class="col-md-12">
        @include('AdminUsuariosRoles.grillaUsuario')
    </div>
</div>


@endsection
@push('css') @endpush
@push('js')
<script>

    $(document).ready(function() {

        $('#pwd').hide();
        // DATA TABLES BEGIN
        var tableUsuarios = $('#tableUsuarios').DataTable({
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
        // DATA TABLES BEGIN

        $('#ldap').change(function() {
            //alert('esto es un evento de DOM');
            if ($(this).is(":checked")) {
                $('#pwd').hide();
            } else {
                $('#pwd').show();
            }
        });

        // BOTON CANCELAR limpair formulario
        $("#btnCancelar").click(function() {

            $('#tituloCrearEditar').text("Ingresar Nuevo Usuario a ChCC");

            $('#usernombreValid').removeClass('has-danger');
            $('#usernombreFeedBack').text('');
            $("#userapellidoValid").removeClass('has-danger');
            $('#userapellidoFeedBack').text('');
            $("#usermailValid").removeClass('has-danger');
            $('#usermailFeedBack').text('');
            $("#newusernameValid").removeClass('has-danger');
            $('#newusernameFeedBack').text('');
            $("#newuserpassValid").removeClass('has-danger');
            $('#newuserpassFeedBack').text('');
            $("#newuserpassconfirmValid").removeClass('has-danger');
            $('#newuserpassconfirmFeedBack').text('');
            $('#usernombre').val("");
            $('#userapellido').val("");
            $('#usermail').val("");
            $('#newusername').val("");
            $('#ldap').val("");
            $('#newuserpass').val("");
            $('#newuserpassconfirm').val("");
        });

        $("#btnOk").click(function() {

            $('#usernombreValid').removeClass('has-danger');
            $('#usernombreFeedBack').text('');
            $("#userapellidoValid").removeClass('has-danger');
            $('#userapellidoFeedBack').text('');
            $("#usermailValid").removeClass('has-danger');
            $('#usermailFeedBack').text('');
            $("#newusernameValid").removeClass('has-danger');
            $('#newusernameFeedBack').text('');
            $("#newuserpassValid").removeClass('has-danger');
            $('#newuserpassFeedBack').text('');
            $("#newuserpassconfirmValid").removeClass('has-danger');
            $('#newuserpassconfirmFeedBack').text('');

            var id = $('#userid').val();
            var nombre = $('#usernombre').val();
            var apellido = $('#userapellido').val();
            var email = $('#usermail').val();
            var name = $('#newusername').val();

            var ldap = $('#ldap').val();
            var pass = $('#newuserpass').val();
            var passconf = $('#newuserpassconfirm').val();

            if (nombre == '') {
                $('#usernombreValid').addClass('has-danger');
                $('#usernombreFeedBack').text('Complete Campo Nombre');
            } else if (apellido == '') {
                $('#userapellidoValid').addClass('has-danger');
                $('#userapellidoFeedBack').text('Complete Campo Apellido');
            } else if (email == '') {
                $('#usermailValid').addClass('has-danger');
                $('#usermailFeedBack').text('Complete Campo Correo');
            } else if (name == '') {
                $('#newusernameValid').addClass('has-danger');
                $('#newusernameFeedBack').text('Complete Campo Usuario LDAP');
            } else {

                if ($('#ldap').is(':checked')) {
                    $('#formUser').submit();
                } else {

                    if (id == '') {
                        if (pass != '') {
                            if (pass == passconf) {
                                $('#formUser').submit();
                            } else {
                                $('#newuserpassconfirmValid').addClass('has-danger');
                                $('#newuserpassconfirmFeedBack').text('no coniciden las Passwords.');
                            }
                        } else {
                            $('#newuserpassValid').addClass('has-danger');
                            $('#newuserpassFeedBack').text('Ingrese Password');
                        }
                    } else {
                        $('#formUser').submit();
                    }


                }
            }

        });

        $('td').on('click', 'a.edit-user', function() {

            var data = $(this).attr('value');
            data = JSON.parse(data);
            console.log(data);

            $('#tituloCrearEditar').text("Editando Usuario");

            $('#userid').val(data.id);
            $('#usernombre').val(data.nombre);
            $('#userapellido').val(data.apellido);
            $('#usermail').val(data.email);
            $('#newusername').val(data.name);
            //newuserpass


            $("#userrolidValid select").val(data.rol_id);

            if (data.ldap == 0) {
                $("#ldap").prop('checked', true);
                $('#pwd').hide();
            } else {
                $("#ldap").prop('checked', false);
                $('#pwd').hide();
            }


        });




    });
    
</script>
@endpush