<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
/* use App\Period; */

Route::get('/', function () {
    // return view('index');
    return redirect('home');
});

//RUTAS LOGIN BEGIN
Route::get('/log_in', 'LoginController@index')->name('log_in');
Route::post('loginsave', 'LoginController@save')->name('loginsave'); //procesar y validar el ingreso al sistema
Route::get('/log_out', 'LoginController@out'); //salir de la sesion de usaurio
//RUTAS LOGIN END



Route::group(['middleware' => 'permisos'], function () {


    Route::get('/home', 'HomeController@index')->name('home');
    //ruta de prueba
    Route::get('/vacunas', 'HomeController@getVacunas')->name('getVacunas');
    //obtener Regiones
    Route::get('regiones', 'HomeController@getRegiones')->name('getRegiones');

    //creamos una ruta get
    Route::get('region/{id}', 'HomeController@obtenerRegion');
    Route::post('region', 'HomeController@actualizarRegion');
    //postman post parametros -1,2,4

    //rutas para notificaciones
    Route::get('/notification', 'Notification\NotificationController@index')->name('notification');
    Route::post('/notification/send', 'Notification\NotificationController@send')->name('notification.send');
    Route::get('/subperiodosSelect/{id}', 'Notification\NotificationController@subperiodosSelect')->name('subperiodosSelect');
    Route::post('ajaxRequest', 'Notification\NotificationController@ajaxRequestPost')->name('ajaxRequest');

    //******* */menu
    Route::get('/periodos', 'HomeController@gotoperiodos')->name('periodos');
    Route::get('/contenido', 'HomeController@gotocontenidos')->name('contenidos');
    Route::get('/gotoPlantilla', 'HomeController@gotoPlantilla')->name('gotoPlantilla');
    Route::get('/multimedia', 'HomeController@gotomultimedia')->name('multimedia');
    Route::get('/Vacunas', 'HomeController@gotovacunas')->name('vacunas');

    //rutas para Periodos
    Route::get('/buscarPeriodos', 'HomeController@buscarPeriodos')->name('buscarPeriodos');
    Route::post('/crearPeriodo', 'HomeController@crearPeriodo')->name('crearPeriodo');
    Route::post('/accionesPeriodo/{id}', 'HomeController@accionesPeriodo')->name('accionesPeriodo');
    Route::get('/gotosubperiodos', 'HomeController@gotosubperiodos')->name('gotosubperiodos');
    /* Route::get('/gotosubperiodos/{id}', 'HomeController@gotosubperiodos')->name('gotosubperiodos'); */
    Route::post('/crearSubperiodo', 'HomeController@crearSubperiodo')->name('crearSubperiodo');
    Route::post('/editarPeriodo', 'HomeController@editarPeriodo')->name('editarPeriodo');
    Route::post('/habilitarPeriodo', 'HomeController@habilitarPeriodo')->name('habilitarPeriodo');

    //rutas para Multimedia
    Route::get('/buscarMultimedia', 'HomeController@buscarMultimedia')->name('buscarMultimedia');
    Route::post('/crearMultimedia', 'HomeController@crearMultimedia')->name('crearMultimedia');
    Route::post('/eliminarMultimedia', 'HomeController@eliminarMultimedia')->name('eliminarMultimedia');
    Route::post('/editarMultimedia', 'HomeController@editarMultimedia')->name('editarMultimedia');
    Route::post('/habilitarMultimedia', 'HomeController@habilitarMultimedia')->name('habilitarMultimedia');

    //rutas metodos api
    Route::get('/buscarPeriodos', 'HomeController@buscarPeriodos')->name('buscarPeriodos');

    //rutas contenido
    Route::post('/crearContenido', 'HomeController@crearContenido')->name('crearContenido');
    Route::get('/eliminarContenido/{id}', 'HomeController@eliminarContenido')->name('eliminarContenido');
    Route::get('/editarContenido', 'HomeController@editarContenido')->name('editarContenido');

    //test 
    Route::get('/tabla', 'HomeController@gototabla')->name('tabla');
    Route::get('/habilitaTabla', 'HomeController@habilitaTabla')->name('habilitaTabla');


    // Administacion Usuarios Roles
    Route::get('/usuariosRoles', 'UsuariosRoles@index')->name('usuariosRoles');
    Route::post('/newUser', 'UsuariosRoles@newUser')->name('newUser');
    Route::get('/editUser/{id}', 'UsuariosRoles@editUser')->name('editUser');
    Route::post('/saveUser', 'UsuariosRoles@saveUser')->name('saveUser');
    Route::get('/deleteUser', 'UsuariosRoles@deleteUser')->name('deleteUser');
    Route::get('/roles', 'UsuariosRoles@roles')->name('roles');
    Route::post('/rolSave', 'UsuariosRoles@rolSave')->name('rolSave');
    Route::get('/miperfil', 'MiPerfilController@index')->name('miperfil');
});
