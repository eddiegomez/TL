<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pessoa_perdida;
use App\caso; 
use App\foto;
use App\User;
use DB;


class frontController extends Controller
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
        ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'caso.utilizador_idutilizador')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
        ->select('pessoa_perdida.*','caso.estado','pessoa_perdida.created_at as reg', 'foto.foto', 'utilizador.nome as nome_user', 'utilizador.apelido as apelido_user','contacto.celular','contacto.email')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','normal']])
        ->orderBy('pessoa_perdida.created_at', 'desc')
        ->get();

        $qtd['qtd_perdidas'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','normal']])
        ->count();

        $qtd['qtd_perdidas_centros'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','centro']])
        ->count();

        $qtd['qtd_encontradas'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where('caso.estado',0)
        ->count();

        return view('pessoas_perdidas', ['pessoas_perdidas' => $pessoas_perdidas], ['qtd' => $qtd]);
    }

    public function desaparecidos_centros()
    {
        $pessoas_perdidas = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('centro', 'centro.idcentro', '=', 'caso.centro_idcentro')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
        ->select('pessoa_perdida.*','caso.estado','pessoa_perdida.created_at as reg', 'foto.foto', 'centro.denominacao','endereco.*', 'contacto.*')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','centro']])
        ->orderBy('pessoa_perdida.created_at', 'desc')
        ->get();

        $qtd['qtd_perdidas'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','normal']])
        ->count();

        $qtd['qtd_perdidas_centros'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','centro']])
        ->count();

        $qtd['qtd_encontradas'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where('caso.estado',0)
        ->count();

        return view('pessoas_perdidas_centros', ['pessoas_perdidas' => $pessoas_perdidas], ['qtd' => $qtd]);
    }

    public function encontradas()
    {
        $pessoas_encontradas = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('centro', 'centro.idcentro', '=', 'caso.centro_idcentro')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
        ->select('pessoa_perdida.*','caso.estado','pessoa_perdida.created_at as reg', 'foto.foto', 'centro.denominacao','endereco.*', 'contacto.*')
        ->where('caso.estado', 0)
        ->orderBy('pessoa_perdida.updated_at', 'desc')
        ->get();

        $qtd['qtd_perdidas'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','normal']])
        ->count();

        $qtd['qtd_perdidas_centros'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','centro']])
        ->count();

        $qtd['qtd_encontradas'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where('caso.estado',0)
        ->count();

        return view('pessoas_encontradas', ['pessoas_encontradas' => $pessoas_encontradas], ['qtd' => $qtd]);
    }

    public function filtrar()
    {
        $pessoas_perdidas = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'caso.utilizador_idutilizador')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
        ->select('pessoa_perdida.*','caso.estado','pessoa_perdida.created_at as reg', 'foto.foto',  'utilizador.nome as nome_user', 'utilizador.apelido as apelido_user','contacto.celular','contacto.email')
        ->where('caso.estado','=',1)
        ->orderBy('pessoa_perdida.created_at', 'desc')
        ->get();

        $qtd['qtd_perdidas'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','normal']])
        ->count();

        $qtd['qtd_perdidas_centros'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','centro']])
        ->count();

        $qtd['qtd_encontradas'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->where('caso.estado',0)
        ->count();

        session()->put('activo',"nome");

        return view('filtrar', ['pessoas_perdidas' => $pessoas_perdidas], ['qtd' => $qtd]);
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
        $input=$request->all();
        $imagens=array();
        if($files=$request->file('photos')){
            foreach($files as $file){
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/imagens/pessoas_perdidas/',$name);
                $imagens[]=$name;
            }
        }
       
        session()->put('apelido', $request->apelido);
        session()->put('nome', $request->nome);
        session()->put('outros_nome', $request->outros_nome);
        session()->put('data_nascimento', $request->data_nascimento);
        session()->put('naturalidade', $request->naturalidade);
        session()->put('nacionalidade', $request->nacionalidade);
        session()->put('avenida', $request->avenida);
        session()->put('bairro', $request->bairro);
        session()->put('quarteirao', $request->quarteirao);
        session()->put('numero', $request->numero);
        session()->put('photos', $imagens);
        return view('regPessoaPerdida_fase2');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa_perdida = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('centro', 'centro.idcentro', '=', 'caso.centro_idcentro')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
        ->select('pessoa_perdida.*','pessoa_perdida.created_at as reg', 'foto.foto', 'centro.denominacao','endereco.*', 'contacto.*')
        ->where('pessoa_perdida.idpessoa_perdida',$id)
        ->first();
        $caso = DB::table('caso')->where('pessoa_perdida_idpessoa_perdida', $id)->first();
        $utilizador = DB::table('utilizador')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
        ->select('utilizador.nome  as nome_user','contacto.celular', 'contacto.email', 'endereco.provincia', 'endereco.avenida', 'endereco.numero', 'endereco.bairro')
        ->where('utilizador.idutilizador',$caso->utilizador_idutilizador)
        ->first();

        return view('detalhes', ['pessoa_perdida' => $pessoa_perdida], ['utilizador' => $utilizador]);
    }

    public function detalhes_centros($id)
    {
        $pessoa_perdida = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('centro', 'centro.idcentro', '=', 'caso.centro_idcentro')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
        ->select('pessoa_perdida.*','pessoa_perdida.created_at as reg', 'foto.foto', 'centro.denominacao','endereco.*', 'contacto.*')
        ->where('pessoa_perdida.idpessoa_perdida',$id)
        ->first();
        

        return view('detalhes_centros', ['pessoa_perdida' => $pessoa_perdida]);
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
