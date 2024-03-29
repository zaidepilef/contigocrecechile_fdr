@extends('layouts.appBase') @section('content')
<div class="row">
        <div class="col-12">
                <!-- Column -->
                <div class="card">
                    <div class="card-body little-profile text-center">
                        <h3 class="m-b-0">Contenidos Home</h3>
                    </div>
                </div>
                <!-- Column -->
            </div>
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <!-- Column -->
        <div class="card">
            <!-- <img class="card-img-top" src="../assets/images/background/profile-bg.jpg" alt="Card image cap">-->
            <div class="card-body little-profile text-center">
                <h3 class="m-b-0">Crear</h3>
				<button type="button" class="btn waves-effect waves-light btn-block btn-success" href="{{ route ('')}}">Crear Controles</button>
				<button type="button" class="btn waves-effect waves-light btn-block btn-success">Crear Benefícios</button>
                <button type="button" class="btn waves-effect waves-light btn-block btn-success">Crear Consejo</button>
                <button type="button" class="btn waves-effect waves-light btn-block btn-success">Crear Tarea</button>
                <button type="button" class="btn waves-effect waves-light btn-block btn-success">Crear Tema</button>
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
                <div class="card-body">
                       {{--  <h4 class="card-title">Tabla resultado </h4> --}}
                        <h6 class="card-subtitle">Mostrar Solo:</h6>

                        <div class="dt-buttons">
                                <a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23" href="#">

                                <span>Vacunas</span></a>
                                <a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                <span>Beneficios</span></a>
                                <a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                <span>Consejos</span>
                                </a>
                                <a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                <span>Tareas</span>
                                </a>
                                <a class="dt-button buttons-print" tabindex="0" aria-controls="example23" href="#">
                                <span>Temas</span>
                                </a>
                                </div>

                        <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


							<table
                                id="tablamultimediaini"
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
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">
                                            Angelica Ramos
                                        </td>
                                        <td>Chief Executive Officer (CEO)</td>
                                        <td>London</td>
                                        <td>47</td>
                                        <td>2009/10/09</td>
                                        <td>$1,200,000</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">Bradley Greer</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>41</td>
                                        <td>2012/10/13</td>
                                        <td>$132,000</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            Brenden Wagner
                                        </td>
                                        <td>Software Engineer</td>
                                        <td>San Francisco</td>
                                        <td>28</td>
                                        <td>2011/06/07</td>
                                        <td>$206,850</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">
                                            Brielle Williamson
                                        </td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2012/12/02</td>
                                        <td>$372,000</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">Bruno Nash</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>38</td>
                                        <td>2011/05/03</td>
                                        <td>$163,500</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">Caesar Vance</td>
                                        <td>Pre-Sales Support</td>
                                        <td>New York</td>
                                        <td>21</td>
                                        <td>2011/12/12</td>
                                        <td>$106,450</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">Cara Stevens</td>
                                        <td>Sales Assistant</td>
                                        <td>New York</td>
                                        <td>46</td>
                                        <td>2011/12/06</td>
                                        <td>$145,600</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
                                        <td>$433,060</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

        </div>

	</div>

	</div>
@endsection @push('css') @endpush @push('js') @endpush
