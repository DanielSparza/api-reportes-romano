<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reportes = Reporte::join('servicios', 'reportes.fk_servicio', '=', 'servicios.clave_servicio')
            ->join('clientes', 'servicios.fk_cliente', '=', 'clientes.fk_clave_persona')
            ->join('comunidades', 'clientes.fk_comunidad', '=', 'comunidades.clave_comunidad')
            ->join('ciudades as ciudad_cliente', 'comunidades.fk_ciudad', '=', 'ciudad_cliente.clave_ciudad')
            ->join('personas as nombre_cliente', 'clientes.fk_clave_persona', '=', 'nombre_cliente.clave_persona')
            ->select(
                'reportes.clave_reporte',
                'reportes.problema',
                'reportes.veces_reportado',
                'reportes.fecha_reporte',
                'comunidades.comunidad',
                'ciudad_cliente.ciudad'
            )->where('reportes.estatus', '=', 'Pendiente')
            ->orderBy('reportes.veces_reportado', 'DESC')
            ->orderBy('reportes.fecha_reporte', 'ASC')
            ->get();

        return response()->json($reportes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $reporte = new Reporte();
        $reporte->fk_servicio = $request->fk_servicio;
        $reporte->problema = $request->problema;
        $reporte->veces_reportado = $request->veces_reportado;
        $reporte->reporto = $request->reporto;
        $reporte->fecha_reporte = $request->fecha_reporte;
        $reporte->hora_reporte = $request->hora_reporte;
        $reporte->estatus = $request->estatus;

        $reporte->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fecha_filtro, $estatus)
    {
        //
        $reportes = Reporte::join('servicios', 'reportes.fk_servicio', '=', 'servicios.clave_servicio')
            ->join('clientes', 'servicios.fk_cliente', '=', 'clientes.fk_clave_persona')
            ->join('comunidades', 'clientes.fk_comunidad', '=', 'comunidades.clave_comunidad')
            ->join('ciudades as ciudad_cliente', 'comunidades.fk_ciudad', '=', 'ciudad_cliente.clave_ciudad')
            ->join('personas as nombre_cliente', 'clientes.fk_clave_persona', '=', 'nombre_cliente.clave_persona')
            ->leftjoin('personas as tecnico', 'reportes.fk_tecnico', '=', 'tecnico.clave_persona')
            ->select(
                'reportes.clave_reporte',
                'reportes.problema',
                'reportes.veces_reportado',
                'reportes.reporto',
                'reportes.fecha_reporte',
                'reportes.hora_reporte',
                'reportes.estatus',
                'reportes.fecha_finalizacion',
                'reportes.hora_finalizacion',
                'reportes.observaciones',
                'nombre_cliente.nombre as cliente',
                'comunidades.comunidad',
                'ciudad_cliente.ciudad',
                'clientes.direccion',
                'clientes.nexterior',
                'tecnico.nombre as tecnico'
            )->where('reportes.fecha_reporte', '=', $fecha_filtro)
            ->where('reportes.estatus', 'LIKE', '%'.$estatus.'%')
            ->get();

        return response()->json($reportes);
    }

    public function showPendientes($ciudad, $comunidad)
    {
        //
        $reportes = Reporte::join('servicios', 'reportes.fk_servicio', '=', 'servicios.clave_servicio')
            ->join('clientes', 'servicios.fk_cliente', '=', 'clientes.fk_clave_persona')
            ->join('comunidades', 'clientes.fk_comunidad', '=', 'comunidades.clave_comunidad')
            ->join('ciudades as ciudad_cliente', 'comunidades.fk_ciudad', '=', 'ciudad_cliente.clave_ciudad')
            ->join('personas as nombre_cliente', 'clientes.fk_clave_persona', '=', 'nombre_cliente.clave_persona')
            ->select(
                'reportes.clave_reporte',
                'reportes.problema',
                'reportes.veces_reportado',
                'reportes.fecha_reporte',
                'comunidades.comunidad',
                'ciudad_cliente.ciudad'
            )->where('reportes.estatus', '=', 'Pendiente')
            ->where('ciudad_cliente.clave_ciudad', '=', $ciudad)
            ->where('comunidades.clave_comunidad', '=', $comunidad)
            ->orderBy('reportes.veces_reportado', 'DESC')
            ->orderBy('reportes.fecha_reporte', 'ASC')
            ->get();

        return response()->json($reportes);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProblema(Request $request)
    {
        //
        $reporte = Reporte::find($request->clave_reporte, 'clave_reporte');
        $reporte->problema = $request->problema;

        $reporte->save();
        return $reporte;
    }

    public function updateVeces(Request $request)
    {
        //
        $obtenerVeces = Reporte::where('clave_reporte', $request->clave_reporte)
                                ->select('veces_reportado')->get()->first();
        $veces = json_decode($obtenerVeces);

        $reporte = Reporte::find($request->clave_reporte, 'clave_reporte');
        $reporte->veces_reportado = ($veces->veces_reportado + 1);

        $reporte->save();
        return $reporte;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
