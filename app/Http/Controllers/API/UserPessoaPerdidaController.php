<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\pessoa_perdida;
use App\caso;
use App\foto;
use App\User;
use App\Endereco;
use DB;

class UserPessoaPerdidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            \Image::make($request->photo)->save(public_path('/imagens/pessoas_perdidas/').$photo);
        }

        $foto = foto::create([
            'foto' => $photo
        ]);

        $endereco = endereco::create([
            'pais' => $request->nacionalidade,
            'provincia' => $request->naturalidade,
            'distrito' => $request->naturalidade,
            'bairro' => $request->bairro,
            'avenida' => $request->avenida,
            'quarteirao' => $request->quarteirao,
            'numero' => $request->numero
        ]);
       
        $pessoa_perdida = pessoa_perdida::create([
            'nome' => $request['nome'],
            'apelido' => $request['apelido'],
            'outro_nome' => $request['alcunha'],
            'data_nascimento' => $request['data_nascimento'],
            'nacionalidade' => $request['nacionalidade'],
            'naturalidade' => $request['naturalidade'],
            'obs' => $request['descricao'],
            'foto_idfoto' => $foto->idfoto,
            'sexo' => $request['genero'],
            'data_desaparecimento' => $request['data_desaparecimento'],
            'idendereco' => $endereco->idendereco
        ]);

        return caso::create([
            'pessoa_perdida_idpessoa_perdida' => $pessoa_perdida->idpessoa_perdida,
            'utilizador_idutilizador' => 4,
            'coordenadas_idcoordenadas' => 1,
            'centro_idcentro' => 1
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
