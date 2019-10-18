<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
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


</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <img src=" {{ ('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                            <img src=" {{ ('assets/images/android-icon-36x36.png') }}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span style="color:white;font-weight:bold">
                            <label>Chcc-BackEnd</label>
                        </span>
                    </a>
                </div>

                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>

                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class="profile-pic"></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">

                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-text">
                                                <h4>{{ session('usernombre') }} {{ session('userapellido') }}</h4>
                                                <p class="text-muted">{{ session('usermail') }}</p>
                                                <p class="text-muted">{{ session('nombrerolusuario') }}</p>
                                                <p class="text-muted">{{ session('username') }}</p>

                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>

                                    <li><a href="{{ url('/log_out') }}"><i class="fa fa-power-off"></i> Salir</a></li>
                                </ul>

                            </div>
                        </li>
                    </ul>

                </div>

            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">

                <!-- Sidebar navigation-->
                @include('layouts.menuLateral')
                <!-- End Sidebar navigation -->

            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <a href="{{ route ('usuariosRoles') }}" class="link" data-toggle="tooltip" title="Administracion de Ususarios y Roles"><i class="ti-settings"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->



        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                @yield('content')

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                {{date('Y')}}© Chile Crece Contigo
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

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

    <script>
        $(document).ready(function() {

            $(function() {
                $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
            });

            //******************************************////TEXTO ENRRIQUECIDO
            if ($("#mymce").length > 0) {
                tinymce.init({
                    language: 'es',
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
            //******************************************////FIN TEXTO ENRRIQUECIDO
            //******************************************////upload file
            // Basic
            $('.dropify').dropify();

            //******************************************////fin upload file

            //******************************************//TABLAS INICIO RAPIDO //***************************************************************************
            $('#tablanotificacionesini').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('#tablamultimediaini').DataTable({

            });
            $('#tablacontenidoini').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            });

            //******************************************//FIN TABLAS INICIO RAPIDO //***************************************************************************

            //******************************************// contenidos//***************************************************************************

            var tablaContenido = $('#tablaContenido').DataTable({
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

            //******************************************//PERIODOS //***************************************************************************




        });
    </script>

    @stack('js')

</body>

</html>