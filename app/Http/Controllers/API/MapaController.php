<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\utilizador;
use DB;

class MapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('centro')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
            ->leftJoin('tipo_centro', 'tipo_centro.idtipo_centro', '=', 'centro.tipo_centro_idtipo_centro')
            ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'centro.utilizador_idutilizador')
            ->select('centro.*','utilizador.*','tipo_centro.tipo')
            ->where('centro.utilizador_idutilizador','=',2)
            ->get();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
