<?php


// use App\User;
use App\Rol;
use App\Modulo;
use App\RolesModulos;

$roles = Rol::all();
$modulos = Modulo::all();

$rolIdUsuario = session('userrol');
$rolNombreUsuario = session('nombrerolusuario');
$modulosUsuario = RolesModulos::select('rol_id', 'module_id')->where('rol_id', $rolIdUsuario)->get();

foreach ($modulosUsuario as $item) {
    $_mod = $item->module_id;
    $modulos = Modulo::select('id', 'module_name', 'module_description')->where('id', $_mod)->get();
    echo "<pre>";
    //print_r($modulos);
    echo "</pre>";
}


?>
<!-- Sidebar navigation-->
<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="nav-small-cap">PERSONAL</li>


        @foreach($modulosUsuario as $item)
        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ url('/') }}">{{$item->module_id}}</a></li>
            </ul>
        </li>
        @endforeach
        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ url('/') }}">Inicio</a></li>
            </ul>
        </li>

        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bell-ring"></i><span class="hide-menu">Notificaciones</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route ('notification')}}">Notificaciones</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Periodos</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route ('periodos')}}">Periodos</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Contenidos</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route ('contenidos')}}">Contenido </a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Multimedia</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route ('multimedia')}}">Multimedia </a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Vacunas</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route ('multimedia')}}">Vacunas </a></li>
            </ul>
        </li>

        <li class="nav-devider"></li>

        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="mdi mdi-account-multiple-plus"></i>
                <span class="hide-menu">Usuarios y Roles</span>
            </a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route ('usuariosRoles')}}">Usuarios</a></li>
                <li><a href="{{ route ('roles')}}">Roles del Sistema</a></li>
            </ul>
        </li>


    </ul>
</nav>
<!-- End Sidebar navigation -->