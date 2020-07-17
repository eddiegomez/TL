<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pessoa_perdida;
use App\caso; 
use App\foto;
use App\User;
use DB;

class frontOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas_perdidas = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('centro', 'centro.idcentro', '=', 'caso.centro_idcentro')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
        ->select('pessoa_perdida.*','pessoa_perdida.created_at as reg', 'foto.foto', 'centro.denominacao','endereco.*', 'contacto.*')
        ->where('caso.estado','=',1)
        ->orderBy('pessoa_perdida.created_at', 'desc')
        ->get();

        $coordenadas = DB::table('coordenadas')->get();

        return view('welcome', ['pessoas_perdidas' => $pessoas_perdidas], ['coordenadas' => $coordenadas]);

       /* $pessoa_perdidas = DB::table('pessoa_perdida')->get();

        return view('welcome', ['pessoa_perdidas' => $pessoa_perdidas]);*/
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
