
@extends('layouts.appBase') @section('content')
<link href="assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet">


<div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0"> Contenidos</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"> Contenidos</li>
                <li class="breadcrumb-item active">Crear Contenidos</li>
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
                                <div class="card">
                                     <div class="card-body little-profile text-center">
                                         <h3 class="m-b-0">Crear <a style="color:#f56e0a">{{$tipocontenido}}</a></h3>

                                        {{--  <input type="hidden" style="display: block;" id="ininioPeriodo" name="ininioPeriodo" value="{{$perio->inicio}}"/>
                                         <input type="hidden" style="display: block;"  id="finPeriodo" name="finPeriodo" value="{{$perio->fin}}"/> --}}

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

{{--
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body little-profile text-right">
                                <h3 class="m-b-0">Crear {{$tipocontenido}}</h3>
                            </div>
                        </div>
                    </div> --}}

                        <div class="col-lg-3 col-xlg-2 col-md-4">
                            <div class="stickyside">
                                    <div class="card text-center">
                                            <h3 class="m-b-0">Menu Plantilla</h3>
                                <div class="list-group" id="top-menu">

                                    <a href="#1" class="list-group-item active">Imagen Principal</a>
                                    <a href="#22" class="list-group-item">Texto Bajada</a>
                                    <a href="#3" class="list-group-item">Texto Principal</a>
                                    <a href="#4" class="list-group-item">Galeria de Imagenes</a>
                                    <div id="botoncomo" style="display:none"><a href="#5" class="list-group-item">Cómo</a></div>
                                    <div id="botoncuando" style="display:none"><a href="#6" class="list-group-item">Cuándo</a></div>
                                    <div id="botondonde" style="display:none"><a href="#7" class="list-group-item">Dónde</a></div>
                                    <a href="#8" class="list-group-item">video</a>
                                    <a href="#9" class="list-group-item">Audio</a>
                                    <a href="#rango" class="list-group-item">Rango</a>
                                    <!-- <a href="#10" class="list-group-item">Title will be 10</a> -->
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-9 col-xlg-10 col-md-8">

                            <script type="text/javascript">
                                function enable(id)
                                    {
                                        var eleman = document.getElementById(id);
                                        eleman.removeAttribute("disabled");
                                    }
                            </script>

                            <form class="form-horizontal p-t-20" method="post" action="{{ route('crearContenido') }}">
                            @csrf
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="imgPrincipalOn" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="imgPrincipalOn">On</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="imgPrincipalOff" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="imgPrincipalOff">Off</label>
                                    </div>
                                </label>
                            </div>
                            <div class="card" id="1">

                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Imagen Principal</h3>

                                            <br>
                                            <form class="form-horizontal p-t-20" method="post" action="{{ route('crearContenido') }}">
                                            @csrf
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="hidden" class="form-control" id="imgPrincipal" name="imgPrincipal" value="1">
                                                                    <input type="text" class="form-control" id="imgTitulo" name="imgTitulo" placeholder="Ingresa el Titulo Principal">
                                                                    <input type="hidden" class="form-control" id="tipocontenido" name="tipocontenido" value="{{$tipocontenido}}">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Seleccionar Imagen</label>
                                                            <div class="col-sm-9">
                                                                    <input type="file" id="imgPrincipalUrl" name="imgPrincipalUrl" class="dropify"/>

                                                            </div>
                                                        </div>

                                        </div>

                                {{-- <div class="card-body">
                                    <h4 class="card-title" >1. Title will be here</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                                    <p> enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                    <p> enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>

                                </div> --}}
                            </div>

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="textBajadaOn" name="customRadio" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="textBajadaOn">On</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="textBajadaOff" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="textBajadaOff">Off</label>
                                    </div>
                                </label>
                            </div>
                            <div class="card" id="22">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Texto Bajada</h3>
                                            <br>
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="hidden" class="form-control" id="textBajada" name="textBajada" value="1">
                                                                    <input type="text" class="form-control" id="titBajada" name="titBajada" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <textarea id="mymce" name="textBajadaText" class="form-control"></textarea>

                                                            </div>
                                                        </div>
                                        </div>
                            </div>

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="textPrincipalOn" name="customRadio" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="textPrincipalOn">On</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="textPrincipalOff" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="textPrincipalOff">Off</label>
                                    </div>
                                </label>
                            </div>
                            <div class="card" id="3">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Texto Principal</h3>
                                            <br>
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="hidden" class="form-control" id="textPrincipal" name="textPrincipal" value="1">
                                                                    <input type="text" class="form-control" id="titPrincipal" name="titPrincipal" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <textarea id="mymce" name="textPrincipalText" class="form-control"></textarea>

                                                            </div>
                                                        </div>
                                        </div>
                            </div>

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="GaleriaOn" name="customRadio" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="GaleriaOn">On</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="GaleriaOff" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="GaleriaOff">Off</label>
                                    </div>
                                </label>
                            </div>
                            <div class="card" id="4">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Galeria de Imagenes</h3>

                                            <br>
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo Galeria</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="hidden" class="form-control" id="Galeria" name="Galeria" value="1">
                                                                    <input type="text" class="form-control" id="titGaleria" name="titGaleria" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Subir Imagen</label>
                                                            <div class="col-sm-9">
                                                                    <input type="file" id="GaleriaUrl" name="GaleriaUrl" class="dropify" />

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                                <label for="exampleInputuname3" class="col-sm-3 control-label">Galeria</label>
                                                                <div class="col-sm-9">
                                                                        <div id="image-popups" class="row">
                                                                                <div class="col-lg-2 col-md-4">
                                                                                    <a href="../assets/images/big/img1.jpg" data-effect="mfp-zoom-in"><img src="../assets/images/big/img1.jpg" class="img-responsive" />
                                                                                        <br/>Zoom</a>
                                                                                </div>
                                                                                <div class="col-lg-2 col-md-4">
                                                                                    <a href="../assets/images/big/img2.jpg" data-effect="mfp-newspaper"><img src="../assets/images/big/img2.jpg" class="img-responsive" />
                                                                                        <br/>Newspaper</a>
                                                                                </div>
                                                                                <div class="col-lg-2 col-md-4">
                                                                                    <a href="../assets/images/big/img3.jpg" data-effect="mfp-move-horizontal"><img src="../assets/images/big/img3.jpg" class="img-responsive" />
                                                                                        <br/>Horizontal move</a>
                                                                                </div>
                                                                                <div class="col-lg-2 col-md-4">
                                                                                    <a href="../assets/images/big/img4.jpg" data-effect="mfp-move-from-top"><img src="../assets/images/big/img4.jpg" class="img-responsive" />
                                                                                        <br/>Move from top</a>
                                                                                </div>
                                                                                <div class="col-lg-2 col-md-4">
                                                                                    <a href="../assets/images/big/img5.jpg" data-effect="mfp-3d-unfold"><img src="../assets/images/big/img5.jpg" class="img-responsive" />
                                                                                        <br/>3d unfold</a>
                                                                                </div>
                                                                                <div class="col-lg-2 col-md-4">
                                                                                    <a href="../assets/images/big/img6.jpg" data-effect="mfp-zoom-out"><img src="../assets/images/big/img5.jpg" class="img-responsive" />
                                                                                        <br/>Zoom-out</a>
                                                                                </div>
                                                                            </div>

                                                                </div>
                                                            </div>

                            </div>
                            </div>

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="ComoOn" name="customRadio" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="ComoOn">On</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="ComoOff" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="ComoOff">Off</label>
                                    </div>
                                </label>
                            </div>
                            <div class="card" id="5" style="display:none">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Texto Cómo</h3>
                                            <br>
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="hidden" class="form-control" id="Beneficio" name="Beneficio" value="0">
                                                                    <input type="text" class="form-control" id="titComo" name="titComo" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <textarea id="mymce" name="textComo" class="form-control"></textarea>

                                                            </div>
                                                        </div>
                                        </div>
                            </div>

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="CuandoOn" name="customRadio" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="CuandoOn">On</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="CuandoOff" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="CuandoOff">Off</label>
                                    </div>
                                </label>
                            </div>
                            <div class="card" id="6" style="display:none">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Texto Cuándo</h3>
                                            <br>
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="text" class="form-control" id="titCuando" name="titCuando" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <textarea id="mymce" name="textCuando" class="form-control"></textarea>

                                                            </div>
                                                        </div>
                                        </div>
                            </div>

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="DondeOn" name="customRadio" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="DondeOn">On</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="DondeOff" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="DondeOff">Off</label>
                                    </div>
                                </label>
                            </div>
                            <div class="card" id="7" style="display:none">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Texto Dónde</h3>
                                            <br>
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="text" class="form-control" id="titDonde" name="titDonde" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <textarea id="mymce" name="textDonde" class="form-control"></textarea>

                                                            </div>
                                                        </div>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Guardar</button>
                                        </div>
                            </div>

                            <div class="card" id="rango">
                                <div class="Box">


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
                            </div>

                            <div class="card" id="guardar">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Guardar información</h3>
                                            <br>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Guardar</button>
                                        </div>
                            </div>
                            </form>
                            <!-- <div class="card" id="8">
                                    <div class="card-body">
                                            <h4 class="card-title" >8. Title will be here</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                                            <p> enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                            <p> enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                    </div>
                            </div>
                            <div class="card" id="9">
                                    <div class="card-body">
                                            <h4 class="card-title" >9. Title will be here</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                                            <p> enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                            <p> enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                    </div>
                            </div>

                            <div class="card" id="10">
                                    <div class="card-body">
                                            <h4 class="card-title" >10. Title will be here</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                                            <p> enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                            <p> enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                    </div>
                            </div> -->
                        </div>
                    </div>
                    <script src="assets/plugins/switchery/dist/switchery.min.js"></script>
                    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
