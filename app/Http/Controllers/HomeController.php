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
        return $regiones;
    }

    public function obtenerRegion($id)
    {
        $regiones = Region::where('id', '=', $id)->get();
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
            $period->rango = Range::select('ranges.id', 'ranges.inicio', 'ranges.fin')
                ->where('ranges.id_periodo', $period['id'])
                ->where('ranges.id_subperiodo', null)
                ->get();

            /* $period->url_imagen = base64_decode($period->url_imagen); */
        }

        /*  dd($periodos); */



        $selectTipoPeriodo = [];
        array_push($selectTipoPeriodo, ['crecimiento', 'Crecimiento']);
        array_push($selectTipoPeriodo, ['control', 'Control']);
        array_push($selectTipoPeriodo, ['vacunas', 'Vacunas']);
        $selectUnidad = [];
        array_push($selectUnidad, ['semana', 'Semana']);
        array_push($selectUnidad, ['mes', 'Mes']);
        array_push($selectUnidad, ['ano', 'Año']);


        return view('Periodos.index', ['period' => $periodos], ['selectUnidad' => $selectUnidad])->with('selectTipoPeriodo', $selectTipoPeriodo); //, ['selectTipoPeriodo' => $selectTipoPeriodo]);
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
        $rules = [
            'nombre' => 'required|max:255',
            /* 'url_imagen' => 'required', */
            'tipo_periodo' => 'required',
            'divunidad' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido .',
            'nombre.max' => 'El nombre  no puede ser mayor a :255 caracteres.',
            'url_imagen.required' => 'La Imagen es requerida.',
            'tipo_periodo.required' => 'El Tipo de Periodo es requerido.',
            'divunidad.required' => 'La Unidad es requerida.',
            'inicio.required' => 'Agrega el inicio.',
            'fin.required' => 'Agrega el fin.',
        ];

        $this->validate($request, $rules, $messages);

        /*
		$rules = [
			'student' => 'required|max:20',
			'score' => 'required|numeric|min:1|max:10',
		];
        $messages = [
            'student.required' => 'Agrega el nombre del estudiante.',
            'student.max' =>'El nombre del estudiante no puede ser mayor a :max caracteres.',
            'score.required' => 'Agrega la puntuación al estudiante.',
            'score.numeric' => 'La puntuación debe ser un número',
            'score.between' => 'La puntuación debe estar entre :min y :max'
        ];
		*/

        //como validar un file

        try {

            $periodArray = [];
            if ($request->file('url_imagen') != "") {
                $periodArray['url_imagen'] = base64_encode(file_get_contents($request->file('url_imagen')));
            }
            $periodArray['nombre'] = $request['nombre'];
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
                    if ($request->file('url_imagen') != "") {
                        $periodo->url_imagen = base64_encode(file_get_contents($request->file('url_imagen')));
                    }
                    $periodo->tipo_periodo = $request->input('tipo_periodo');
                    $periodo->unidad = $request->input('divunidad');
                    $periodo->save();


                    $range = Range::find($request->input('id_rango'));
                    $range->inicio = $request['inicio'];
                    $range->fin = $request['fin'];
                    $range->save();


                    return redirect()->route('periodos')->with('success', 'Registro Editado satisfactoriamente');
                    break;
            }
        } catch (Exception $e) {


            /*   echo ($e); */ }
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

                case 'Habilitar':

                    /*         $peridos= Period::where('id',$id)->get(); */
                    /*   $peridos= Period::find($id)->get();
                   dd($peridos);
                   $peridos->estado="habilitado";  
                   $peridos->save(); */
                    return redirect()->route('periodos')->with('success', 'Registro eliminado satisfactoriamente');
                    break;

                case 'Deshabilitar':
                    /*   $peridos= Period::find($id)->get();
                    dd($peridos);
                    $peridos->estado="deshabilitado";  
                    $peridos->save(); */
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

        /* dd($request->get('id')); */
        $periodo = Period::find($request->get('id'));

        $periodo->rangos = Range::select('ranges.inicio', 'ranges.fin')
            ->where('ranges.id_periodo', $request->get('id'))
            ->where('ranges.id_subperiodo', null)
            ->get();

        $subperiodo = Subperiod::select('subperiods.id', 'subperiods.unidad', 'subperiods.nombre', 'ranges.id as id_rango', 'ranges.inicio', 'ranges.fin', 'ranges.id_periodo')
            ->join('ranges', 'ranges.id_Subperiodo', 'subperiods.id')
            ->where('ranges.id_periodo', $request->get('id'))
            ->get();


        return view('Periodos.subperiodo', ['periodo' => $periodo], ['subperiodo' => $subperiodo]);
    }

    public function crearSubperiodo(Request $request)
    {


        $rules = [
            'nombre' => 'required|max:255',
            /* 'url_imagen' => 'required', */
            /*   'tipo_periodo' => 'required', */
            'divunidad' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido .',
            'nombre.max' => 'El nombre  no puede ser mayor a :255 caracteres.',
            /*    'url_imagen.required' => 'La Imagen es requerida.', */
            /*    'tipo_periodo.required' => 'El Tipo de Periodo es requerido.', */
            'divunidad.required' => 'La Unidad es requerida.',
            'inicio.required' => 'Agrega el inicio.',
            'fin.required' => 'Agrega el fin.',
        ];
        try {

            $SubperiodArray = [];
            $SubperiodArray['nombre'] = $request['nombre'];
            $SubperiodArray['unidad'] = $request->input('divunidad');



            switch ($request->input('action')) {
                case 'Guardar':
                    $subperiod = Subperiod::create($SubperiodArray);


                    //se crea el rango
                    $rangeArray = [];
                    $rangeArray['inicio'] = $request['inicio'];
                    $rangeArray['fin'] = $request['fin'];
                    $rangeArray['id_periodo'] = $request['id_periodo'];
                    $rangeArray['id_subperiodo'] = $subperiod->id;
                    $range = Range::create($rangeArray);
                    return redirect()->route('gotosubperiodos', ['id' => $request['id_periodo']])->with('success', 'Registro Creado satisfactoriamente');
                    break;
                case 'Editar':

                    //se edita el periodo
                    $periodo = Subperiod::find($request->get('id_subperiodo'));
                    $periodo->nombre = $request->input('nombre');
                    $periodo->unidad = $request->input('divunidad');
                    $periodo->save();


                    $range = Range::find($request->input('id_rango'));
                    $range->inicio = $request['inicio'];
                    $range->fin = $request['fin'];
                    $range->save();

                    return redirect()->route('gotosubperiodos', ['id' => $request['id_periodo']])->with('success', 'Registro Editado satisfactoriamente');
                    break;
            }
        } catch (Exception $e) {


            /*   echo ($e); */ }
    }

    public function habilitaTabla(Request $request)
    {
        dd($request->get('id'));
    }


    //****************************** FIN PERIODOS **************************************** */
    //****************************** CONTENIDOS   **************************************** */
    //****************************** CONTENIDOS   **************************************** */
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
    }

    public function habilitarcontenidos()
    { }

    public function eliminarcontenidos()
    { }

    public function editarcontenidos()
    { }

    public function gotoPlantilla(Request $request)
    {

        $selectTipoPeriodo = [];
        array_push($selectTipoPeriodo, ['crecimiento', 'Crecimiento']);
        array_push($selectTipoPeriodo, ['control', 'Control']);
        array_push($selectTipoPeriodo, ['vacunas', 'Vacunas']);


        $periodos = Period::select('periods.id', 'periods.nombre')->get();

        return view('Contenidos.plantilla', ['tipocontenido' => $request->input('action')], ['periodos' => $periodos])->with('selectTipoPeriodo', $selectTipoPeriodo);
    }

    public function subperiodosSelect($id)
    {
        return Subperiod::select('subperiods.id', 'subperiods.nombre')
            ->join('ranges', 'ranges.id_Subperiodo', 'subperiods.id')
            ->where('ranges.id_periodo', $id)
            ->get();
    }

    public function crearContenido(Request $request)
    {
        try {

            $contentArray = [];
            $range = Range::select('ranges.id')
                ->where('ranges.id_periodo', $request['selectPeriodo'])
                ->where('ranges.id_subperiodo',  $request['selectSubPeriodo'])
                ->get()->first();

            $contentArray['id_Rango'] = $range->id;

            $contentArray['tipo_contenido'] = $request['tipocontenido'];
            $contentArray['imagen_principal'] = $request['imgPrincipal'];
            $contentArray['imagen_principal_titulo'] = $request['imgTitulo'];
            if ($request->file('imgPrincipalUrl') != "") {
                $periodArray['imagen_principal_url'] = base64_encode(file_get_contents($request->file('imgPrincipalUrl')));
            }


            $contentArray['texto_bajada'] = $request['textBajada'];
            $contentArray['texto_bajada_titulo'] = $request['titBajada'];
            $contentArray['texto_bajada_text'] = $request['textBajadaText'];

            $contentArray['texto_principal'] = $request['textPrincipal'];
            $contentArray['texto_principal_titulo'] = $request['titPrincipal'];
            $contentArray['texto_principal_text'] = $request['textPrincipalText'];

            $contentArray['galeria'] = $request['Galeria'];
            $contentArray['galeria_titulo'] = $request['titGaleria'];
            $contentArray['galeria_url'] = $request['GaleriaUrl'];

            $contentArray['beneficio'] = $request['Beneficio'];
            $contentArray['beneficio_como'] = $request['textComo'];
            $contentArray['beneficio_cuando'] = $request['textCuando'];
            $contentArray['beneficio_donde'] = $request['textDonde'];

            $contentArray['orden'] = 1; //id

            $content = Content::create($contentArray);

            $content = Content::all();
            return view('Contenidos.index', ['content' => $content]);
            
        } catch (Exception $e) {
            /*   echo ($e); */ }
        $content = Content::all();
        return view('Contenidos.index', ['content' => $content]);
    }

    public function eliminarContenido(Request $request, $id)
    {
        try {
            Content::find($id)->delete();
            return redirect()->route('contenidos')->with('success', 'Registro eliminado satisfactoriamente');
            $content = Content::all();
            return view('Contenidos.index', ['content' => $content]);
        } catch (exeption $e) {
            /*   return redirect()->route('periodo.index')->with('error', 'hola mf'); */ 
        }
    }

    public function editarContenido(Request $request)
    {
        $selectTipoPeriodo = [];
        array_push($selectTipoPeriodo, ['crecimiento', 'Crecimiento']);
        array_push($selectTipoPeriodo, ['control', 'Control']);
        array_push($selectTipoPeriodo, ['vacunas', 'Vacunas']);
        $periodos = Period::select('periods.id', 'periods.nombre')->get();
        $content = Content::find($request['editar']);
        return view('Contenidos.modificar', ['tipocontenido' => $content->tipocontenido], ['periodos' => $periodos])->with('selectTipoPeriodo', $selectTipoPeriodo)->with('content', $content);
    }


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
    }

    public function habilitarmultimedia()
    { }

    public function eliminarmultimedia()
    { }

    public function editarmultimedia()
    { }

    //******************************FIN MULTIMEDIA******************************************* */
    //******************************FIN Usuario******************************************* */


    //******************************FIN Usuario******************************************* */
    //************************************************************************************ */
    public function gotovacunas()
    {
        return view('Vacunas.index');
    }

    //************************************************************************************ */
    public function gototabla()
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

        return view('Contenidos.tabla', ['content' => $contenido]);
    }
    
}
