@extends('layouts.appBase') 
@section('content')

<div class="row">

    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <!-- Column -->
        <div class="card">
            <!-- <img class="card-img-top" src="../assets/images/background/profile-bg.jpg" alt="Card image cap">-->
            <div class="card-body little-profile text-center">
                <h3 class="m-b-0">Accesos Rapidos</h3>

				<button type="button" class="btn waves-effect waves-light btn-block btn-success">Crear Notificaciones</button>
				<button type="button" class="btn waves-effect waves-light btn-block btn-success">Crear Multimedia</button>
				<button type="button" class="btn waves-effect waves-light btn-block btn-success">Crear Contenidos</button>

            </div>
        </div>
        <!-- Column -->
    </div>

    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#Notificaciones" role="tab">Notificaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#Multimedia" role="tab" >Multimedia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#Contenidos" role="tab" >Contenidos</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                
                <div class="tab-pane active" id="Notificaciones" role="tabpanel">
                    <div class="card-body">
                        <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
							<table id="tablanotificacionesini" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid"aria-describedby="example23_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th
                                            class="sorting_asc"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 196px;"
                                        >
                                            Name
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 298px;"
                                        >
                                            Position
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Office: activate to sort column ascending"
                                            style="width: 146px;"
                                        >
                                            Office
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Age: activate to sort column ascending"
                                            style="width: 60px;"
                                        >
                                            Age
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Start date: activate to sort column ascending"
                                            style="width: 128px;"
                                        >
                                            Start date
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Salary: activate to sort column ascending"
                                            style="width: 98px;"
                                        >
                                            Salary
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <!--second tab-->
                <div class="tab-pane" id="Multimedia" role="tabpanel">
                    <div class="card-body">
                        <div class="dt-buttons">
                            <a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                <span>Copy</span>
                            </a>
                                <a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                <span>CSV</span></a>
                                <a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                <span>Excel</span><
                                /a>
                                <a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                <span>PDF</span>
                                </a>
                                <a class="dt-button buttons-print" tabindex="0" aria-controls="example23" href="#">
                                <span>Print</span>
                                </a>
                        </div>

                        <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
							<table id="tablamultimediaini" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th
                                            class="sorting_asc"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 196px;"
                                        >
                                            Name
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 298px;"
                                        >
                                            Position
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Office: activate to sort column ascending"
                                            style="width: 146px;"
                                        >
                                            Office
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Age: activate to sort column ascending"
                                            style="width: 60px;"
                                        >
                                            Age
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Start date: activate to sort column ascending"
                                            style="width: 128px;"
                                        >
                                            Start date
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Salary: activate to sort column ascending"
                                            style="width: 98px;"
                                        >
                                            Salary
                                        </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">
                                            Position
                                        </th>
                                        <th rowspan="1" colspan="1">Office</th>
                                        <th rowspan="1" colspan="1">Age</th>
                                        <th rowspan="1" colspan="1">
                                            Start date
                                        </th>
                                        <th rowspan="1" colspan="1">Salary</th>
                                    </tr>
                                </tfoot>
                                
                            </table>
                        </div>

                    </div>
                </div>
                
                <div class="tab-pane" id="Contenidos" role="tabpanel">
                    <div class="card-body">
                        <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

							<table
                                id="tablacontenidoini"
                                class="display nowrap table table-hover table-striped table-bordered dataTable"
                                cellspacing="0"
                                width="100%"
                                role="grid"
                                aria-describedby="example23_info"
                                style="width: 100%;"
                            >
                                <thead>
                                    <tr role="row">
                                        <th
                                            class="sorting_asc"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 196px;"
                                        >
                                            Name
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 298px;"
                                        >
                                            Position
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Office: activate to sort column ascending"
                                            style="width: 146px;"
                                        >
                                            Office
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Age: activate to sort column ascending"
                                            style="width: 60px;"
                                        >
                                            Age
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Start date: activate to sort column ascending"
                                            style="width: 128px;"
                                        >
                                            Start date
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="example23"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Salary: activate to sort column ascending"
                                            style="width: 98px;"
                                        >
                                            Salary
                                        </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">
                                            Position
                                        </th>
                                        <th rowspan="1" colspan="1">Office</th>
                                        <th rowspan="1" colspan="1">Age</th>
                                        <th rowspan="1" colspan="1">
                                            Start date
                                        </th>
                                        <th rowspan="1" colspan="1">Salary</th>
                                    </tr>
                                </tfoot>
                                
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>

</div>

@endsection 
@push('css') 
@endpush 
@push('js') 
@endpush
