<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Rol::all()->where('rol', "!=", "Cliente");

        //$roles = Rol::all();
        /*return $paquetes;*/
        return response()->json($roles);
    }
}
