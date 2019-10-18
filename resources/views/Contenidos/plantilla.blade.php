
@extends('layouts.appBase') @section('content')
<!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                        <div class="col-lg-4 col-xlg-2 col-md-4">

                            <div class="stickyside">
                                <div class="card text-center">
                                        <div class="card-body little-profile text-center">
                                                <h3 class="m-b-0">Menu Plantilla</h3>
                                            </div>

                                    <div class="list-group" id="top-menu">

                                        <a href="#1" class="list-group-item active">Imagen Principal </a>
                                        <a href="#22" class="list-group-item">Texto Bajada </a>
                                        <a href="#3" class="list-group-item">Texto Principal  </a>
                                        <a href="#4" class="list-group-item">Galeria de Imagenes </a>
                                        <a href="#5" class="list-group-item">Cómo  </a>
                                        <a href="#6" class="list-group-item">Cuándo  </a>


                                        <a href="#7" class="list-group-item">Dónde  </a>
                                        <a href="#8" class="list-group-item">video  </a>
                                        <a href="#9" class="list-group-item">Audio </a>
                                        <a href="#10" class="list-group-item">Title will be 10</a>
                                    </div>
                                     <div class="card-body little-profile text-center">

                                          <button type="button" class="btn waves-effect waves-light btn-success" href="{{ route('')}}" >Guardar Contenido</button>
                                     </div>

                                </div>
                             </div>
                        </div>
                        <div class="col-lg-8 col-xlg-10 col-md-8">
                            <div class="card" id="1">

                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Imagen Principal</h3>
                                            <div class="m-b-30">

                                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-off" style="width: 172px;"><div class="bootstrap-switch-container" style="width: 255px; margin-left: -85px;"><span class="bootstrap-switch-handle-on bootstrap-switch-warning" style="width: 85px;">Enabled</span><span class="bootstrap-switch-label" style="width: 85px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-danger" style="width: 85px;">Disabled</span><input type="checkbox" checked="" data-on-color="warning" data-off-color="danger" data-on-text="Enabled" data-off-text="Disabled"></div></div> </div>
                                            <form class="form-horizontal p-t-20">
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="text" class="form-control" id="web" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <input type="file" id="input-file-now" class="dropify" />

                                                            </div>
                                                        </div>
                                            </form>

                                        </div>

                                {{-- <div class="card-body">
                                    <h4 class="card-title" >1. Title will be here</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                                    <p> enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                    <p> enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>

                                </div> --}}
                            </div>

                            <div class="card" id="22">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Texto Bajada</h3>
                                            <form class="form-horizontal p-t-20">
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="text" class="form-control" id="web" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <textarea id="mymce" name="area"></textarea>

                                                            </div>
                                                        </div>
                                            </form>
                                        </div>
                            </div>
                            <div class="card" id="3">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Texto Principal</h3>
                                            <form class="form-horizontal p-t-20">
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="text" class="form-control" id="web" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <textarea id="mymce" name="area"></textarea>

                                                            </div>
                                                        </div>
                                            </form>
                                        </div>
                            </div>

                            <div class="card" id="4">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Galeria de Imagenes</h3>

                                            <form class="form-horizontal p-t-20">
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo Galeria</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="text" class="form-control" id="web" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Subir Imagen</label>
                                                            <div class="col-sm-9">
                                                                    <input type="file" id="input-file-now" class="dropify" />

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
                                            </form>

                            </div>
                            </div>
                            <div class="card" id="5">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Texto Cómo</h3>
                                            <form class="form-horizontal p-t-20">
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="text" class="form-control" id="web" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <textarea id="mymce" name="area"></textarea>

                                                            </div>
                                                        </div>
                                            </form>
                                        </div>
                            </div>
                            <div class="card" id="6">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Texto Cuándo</h3>
                                            <form class="form-horizontal p-t-20">
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="text" class="form-control" id="web" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <textarea id="mymce" name="area"></textarea>

                                                            </div>
                                                        </div>
                                            </form>
                                        </div>
                            </div>
                            <div class="card" id="7">
                                    <div class="card-body little-profile text-center">
                                            <h3 class="m-b-0">Texto Dónde</h3>
                                            <form class="form-horizontal p-t-20">
                                                    <div class="form-group row">
                                                            <label for="web" class="col-sm-3 control-label">Titulo</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-world"></i></div>
                                                                    <input type="text" class="form-control" id="web" placeholder="Ingresa el Titulo Principal">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="form-group row">
                                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Resumen de Contenido</label>
                                                            <div class="col-sm-9">


                                                                    <textarea id="mymce" name="area"></textarea>

                                                            </div>
                                                        </div>
                                            </form>
                                        </div>
                            </div>
                            <div class="card" id="8">
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
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
@endsection @push('css') @endpush @push('js') @endpush