@endsection @push('css') @endpush @push('js')

 <script>
        // This is for the sticky sidebar
        $(".stickyside").stick_in_parent({
            offset_top: 100
        });
        $('.stickyside a').click(function() {
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top - 100
            }, 500);
            return false;
        });
        // This is auto select left sidebar
        // Cache selectors
        // Cache selectors
        var lastId,
            topMenu = $(".stickyside"),
            topMenuHeight = topMenu.outerHeight(),
            // All list items
            menuItems = topMenu.find("a"),
            // Anchors corresponding to menu items
            scrollItems = menuItems.map(function() {
                var item = $($(this).attr("href"));
                if (item.length) {
                    return item;
                }
            });

        // Bind click handler to menu items


        // Bind to scroll
        $(window).scroll(function() {
            // Get container scroll position
            var fromTop = $(this).scrollTop() + topMenuHeight - 250;

            // Get id of current scroll item
            var cur = scrollItems.map(function() {
                if ($(this).offset().top < fromTop)
                    return this;
            });
            // Get the id of the current element
            cur = cur[cur.length - 1];
            var id = cur && cur.length ? cur[0].id : "";

            if (lastId !== id) {
                lastId = id;
                // Set/remove active class
                menuItems
                    .removeClass("active")
                    .filter("[href='#" + id + "']").addClass("active");
            }
        });
        </script>

        <script type="text/javascript">

        $(document).ready(function() {


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



        //tipo contenido
            if ($('#tipocontenido').val()=='beneficio') {
                $('#botoncomo').show();
                $('#5').show();
                $('#botoncuando').show();
                $('#6').show();
                $('#botondonde').show();
                $('#7').show();
            };
            if ($("#mymce").length > 0) {
            tinymce.init({
                language : 'es',
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
        });
        </script> @endpush
