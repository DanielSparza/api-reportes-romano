<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquetesinternet;

class PaquetesinternetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paquetes = Paquetesinternet::all();
        /*return $paquetes;*/
        return response()->json($paquetes);
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
        request()->validate([
            'velocidad' => 'required',
            'costo' => 'required',
            'periodo' => 'required'
        ]);

        $paquete = new Paquetesinternet();
        $paquete->velocidad = $request->velocidad;
        $paquete->costo = $request->costo;
        $paquete->periodo = $request->periodo;
        $paquete->descripcion = $request->descripcion;

        $paquete->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        //
        $paquete = Paquetesinternet::find($request->clave_paquete, 'clave_paquete');
        $paquete->velocidad = $request->velocidad;
        $paquete->costo = $request->costo;
        $paquete->periodo = $request->periodo;
        $paquete->descripcion = $request->descripcion;

        $paquete->save();
        return $paquete;
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
