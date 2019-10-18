<?php

namespace App\Http\Controllers;

use App\Content;
use App\Period;
use App\Range;
use App\Region;
use App\Subperiod;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function getVacunas()
    {
        return ("vacunas del 2019");
    }

    public function getRegiones()
    {
        $regiones = Region::all();
        //dd($regiones);
        return $regiones;
    }

    public function obtenerRegion($id)
    {

        // $regiones = Region::where('id','=',1)
        // ->where('name','=','tarapaca')
        // ->where('ordinal','=','I')
        // ->get();

        $regiones = Region::where('id', '=', $id)->get();
        // $regiones = Region::all();
        //dd($regiones);
        return $regiones;
    }

    public function actualizarRegion(Request $request)
    {
        //dd($request);
        //$request->name.
        //$request->ordinal.
        $region = Region::save($request);

        return "actualizar region";
    }

    //******************************PERIODOS******************************************* */
    public function gotoperiodos()
    {
        $periodos = Period::all();
        foreach ($periodos as $period) {
            /*   $period->subperiodo = Subperiod::select('subperiods.id', 'subperiods.nombre')
                ->join('ranges', 'ranges.id_Subperiodo', 'subperiods.id')
                ->where('ranges.id_periodo', $period['id'])
                ->get()->toArray(); */
            $period->rango = Range::select('ranges.id', 'ranges.inicio', 'ranges.fin')
                ->where('ranges.id_periodo', $period['id'])
                ->where('ranges.id_subperiodo', null)
                ->get()->toArray();
        }

        /*   dd($periodos); */
        return view('Periodos.index', ['period' => $periodos]);
    }

    public function buscarPeriodos()
    {
        $periodos = Period::all();
        foreach ($periodos as $period) {
            $period->subperiodo = Subperiod::select('subperiods.id', 'subperiods.nombre')
                ->join('ranges', 'ranges.id_Subperiodo', 'subperiods.id')
                ->where('ranges.id_periodo', $period['id'])
                ->get()->toArray();
        }
        $json = json_encode($periodos);
        return $json;
    }

    public function crearPeriodo(Request $request)
    {

        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'url_imagen' => 'required',
            'tipo_periodo' => 'required',
            'divunidad' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
        ]);

        try {

            $periodArray = [];
            $periodArray['nombre'] = $request['nombre'];
            $periodArray['url_imagen'] = base64_encode(file_get_contents($request->file('url_imagen'))); //url_imagen
            $periodArray['tipo_periodo'] = $request->input('tipo_periodo');
            $periodArray['unidad'] = $request->input('divunidad');

            switch ($request->input('action')) {
                case 'Guardar':
                    $period = Period::create($periodArray);
                    //se crea el rango
                    $rangeArray = [];
                    $rangeArray['inicio'] = $request['inicio'];
                    $rangeArray['fin'] = $request['fin'];
                    $rangeArray['id_periodo'] = $period->id;
                    $range = Range::create($rangeArray);
                    return redirect()->route('periodos')->with('success', 'Registro Creado satisfactoriamente');
                    break;
                case 'Editar':

                    //se edita el periodo
                    $periodo = Period::find($request->get('id_periodo'));
                    $periodo->nombre = $request->input('nombre');
                    $periodo->url_imagen =  base64_encode(file_get_contents($request->file('url_imagen')));
                    $periodo->tipo_periodo = $request->input('tipo_periodo');
                    $periodo->unidad = $request->input('divunidad');
                    $periodo->save();


                    //se edita el rango   ->where('ranges.id_subperiodo', null) esto es para reconocer en la tabla cual es el ranbgo que pertenece a periodo
                    $range = Range::select('ranges.id', 'ranges.inicio', 'ranges.fin', 'ranges.id_subperiodo', 'ranges.id_periodo')
                        ->where('ranges.id_periodo', $request->get('id_periodo'))
                        ->where('ranges.id_subperiodo', null)
                        ->get();


                    $range[0]->inicio = $request['inicio'];
                    $range[0]->fin = $request['fin'];
                    $range[0]->save();

                    dd($range[0]->fin);
                    return redirect()->route('periodos')->with('success', 'Registro Editado satisfactoriamente');
                    break;
            }
        } catch (Exception $e) {
            /*   echo ($e); */ 
        }
        $periodos = Period::all();
        return view('Periodos.index', ['period' => $periodos]);
    }

    public function habilitarPeriodo()
    { }

    public function accionesPeriodo(Request $request, $id)
    {
        try {
            switch ($request->input('action')) {
                case 'Subperiodos':
                    return redirect()->action(
                        'HomeController@gotosubperiodos',
                        ['id' => $id]
                    );
                    break;
                case 'Eliminar':
                    Period::find($id)->delete();
                    return redirect()->route('periodos')->with('success', 'Registro eliminado satisfactoriamente');
                    break;
            }
            $periodos = Period::all();
            return view('Periodos.index', ['period' => $periodos]);
        } catch (exeption $e) {
            /*   return redirect()->route('periodo.index')->with('error', 'hola mf'); */ }
    }

    public function editarPeriodo()
    { }

    /*    Subperiodos */
    public function gotosubperiodos(Request $request)
    {

        /*  dd($request); */
        $periodo = Period::find($request->get('id'));


        $periodo->rangos = Range::select('ranges.inicio', 'ranges.fin')

            ->where('ranges.id_periodo', $request->get('id'))
            ->where('ranges.id_subperiodo', null)
            ->get();



        $subperiodo = Subperiod::select('subperiods.id', 'subperiods.nombre', 'ranges.id as id_rango', 'ranges.inicio', 'ranges.fin', 'ranges.id_periodo')
            ->join('ranges', 'ranges.id_Subperiodo', 'subperiods.id')

            ->where('ranges.id_periodo', $request->get('id'))
            ->get();


        /* dd($subperiodo); */

        return view('Periodos.subperiodo', ['periodo' => $periodo], ['subperiodo' => $subperiodo]);
    }

    public function crearSubperiodo(Request $request)
    {

        try {
            $SubperiodArray = [];
            $SubperiodArray['nombre'] = $request['nombre'];
            $SubperiodArray['unidad'] = $request->input('divunidad');
            $subperiod = Subperiod::create($SubperiodArray);


            //se crea el rango
            $rangeArray = [];
            $rangeArray['inicio'] = $request['inicio'];
            $rangeArray['fin'] = $request['fin'];
            $rangeArray['id_periodo'] = $request['id_periodo'];
            $rangeArray['id_subperiodo'] = $subperiod->id;
            $range = Range::create($rangeArray);
        } catch (Exception $e) { }

        /*  $periodo = Period::find($request['id_periodo']);
            $subperiodo= Subperiod::select('subperiods.id', 'subperiods.nombre','ranges.id', 'ranges.inicio', 'ranges.fin','ranges.id_periodo')
            ->join('ranges', 'ranges.id_Subperiodo', 'subperiods.id')
            ->where('ranges.id_periodo', $request['id_periodo'])
            ->get()->toArray();
      */

        /*    return redirect()->route('gotosubperiodos')->with('success', 'Registro eliminado satisfactoriamente'); */

        /*       return view('Periodos.subperiodo', ['periodo' => $periodo], ['subperiodo' => $subperiodo]);
        /* return redirect()->route('subperiodo')->with('subperiodo', $subperiodo); */
        /*   return view('Periodos.subperiodo', ['subperiodo' => $subperiodo]); */

        return redirect()->route('gotosubperiodos', ['id' => $request['id_periodo']])->with('success', 'Registro Creado satisfactoriamente');
    }

    //*******************************FIN PERIODOS******************************************** */
    //******************************CONTENIDOS******************************************* */
    public function gotocontenidos()
    {
        $contenido = Content::all();
        foreach ($contenido as $content) {
            $periodo = Range::select('periods.nombre as periodo')
                ->join('periods', 'periods.id', 'ranges.id_periodo')
                ->where('ranges.id', $content['id_Rango'])
                ->get()->first();
            $content->periodo = $periodo->periodo;
            $subperiodo = Range::select('subperiods.nombre as subperiodo')
                ->join('subperiods', 'subperiods.id', 'ranges.id_Subperiodo')
                ->where('ranges.id', $content['id_Rango'])
                ->get()->first();



            if ($subperiodo != NULL) {
                $content->subperiodo = $subperiodo->subperiodo;
            } else {
                $content->subperiodo = "";
            }
        }

        return view('Contenidos.index', ['content' => $contenido]);
    }
    public function crearcontenidos(Request $request)
    {
        $request->periodo;
        dd("$request");
        /* Period::save($request->all()); */
    }
    public function habilitarcontenidos()
    { }
    public function eliminarcontenidos()
    { }
    public function editarcontenidos()
    { }
    //***************************FIN CONTENIDOS******************************************* */
    //******************************MULTIMEDIA******************************************* */
    public function gotomultimedia()
    {
        return view('Multimedia.index');
    }

    public function crearmultimedia(Request $request)
    {
        $request->periodo;
        dd("$request");
        /* Period::save($request->all()); */
    }
    
    public function habilitarmultimedia()
    { }
    public function eliminarmultimedia()
    { }
    public function editarmultimedia()
    { }

    //******************************FIN MULTIMEDIA******************************************* */

    //******************************FIN Usuario******************************************* */
    public function validaUsuario(Request $request)
    { }
    //******************************FIN Usuario******************************************* */
    //************************************************************************************ */
    public function gotovacunas()
    {

        return view('Vacunas.index');
    }
    //************************************************************************************ */
    public function gotoPlantilla()
    {
        /*   dd($id); */
        /*   echo ($id); */

        /* dd("holaaaaaaaaaaaaaaaaaaaaaaa"); */
        return view('Contenidos.plantilla');
    }
}
