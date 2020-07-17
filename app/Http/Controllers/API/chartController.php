<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\caso;

class chartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $dados ['janeiro'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '1')->count();
        $dados ['fevereiro'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '2')->count();
        $dados ['marco'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '3')->count();
        $dados ['abril'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '4')->count();
        $dados ['maio'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '5')->count();
        $dados ['junho'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '6')->count();
        $dados ['julho'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '7')->count();
        $dados ['agosto'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '8')->count();
        $dados ['setembro'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '9')->count();
        $dados ['outubro'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '10')->count();
        $dados ['novembro'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '11')->count();
        $dados ['dezembro'] = DB::table('caso')->where('estado','=',1)->whereMonth('created_at', '12')->count();

        $dados ['ejaneiro'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '1')->count();
        $dados ['efevereiro'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '2')->count();
        $dados ['emarco'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '3')->count();
        $dados ['eabril'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '4')->count();
        $dados ['emaio'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '5')->count();
        $dados ['ejunho'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '6')->count();
        $dados ['ejulho'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '7')->count();
        $dados ['eagosto'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '8')->count();
        $dados ['esetembro'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '9')->count();
        $dados ['eoutubro'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '10')->count();
        $dados ['enovembro'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '11')->count();
        $dados ['edezembro'] = DB::table('caso')->where('estado','=',0)->whereMonth('updated_at', '12')->count();

        return $dados;
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
