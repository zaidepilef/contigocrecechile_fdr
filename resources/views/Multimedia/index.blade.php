@extends('layouts.appBase') @section('content')

<div class="row">
        <div class="col-12">
                <!-- Column -->
                <div class="card">
                    <div class="card-body little-profile text-center">
                        <h3 class="m-b-0">Multimedia Home</h3>
                    </div>
                </div>
                <!-- Column -->
            </div>
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">

     {{--    <div class="card">
                <div class="card-body">
                        <h4 class="card-title">Creación</h4>
                        <h6 class="card-subtitle">Selecciona una opción ... </h6>
                        <button class="btn btn-outline-success waves-effect waves-light" type="button"><span class="btn-label"><i class="fa  fa-file-audio-o"></i></span>Audio</button>
                        <button class="btn btn-outline-success waves-effect waves-light" type="button"><span class="btn-label"><i class="fa  fa-file-video-o"></i></span>Video</button>




                    </div>
        </div> --}}

        <!-- Column -->

        <!-- Column -->
        <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            data-toggle="tab"
                            href="#home"
                            role="tab"
                            ><i class="fa  fa-volume-up"></i>  Audio</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-toggle="tab"
                            href="#profile"
                            role="tab"
                            ><i class="fa  fa-youtube-play"></i>  Video</a
                        >
                    </li>

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="card-body">
                                    <h4 class="card-title">Crear Audio</h4>
                                  <h6 class="card-subtitle">Use Bootstrap predefined grid classes for horizontal form</h6>

                                    <form class="form-horizontal p-t-20">
                                            <div class="form-group row">
                                                    <label for="web" class="col-sm-3 control-label">URL</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="ti-world"></i></div>
                                                            <input type="text" class="form-control" id="web" placeholder="Ingresa la url del video">
                                                        </div>
                                                    </div>
                                                </div>
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Titulo*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                                    <input type="text" class="form-control" id="exampleInputuname3" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Reseña*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-email"></i></div>
                                                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputPassword4" class="col-sm-3 control-label">Password*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                    <input type="password" class="form-control" id="exampleInputpwd4" placeholder="Enter pwd">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword5" class="col-sm-3 control-label">Re Password*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                    <input type="password" class="form-control" id="exampleInputpwd5" placeholder="Re Enter pwd">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox33" type="checkbox">
                                                    <label for="checkbox33">Check me out !</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-0">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-info waves-effect waves-light">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                    </div>
                    <!--second tab-->
                    <div class="tab-pane" id="profile" role="tabpanel">
                            <div class="card-body">
                                    <h4 class="card-title">Crear Video</h4>
                                    <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6>

                                    <form class="form-horizontal p-t-20">
                                            <div class="form-group row">
                                                    <label for="web" class="col-sm-3 control-label">URL de YouTube</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="ti-world"></i></div>
                                                            <input type="text" class="form-control" id="web" placeholder="Ingresa la url del video">
                                                        </div>
                                                    </div>
                                                </div>
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Titulo*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                                    <input type="text" class="form-control" id="exampleInputuname3" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Reseña*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-email"></i></div>
                                                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputPassword4" class="col-sm-3 control-label">Password*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                    <input type="password" class="form-control" id="exampleInputpwd4" placeholder="Enter pwd">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword5" class="col-sm-3 control-label">Re Password*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                    <input type="password" class="form-control" id="exampleInputpwd5" placeholder="Re Enter pwd">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox33" type="checkbox">
                                                    <label for="checkbox33">Check me out !</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-0">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-info waves-effect waves-light">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                    </div>

                </div>
            </div>




    </div>

    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
                <div class="card-body">
                       {{--  <h4 class="card-title">Tabla resultado </h4> --}}
                        <h6 class="card-subtitle">Mostrar Solo:</h6>

                        <div class="dt-buttons">
                                <a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23" href="#">

                                <span>Audio</span></a>
                                <a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                <span>Video</span></a>

                                </div>

                        <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


                        </div>
                    </div>

        </div>

	</div>

</div>
@endsection @push('css') @endpush @push('js') @endpush
