<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\utilizador;
use App\pessoa_perdida;
use App\caso; 
use App\User;
use App\foto;
use DB;

class pessoaPerdidaController extends Controller
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
        if($files=session()->get('photos')){
            $foto = foto::create([
                'foto' => $files[0] 
            ]);
        }
              
        $pessoa_perdida = pessoa_perdida::create([
            'nome' => session()->get('nome'),
            'apelido' => session()->get('apelido'),
            'outro_nome' => session()->get('outros_nome'),
            'data_nascimento' => session()->get('data_nascimento'),
            'nacionalidade' => session()->get('nacionalidade'),
            'naturalidade' => session()->get('naturalidade'),
            'obs' => $request->descricao,
            'tipo' => 'normal',
            'foto_idfoto' => $foto->idfoto
        ]);

        if($files=session()->get('photos')){
            foreach($files as $file){
                $foto = foto::create([
                    'foto' => $file,
                    'pessoa_perdida_idpessoa_perdida' => $pessoa_perdida->idpessoa_perdida
                ]);
            }
        }
        
        $utilizador = DB::table('utilizador')->where('users_id', session()->get('user'))->first();

        caso::create([
            'pessoa_perdida_idpessoa_perdida' => $pessoa_perdida->idpessoa_perdida,
            'utilizador_idutilizador' => $utilizador->idutilizador,
            'data_ocorencia' => $request->data_ocorencia,
            'visto_ultima_vez' => $request->visto_ultima_vez,
            'grau_parentesco' => $request->grau,
        ]);

        return redirect(url("/detalhees/$pessoa_perdida->idpessoa_perdida"));
            
    }

    public function filtrar_casos(Request $request)
    {
        if($request->chave==="nome"){
            $pessoas_perdidas = DB::table('pessoa_perdida')
            ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
            ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
            ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'utilizador_idutilizador')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
            ->select('pessoa_perdida.*','caso.estado','pessoa_perdida.created_at as reg', 'foto.foto','utilizador.nome as nome_user', 'utilizador.apelido as apelido_user','contacto.celular','contacto.email')
            ->where([['caso.estado','=',1],['pessoa_perdida.nome', 'like', '%'.$request->valor.'%']])
            ->orWhere([['caso.estado','=',1],['pessoa_perdida.apelido', 'like', '%'.$request->valor.'%']])
            ->orderBy('pessoa_perdida.created_at', 'desc')
            ->get();
            session()->put('activo',"nome");
        }

        if($request->chave==="provincia"){
            $pessoas_perdidas = DB::table('pessoa_perdida')
            ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
            ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
            ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'caso.utilizador_idutilizador')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
            ->select('pessoa_perdida.*','caso.estado','pessoa_perdida.created_at as reg', 'foto.foto',  'utilizador.nome as nome_user', 'utilizador.apelido as apelido_user','contacto.celular','contacto.email')
            ->where([['caso.estado','=',1],['pessoa_perdida.naturalidade','like', '%'.$request->valor.'%']])
            ->orderBy('pessoa_perdida.created_at', 'desc')
            ->get();
            session()->put('activo',"provincia");
        }

        if($request->chave==="nascimento"){
            $pessoas_perdidas = DB::table('pessoa_perdida')
            ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
            ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
            ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'caso.utilizador_idutilizador')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
            ->select('pessoa_perdida.*','caso.estado','pessoa_perdida.created_at as reg', 'foto.foto',  'utilizador.nome as nome_user', 'utilizador.apelido as apelido_user','contacto.celular','contacto.email')
            ->where('caso.estado','=',1)
            ->whereDate('pessoa_perdida.data_nascimento', $request->valor)
            ->orderBy('pessoa_perdida.created_at', 'desc')
            ->get();
            session()->put('activo',"nascimento");
        }

        if($request->chave==="desaparecimento"){
            $pessoas_perdidas = DB::table('pessoa_perdida')
            ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
            ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
            ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'caso.utilizador_idutilizador')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
            ->select('pessoa_perdida.*','caso.estado','pessoa_perdida.created_at as reg', 'foto.foto',  'utilizador.nome as nome_user', 'utilizador.apelido as apelido_user','contacto.celular','contacto.email')
            ->where('caso.estado','=',1)
            ->whereDate('pessoa_perdida.created_at', $request->valor)
            ->orderBy('pessoa_perdida.created_at', 'desc')
            ->get();
            session()->put('activo',"desaparecimento");
        }

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

        $qtd['tipo'] = "desaparecimento";

        return view('filtrar', ['pessoas_perdidas' => $pessoas_perdidas], ['qtd' => $qtd]);
    }

    public function filtrar_entre(Request $request)
    {
        $pessoas_perdidas = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'caso.utilizador_idutilizador')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
        ->select('pessoa_perdida.*','caso.estado','pessoa_perdida.created_at as reg', 'foto.foto',  'utilizador.nome as nome_user', 'utilizador.apelido as apelido_user','contacto.celular','contacto.email')
        ->where('caso.estado','=',1)
        ->whereDate('pessoa_perdida.created_at','>=', $request->chave1)
        ->whereDate('pessoa_perdida.created_at','<=', $request->chave2)
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

        $qtd['tipo'] = "entre";
        session()->put('activo',"entre");
        session()->put('chave1',$request->chave1);

        return view('filtrar', ['pessoas_perdidas' => $pessoas_perdidas], ['qtd' => $qtd]);
    }
    
    public function meus_registos($id)
    {
        $utilizador = DB::table('utilizador')->where('utilizador.users_id',$id)->first();
        $pessoas_perdidas = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->leftJoin('centro', 'centro.idcentro', '=', 'caso.centro_idcentro')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
        ->select('pessoa_perdida.*','caso.estado','pessoa_perdida.created_at as reg', 'foto.foto', 'centro.denominacao','endereco.*', 'contacto.*')
        ->where('caso.utilizador_idutilizador','=',$utilizador->idutilizador)
        ->orderBy('pessoa_perdida.created_at', 'desc')
        ->get();

        return view('meus_registos', ['pessoas_perdidas' => $pessoas_perdidas]);
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
        $caso = DB::table('caso')
        ->select('caso.*')
        ->where('caso.pessoa_perdida_idpessoa_perdida',$id)
        ->first();

        $pessoa_perdida = DB::table('pessoa_perdida')->where('pessoa_perdida.idpessoa_perdida',$id)->first();

        $mails = DB::table('comentario')
            ->leftjoin('utilizador','utilizador.idutilizador','=','comentario.utilizador_idutilizador')
            ->leftjoin('users','users.id','=','utilizador.users_id')
            ->select('users.email','users.name')
            ->where('comentario.caso_idcaso',$caso->idcaso)
            ->first();      

        Mail::send('mail.corpo', ['pessoa_perdida' => $pessoa_perdida->nome.' '.$pessoa_perdida->apelido], function($m){
            $m->from('sgpp.notificacao@gmail.com', 'SGPP');
            $m->subject('Desfecho do caso de desaparecimento do(a)');
            $m->to('gomesivan938@gmail.com');
        });
            
        $resultado = DB::table('caso')
            ->where('pessoa_perdida_idpessoa_perdida', $id)
            ->update(['estado'=>0]);

        return redirect(url("/detalhes/$id"));
    }

    public function getIds($utilizadores){
        
    }

    public function activar(Request $request, $id)
    {
        $resultado = DB::table('caso')
            ->where('pessoa_perdida_idpessoa_perdida', $id)
            ->update(['estado'=>1]);

        return redirect(url("/detalhes/$id"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$iduser)
    {   
        $pessoa_perdida = pessoa_perdida::findOrFail($id);
        $pessoa_perdida->delete(); 
        
        return redirect(url("/detalhes/$iduser"));
    }
}
