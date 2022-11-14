<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datosempresa;

class DatosempresaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos = Datosempresa::all();
        return response()->json($datos);
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
    public function updateCabecera(Request $request)
    {
        //
        $cabecera = Datosempresa::find($request->clave_empresa, 'clave_empresa');
        $cabecera->nombre = $request->nombre;
        $cabecera->eslogan = $request->eslogan;

        $imagen = trim($request->imagen_fondo);
        if ($imagen != null && strlen($imagen) > 0) {
            $cabecera->imagen_fondo = $request->imagen_fondo; 
        }

        $cabecera->save();
    }

    public function updateNosotros(Request $request)
    {
        //
        $nosotros = Datosempresa::find($request->clave_empresa, 'clave_empresa');
        $nosotros->sobre_nosotros = $request->sobre_nosotros;

        $nosotros->save();
    }

    public function updateContacto(Request $request)
    {
        //
        $contacto = Datosempresa::find($request->clave_empresa, 'clave_empresa');
        $contacto->direccion = $request->direccion;
        $contacto->ciudad = $request->ciudad;
        $contacto->telefono = $request->telefono;
        $contacto->correo = $request->correo;
        $contacto->facebook = $request->facebook;
        $contacto->whatsapp = $request->whatsapp;

        $contacto->save();
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
