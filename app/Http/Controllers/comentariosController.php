<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\pessoa_perdida;
use App\comentario;
use App\caso; 
use App\foto;
use App\User;
use DB;

class comentariosController extends Controller
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
        $user = DB::table('utilizador')->where('users_id', $request->user)->first();
        $caso = DB::table('caso')->where('idcaso', $request->caso)->first();

        /*Mail::send('mail.corpo_comentario', ['user' => $user->nome], function($m){
            $m->from('edsongomex@gmail.com', 'Edson Gomes');
            $m->subject('Novo comentário');
            $m->to('mariesexshopp@gmail.com');
        });*/

        comentario::create([
            'comentario' => $request->comentario,
            'caso_idcaso' => $request->caso,
            'utilizador_idutilizador' => $user->idutilizador
        ]);

        return redirect(url("/detalhes/$caso->pessoa_perdida_idpessoa_perdida"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados['caso'] = DB::table('caso')->where('pessoa_perdida_idpessoa_perdida', $id)->first();
        
        $dados['pessoa_perdida'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->select('pessoa_perdida.*','caso.centro_idcentro','caso.estado','pessoa_perdida.created_at as reg')
        ->where('pessoa_perdida.idpessoa_perdida',$id)
        ->first();

        $dados['fotos'] = DB::table('foto')->where('foto.pessoa_perdida_idpessoa_perdida',$id)->get();

        if($dados['pessoa_perdida']->centro_idcentro){
            $dados['entidade'] = DB::table('caso')
            ->leftJoin('centro', 'caso.centro_idcentro', '=', 'centro.idcentro')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
            ->select('centro.denominacao','endereco.*','contacto.*')
            ->where('caso.pessoa_perdida_idpessoa_perdida',$id)
            ->first();
        }else{
            $dados['entidade'] = DB::table('caso')
            ->leftJoin('utilizador', 'caso.utilizador_idutilizador', '=', 'utilizador.idutilizador')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
            ->select('utilizador.nome','endereco.*','contacto.*')
            ->where('caso.pessoa_perdida_idpessoa_perdida',$id)
            ->first(); 
        }

        $dados['comentarios'] = DB::table('comentario')
        ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'comentario.utilizador_idutilizador')
        ->leftJoin('contacto', 'utilizador.contacto_idcontacto', '=', 'contacto.idcontacto')
        ->select('utilizador.nome  as nome_user','contacto.celular','contacto.email','comentario.*')
        ->where('comentario.caso_idcaso',$dados['caso']->idcaso)
        ->get();

        $dados['utilizador'] = DB::table('utilizador')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
        ->select('utilizador.nome  as nome_user','utilizador.users_id','contacto.celular', 'contacto.email', 'endereco.pais','endereco.provincia', 'endereco.avenida', 'endereco.numero', 'endereco.bairro')
        ->where('utilizador.idutilizador',$dados['caso']->utilizador_idutilizador)
        ->first();
        $dados['recente']=false;
        return view('comentarios', ['dados' => $dados]);
        
    }

    public function shoow($id)
    {
        $dados['caso'] = DB::table('caso')->where('pessoa_perdida_idpessoa_perdida', $id)->first();
        
        $dados['pessoa_perdida'] = DB::table('pessoa_perdida')
        ->leftJoin('caso', 'caso.pessoa_perdida_idpessoa_perdida', '=', 'pessoa_perdida.idpessoa_perdida')
        ->leftJoin('foto', 'foto.idfoto', '=', 'pessoa_perdida.foto_idfoto')
        ->select('pessoa_perdida.*','caso.centro_idcentro','caso.estado','pessoa_perdida.created_at as reg')
        ->where('pessoa_perdida.idpessoa_perdida',$id)
        ->first();

        $dados['fotos'] = DB::table('foto')->where('foto.pessoa_perdida_idpessoa_perdida',$id)->get();

        if($dados['pessoa_perdida']->centro_idcentro){
            $dados['entidade'] = DB::table('caso')
            ->leftJoin('centro', 'caso.centro_idcentro', '=', 'centro.idcentro')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'centro.endereco_idendereco')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'centro.contacto_idcontacto')
            ->select('centro.denominacao','endereco.*','contacto.*')
            ->where('caso.pessoa_perdida_idpessoa_perdida',$id)
            ->first();
        }else{
            $dados['entidade'] = DB::table('caso')
            ->leftJoin('utilizador', 'caso.utilizador_idutilizador', '=', 'utilizador.idutilizador')
            ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
            ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
            ->select('utilizador.nome','endereco.*','contacto.*')
            ->where('caso.pessoa_perdida_idpessoa_perdida',$id)
            ->first(); 
        }

        $dados['comentarios'] = DB::table('comentario')
        ->leftJoin('utilizador', 'utilizador.idutilizador', '=', 'comentario.utilizador_idutilizador')
        ->leftJoin('contacto', 'utilizador.contacto_idcontacto', '=', 'contacto.idcontacto')
        ->select('utilizador.nome  as nome_user','contacto.celular','contacto.email','comentario.*')
        ->where('comentario.caso_idcaso',$dados['caso']->idcaso)
        ->get();

        $dados['utilizador'] = DB::table('utilizador')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'utilizador.contacto_idcontacto')
        ->leftJoin('endereco', 'endereco.idendereco', '=', 'utilizador.endereco_idendereco')
        ->select('utilizador.nome  as nome_user','utilizador.users_id','contacto.celular', 'contacto.email', 'endereco.pais','endereco.provincia', 'endereco.avenida', 'endereco.numero', 'endereco.bairro')
        ->where('utilizador.idutilizador',$dados['caso']->utilizador_idutilizador)
        ->first();

        $dados['recente']=true;

        return view('comentarios', ['dados' => $dados]);
        
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
    public function destroy($id,$idpessoa_perdida)
    {
        $comentario = comentario::findOrFail($id);
        $comentario->delete(); 
        
        return redirect(url("/detalhes/$idpessoa_perdida"));
    }
}
