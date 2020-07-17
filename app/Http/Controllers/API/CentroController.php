<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\centro;
use App\utilizador;
use App\coordenadas;
use App\tipo_centro;
use App\endereco;
use App\contacto;
use App\foto;
use App\caso;
use DB;

class CentroController extends Controller
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
            //->leftJoin('endereco', 'endereco.coordenadas_idcoordenadas', '=', 'coordenadas.idcoordenadas')
            ->leftJoin('tipo_centro', 'tipo_centro.idtipo_centro', '=', 'centro.tipo_centro_idtipo_centro')
            ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'centro.utilizador_idutilizador')
            ->select('centro.*','utilizador.*','tipo_centro.tipo')
            ->where('centro.utilizador_idutilizador','=',2)
            ->get();
    }

    public function buscarTipos()
    {
        $dados['tipos'] = DB::table('tipo_centro')->get();

        return $dados;
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
        if($request->photo){
            $photo = time().'.'.explode('/', explode(':', substr($request->photo, 0, strpos ($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('/imagens/centros/').$photo);
        }

        $foto = foto::create([
            'foto' => $photo
        ]);

        $coordenadas = coordenadas::create([
            'denominacao' => $request['denominacao'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
        ]);

        $endereco = endereco::create([
            'pais' => 'Moçambique',
            'provincia' => $request['provincia'],
            'distrito' => $request['distrito'],
            'bairro' => $request['bairro'],
            'quarteirao' => $request['quarteirao'],
            'avenida' => $request['avenida'],
            'numero' => $request['numero'],
            'coordenadas_idcoordenadas' => $coordenadas->idcoordenadas,
        ]);

        $contacto = contacto::create([
            'email' => $request['email'],
            'celular' => $request['celular1']
        ]);

        return centro::create([
            'denominacao' => $request['denominacao'],
            'capacidade' => $request['capacidade'],
            'tipo_centro_idtipo_centro' => $request['tipo'],
            'endereco_idendereco' => $endereco->idendereco, 
            'contacto_idcontacto' => $contacto->idcontacto,
            'utilizador_idutilizador' => 2
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ["messagesss"];
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
