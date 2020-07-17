<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pessoa_perdida;
use App\caso; 
use App\foto;
use App\User;
use DB;

class pessoaPerdidaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dados['pessoas_perdidas'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('centro', 'centro.idcentro', '=', 'caso.centro_idcentro')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
        ->select('pessoa_perdida.*','pessoa_perdida.created_at as reg', 'foto.foto', 'centro.denominacao','endereco.*', 'contacto.*')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','centro']])
        ->orderBy('pessoa_perdida.created_at', 'desc')
        ->get();

        $dados['pessoas_encontradas'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('centro', 'centro.idcentro', '=', 'caso.centro_idcentro')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
        ->select('pessoa_perdida.*','pessoa_perdida.created_at as reg', 'foto.foto', 'centro.denominacao','endereco.*', 'contacto.*', 'caso.updated_at as desfecho','pessoa_perdida.created_at as criacao')
        ->where('caso.estado','=',0)
        ->orderBy('pessoa_perdida.created_at', 'desc')
        ->get();

        $dados['meus_registos'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'caso.utilizador_idutilizador')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'pessoa_perdida.idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
        ->select('pessoa_perdida.*','pessoa_perdida.created_at as reg', 'foto.foto','endereco.*', 'contacto.*', 'caso.updated_at as desfecho')
        ->where([['caso.estado','=',1],['caso.utilizador_idutilizador','=',4]])
        ->orderBy('pessoa_perdida.created_at', 'desc')
        ->get();

        $dados['por_familiares'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'caso.utilizador_idutilizador')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'pessoa_perdida.idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
        ->select('pessoa_perdida.*','pessoa_perdida.created_at as reg', 'utilizador.nome as nom_user', 'foto.foto','endereco.*', 'contacto.*', 'caso.updated_at as desfecho')
        ->where([['caso.estado','=',1],['pessoa_perdida.tipo','=','normal']])
        ->orderBy('pessoa_perdida.created_at', 'desc')
        ->get();

        return $dados;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home2');
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
        
        $pessoa_perdida = pessoa_perdida::create([
            'nome' => $request['nome'],
            'apelido' => $request['apelido'],
            'outro_nome' => $request['alcunha'],
            'data_nascimento' => $request['data_nascimento'],
            'nacionalidade' => $request['nacionalidade'],
            'naturalidade' => $request['naturalidade'],
            'obs' => $request['obs'],
            'foto_idfoto' => $foto->idfoto
        ]);

        return caso::create([
            'pessoa_perdida_idpessoa_perdida' => $pessoa_perdida->idpessoa_perdida,
            'utilizador_idutilizador' => 2,
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function search()
    {
        if($search = \Request::get('q')){
            $pessoas_perdidas = DB::table('pessoa_perdida')
            ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
            ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
            ->leftJoin('centro', 'centro.idcentro', '=', 'caso.centro_idcentro')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
            ->select('pessoa_perdida.*','pessoa_perdida.created_at as reg', 'foto.foto', 'centro.denominacao','endereco.*', 'contacto.*')
            ->where([[function($query) use ($search){
                $query->where('nome', 'LIKE', "%$search%");
            }],['caso.estado','=',1]])
            ->orWhere('apelido', 'LIKE', "%$search%")
            ->get();
        }else{
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
        }

        return $pessoas_perdidas;
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
        return ['message'=>'ive'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caso = DB::table('caso')
        ->where([['caso.pessoa_perdida_idpessoa_perdida','=',$id]])
        ->delete();
        $pessoa_perdida = pessoa_perdida::findOrFail($id);
        $pessoa_perdida->delete(); 
     
        $dados['meus_registos'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'caso.utilizador_idutilizador')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'pessoa_perdida.idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
        ->select('pessoa_perdida.*','pessoa_perdida.created_at as reg', 'foto.foto','endereco.*', 'contacto.*', 'caso.updated_at as desfecho')
        ->where([['caso.estado','=',1],['caso.utilizador_idutilizador','=',4]])
        ->orderBy('pessoa_perdida.created_at', 'desc')
        ->get();

        return $dados;
    }
}
