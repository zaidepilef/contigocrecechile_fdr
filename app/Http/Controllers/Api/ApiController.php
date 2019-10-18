<?php

namespace App\Http\Controllers\Api;

use App\Child;
use App\Content;
use App\Http\Controllers\Controller;
use App\Period;
use App\Subperiod;
use App\User_app;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    protected function testing()
    {

        return "hola";
    }



    protected function create(Request $data)
    {
        return User_app::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'region' => $data['region'],
            'tipo_user' => $data['tipo_user'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(60),
        ]);
    }

    //VALIDA AL USUARIO
    /*     public function validaUsuario($email, $password) */
    public function validaUsuario($email, $password)
    {
        return ['email' => $email, 'PASS' => $password];
        try {
            $periodos = Period::all();
            return $periodos;
            $User_app = User_app::select()
                ->where('User_apps.email', $email)
                ->where('User_apps.password', $password)
                ->get()->toArray();
        } catch (Exception $e) {
            return ['created' => false];
        }

        return $User_app;
    }

    //REGISTRA AL USUARIO
    public function addUsuario(Request $request)
    {
        return $request;
        try {

            /*      $periodArray = [];
            $periodArray['nombre'] = $request['nombre'];
            $periodArray['url_imagen'] = $request['url_imagen'];
            $periodArray['tipo_periodo'] = $request['tipo_periodo'];
            $periodArray['unidad'] = $request['unidad'];

            $period = Period::create($periodArray); */

            /*   User_app::create($request->all());
        return ['created' => true]; */ } catch (Exception $e) {
            return ['created' => false];
        }
    }
    //*********************HIJOS******************************************************************** */
    //AGREGA UN HIJO
    public function addHijo(Request $request)
    {
        try {
            Child::create($request->all());
            return ['created' => true];
        } catch (Exception $e) {
            return ['created' => false];
        }
    }

    // TRAE TODOS LOS HIJOS DEL USUARIO
    public function getHijos(Request $request)
    {
        try {
            $periodArray = [];
            $periodArray['nombre'] = $request['id'];
            $periodArray['url_imagen'] = $request['url_imagen'];
            $periodArray['tipo_periodo'] = $request['tipo_periodo'];
            $periodArray['unidad'] = $request['unidad'];

            $period = Period::create($periodArray);
        } catch (Exception $e) {
            /*   echo ($e); */ }
    }
    //*********************FIN HIJOS******************************************************************** */
    public function getPeriodos()
    {
        try {
            //$periodos = Period::all();
            $periodos = Period::select('periods.id', 'periods.nombre', 'periods.url_imagen', 'periods.tipo_periodo', 'periods.unidad', 'ranges.inicio', 'ranges.fin', 'ranges.id as id_Rango')
                ->join('ranges', 'ranges.id_periodo', 'periods.id')->get();
            foreach ($periodos as $period) {
                $period->subperiodo = Subperiod::select('subperiods.id', 'subperiods.nombre', 'ranges.inicio', 'ranges.fin', 'ranges.id as id_Rango')
                    ->join('ranges', 'ranges.id_Subperiodo', 'subperiods.id')
                    ->where('ranges.id_periodo', $period['id'])
                    ->get()->toArray();
            }
        } catch (Exception $e) {

            $periodos = "Error";
            /*   echo ($e); */
        }
        return $periodos;
    }

    public function getContenido()
    {
        try {
            $beneficio = Content::orderBy('orden')
                ->where('contents.tipo_contenido', 'beneficio')->get()->all(); // ordenar por ecampo orden

            $consejo = Content::orderBy('orden')
                ->where('contents.tipo_contenido', 'consejo')->get()->all();

            $tema = Content::orderBy('orden')
                ->where('contents.tipo_contenido', 'tema')->get()->all();

            $contenido;
            $contenido['temas'] = $tema;
            $contenido['beneficios'] = $beneficio;
            $contenido['consejos'] = $consejo;


            /*  $contenido = Content::all();
            foreach ($contenido as $content) {
            $content->subperiodo = Range::select('periods.nombre as Periodo', 'subperiods.nombre as subperiodo')
            ->join('periods', 'periods.id', 'ranges.id_periodo')
            ->join('subperiods', 'subperiods.id', 'ranges.id_Subperiodo')
            ->where('ranges.id', $content['id_Rango'])
            ->get()->toArray();

            } */

            /* $contenido = Content::select('contents.id', 'contents.tipo_contenido', 'contents.texto_principal_titulo as titulo', 'periods.nombre as Periodo') //, 'subperiods.nombre as subperiodo')
                ->join('ranges', 'ranges.id', 'contents.id_Rango')
                ->join('periods', 'periods.id', 'ranges.id_periodo')
                ->join('subperiods', 'subperiods.id', 'ranges.id_Subperiodo')
                ->get()->toArray(); */
        } catch (Exception $e) {
            /*   echo ($e); */ }
        return $contenido;
    }

    public function getData()
    {
        try {
            //$periodos = Period::all();
            $periodos = Period::select('periods.id', 'periods.nombre', 'periods.url_imagen', 'periods.tipo_periodo', 'periods.unidad', 'ranges.inicio', 'ranges.fin', 'ranges.id as id_Rango')
                ->join('ranges', 'ranges.id_periodo', 'periods.id')->get();
            foreach ($periodos as $period) {
                $period->subperiodo = Subperiod::select('subperiods.id', 'subperiods.nombre', 'ranges.inicio', 'ranges.fin', 'ranges.id as id_Rango')
                    ->join('ranges', 'ranges.id_Subperiodo', 'subperiods.id')
                    ->where('ranges.id_periodo', $period['id'])
                    ->get()->toArray();
            }
            foreach ($sub as $period->subperiodo) {

                $beneficio = Content::orderBy('orden')
                    ->where('contents.tipo_contenido', 'beneficio')->get()->all(); // ordenar por ecampo orden

                $consejo = Content::orderBy('orden')
                    ->where('contents.tipo_contenido', 'consejo')->get()->all();

                $tema = Content::orderBy('orden')
                    ->where('contents.tipo_contenido', 'tema')->get()->all();

                $contenido;
                $contenido['temas'] = $tema;
                $contenido['beneficios'] = $beneficio;
                $contenido['consejos'] = $consejo;
            }
        } catch (Exception $e) {
            /*   echo ($e); */ }
        return $periodos;
    }
}
