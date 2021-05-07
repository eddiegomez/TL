<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
use App\gestor;
use App\utilizador;
use App\endereco;
use App\contacto;
use App\centro;
use App\foto;
use App\User;


class gestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['gestores'] = DB::table('utilizador')
            ->leftJoin('users', 'users.id', '=', 'utilizador.users_id')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
            ->leftJoin('foto', 'foto.idfoto', '=', 'utilizador.foto_idfoto')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
            ->leftJoin('centro', 'centro.utilizador_idutilizador', '=', 'utilizador.idutilizador')
            ->select('utilizador.*','users.email','contacto.*','centro.denominacao', 'foto.foto', 'endereco.*')
            ->where('utilizador.tipo_utilizador_idtipo_utilizador','=',2)
            ->get();
        $data['centros'] = DB::table('centro')->get();
        return $data;
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
        $this->validate($request, [
            'name' => 'string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $request->nome.' '.$request->apelido,
            'email' => $request->email,
            'tipo' => "Gestor",
            'password' => Hash::make($request['password'])
        ]);

        if ($user) {
            $endereco = endereco::create([
                'pais' => $request->nacionalidade,
                'provincia' => $request->naturalidade,
                'distrito' => $request->naturalidade,
                'bairro' => $request->bairro,
                'avenida' => $request->avenida,
                'quarteirao' => $request->quarteirao,
                'numero' => $request->numero
            ]);
            $contacto = contacto::create([
                'email' => $request->email,
                'celular' => $request->celular
            ]);
            $utilizador = utilizador::create([
                'nome' => $request->nome,
                'apelido' => $request->apelido,
                'data_nascimento' => $request->d_nasc,
                'tipo_utilizador_idtipo_utilizador' => 2,
                'users_id' => $user->id,
                'contacto_idcontacto' => $contacto->idcontacto,
                'foto_idfoto' => 1,
                'endereco_idendereco' => $endereco->idendereco
            ]);
        }

        return $utilizador;
        
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
