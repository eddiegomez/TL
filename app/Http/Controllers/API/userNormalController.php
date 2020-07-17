<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
use App\utilizador;
use App\endereco;
use App\contacto;
use App\User;


class userNormalController extends Controller
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
            'name' => $request->nome." ".$request->apelido,
            'email' => $request->email,
            'tipo' => "Normal",
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
                'nome' => $request->nome." ".$request->apelido,
                'sexo' => $request->sexo,
                'data_nascimento' => $request->data_nascimento,
                'tipo_utilizador_idtipo_utilizador' => 3,
                'users_id' => $user->id,
                'contacto_idcontacto' => $contacto->idcontacto,
                'foto_idfoto' => 1,
                'endereco_idendereco' => $endereco->idendereco
            ]);
        }
        return view('auth/loginAfterReg', ['nome' => $request->nome." ".$request->apelido]);
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
