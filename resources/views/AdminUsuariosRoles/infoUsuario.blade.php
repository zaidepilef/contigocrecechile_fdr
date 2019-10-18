<div class="card">

    <div class="card-header">
        <div class="card-actions">
            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
        </div>
        <h4 class="card-title m-b-0">Informaciòn del Usuario</h4>
    </div>

    <div class="card-body b-t collapse show">

        @if (session('mensajes_ok'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <i class="ti-user"> {{ session('mensajes_ok') }}</i>
        </div>
        @endif

        @if ( $errors->any() )
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            @foreach($errors->all() as $error)
            <i class="ti-user"></i>{{$error}}
            @endforeach
        </div>
        @endif


        <h6 id="tituloCrearEditar" class="card-subtitle">Ingresar Nuevo Usuario.</h6>
        <form class="form p-t-20" action="{{ route( 'newUser' ) }}" id="formUser" method="post" autocomplete="off">

            @csrf
            <input type="hidden" name="userid" id="userid" value="">

            <div class="row">

                <div class="col-md-6">
                    <div id="usernombreValid" class="form-group">
                        <label class="control-label" for="usernombre">Nombre</label>
                        <input type="text" class="form-control" id="usernombre" name="usernombre" placeholder="" required>
                        <p id="usernombreFeedBack" class="form-control-feedback"></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div id="userapellidoValid" class="form-group">
                        <label for="userapellido">Apellido</label>
                        <input type="text" class="form-control" id="userapellido" name="userapellido" placeholder="" required>
                        <p id="userapellidoFeedBack" class="form-control-feedback"></p>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <div id="usermailValid" class="form-group">
                        <label class="control-label" for="usermail">Correo</label>
                        <input type="email" class="form-control" id="usermail" name="usermail" placeholder="ejemplo@correo.com" required>
                        <p id="usermailFeedBack" class="form-control-feedback"></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div id="newusernameValid" class="form-group">
                        <label class="control-label" for="newusername">Usuario LDAP</label>
                        <input type="text" class="form-control" id="newusername" name="newusername" placeholder="Usuario o Usuario LDAP" required>
                        <p id="newusernameFeedBack" class="form-control-feedback"></p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div id="ldapValid" class="form-group">
                        <div class="checkbox">
                            <input type="hidden" name="ldap" value="off">
                            <input type="checkbox" id="ldap" name="ldap" class="filled-in" value="on" checked>
                            <label for="ldap"> Usuario de LDAP ?</label>
                        </div>
                    </div>
                </div>

                <div id="pwd" class="col-md-6">
                    <div class="row">

                        <div class="col-md-6">
                            <div id="newuserpassValid" class="form-group">
                                <label class="control-label" for="newuserpass">Password</label>
                                <input type="password" class="form-control" id="newuserpass" name="newuserpass" placeholder="Password">
                                <p id="newuserpassFeedBack" class="form-control-feedback"></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div id="newuserpassconfirmValid" class="form-group">
                                <label class="control-label" for="newuserpassconfirm">Confirma Password</label>
                                <input type="password" class="form-control" id="newuserpassconfirm" name="newuserpassconfirm" placeholder="Repita Password">
                                <p id="newuserpassconfirmFeedBack" class="form-control-feedback"></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-6">
                    <div id="userrolidValid" class="form-group">
                        <label class="control-label" for="userrolid">Rol</label>
                        <select id="userrolid" name="userrolid" class="form-control custom-select" data-placeholder="Seleccione Rol" tabindex="1">
                            @foreach($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->rol_name}}</option>
                            @endforeach
                        </select>
                        <p id="userrolidFeedBack" class="form-control-feedback"></p>
                    </div>
                </div>

                <div class="col-md-6">
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