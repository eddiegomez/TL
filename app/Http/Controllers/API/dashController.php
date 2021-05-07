<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\caso;
use App\centro;
use App\User;
use App\Utilizador;

class dashController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestor_centro = DB::table('utilizador')->where('tipo_utilizador_idtipo_utilizador','=',2)->get();
        $admin = DB::table('utilizador')->where('tipo_utilizador_idtipo_utilizador','=',1)->get();
        $normal_user = DB::table('utilizador')->where('tipo_utilizador_idtipo_utilizador','=',3)->get();
        $pessoa_perdida = DB::table('caso')->where('estado','=',1)->get();
        $pessoa_encontrada = DB::table('caso')->where('estado','=',0)->get();
        $centro = centro::All();
        $utilizadores = User::All();
        
        $nr = [
            'pessoasEncontradas'=> $pessoa_encontrada->count(),
            'pessoasPerdidas'=> $pessoa_perdida->count(),
            'centros'=> $centro->count(),
            'gestores'=> $gestor_centro->count(),
            'admin'=> $admin->count(),
            'normal_user'=> $normal_user->count(),
            'utilizadores'=> $utilizadores->count(),
        ];
        return $nr;

    }

    public function gestor()
    {
        $pessoa_perdida = DB::table('caso')->where([['estado','=',1],['utilizador_idutilizador','=',2]])->get();
        $pessoa_encontrada = DB::table('caso')->where([['estado','=',0],['utilizador_idutilizador','=',2]])->get();
        
        $nr = [
            'pessoasEncontradas'=> $pessoa_encontrada->count(),
            'pessoasPerdidas'=> $pessoa_perdida->count(),
        ];
        return $nr;

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
