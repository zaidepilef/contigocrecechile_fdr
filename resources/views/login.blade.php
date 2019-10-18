<html lang="en">
<head>
    <!-- Tell the browser to be responsive to screen width -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href=" {{('assets/images/favicon-32x32.png') }}">
    <title>Chile Crece Back-End</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet">
    
    <!--Range slider CSS -->
    <link href="{{ asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinModern.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css')}} " rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('assets/css/colors/blue.css')}} " id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        
    <style type="text/css">
        .jqstooltip { 
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0,0,0,0.6);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            z-index: 10000;
        }
        .jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
    </style>
</head>

<body class="">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader" style="display: none;">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10">

            </circle>
        </svg>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-crece.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    @if ( $errors->any() )
                        <div class="alert alert-danger"> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            @foreach($errors->all() as $error)
                                <i class="ti-user"></i>{{$error}}
                            @endforeach
                        </div>
                    @endif
  
                    <form action="{{ route( 'loginsave' ) }}" id="login" method="post" >
                        @csrf
                        <h3 class="box-title m-b-20">Entrar</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Usuario o Usuario LDAP">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" id="pass_usuario" name="pass_usuario" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                    </form>

                   
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src=" {{ ('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src=" {{ ('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src=" {{ ('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src=" {{ ('assets/js/jquery.slimscroll.js')}} "></script>
    <!--Wave Effects -->
    <script src=" {{ ('assets/js/waves.js')}} "></script>
    <!--Menu sidebar -->
    <script src=" {{ ('assets/js/sidebarmenu.js')}} "></script>
    <!--stickey kit -->
    <script src=" {{ ('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}} "></script>
    <script src=" {{ ('assets/plugins/sparkline/jquery.sparkline.min.js')}} "></script>
    <!--Custom JavaScript -->
    <script src=" {{ ('assets/js/custom.min.js')}} "></script>
    <script src=" {{ ('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <!-- Range slider  -->
    <script src="{{ ('assets/plugins/ion-rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js')}} "></script>
    <script src="{{ ('assets/plugins/ion-rangeslider/js/ion-rangeSlider/ion.rangeSlider-init.js')}} "></script>
    <!-- TEXTO ENRRIQUEDCIDO -->
    <script src="{{ ('assets/plugins/tinymce/tinymce.min.js')}} "></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src=" {{ ('assets/plugins/styleswitcher/jQuery.style.switcher.js')}} "></script>
    <!-- SUBIR ARCHIVOS -->
    <script src=" {{ ('assets/plugins/dropify/dist/js/dropify.min.js')}} "></script>
    <!-- bt-switch -->
    <script src=" {{ ('assets/plugins/bootstrap-switch/bootstrap-switch.min.js')}}"></script>

    


</body>
</html>