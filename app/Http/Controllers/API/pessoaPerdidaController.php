<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pessoa_perdida;
use App\caso;
use App\User;
use DB;

class pessoaPerdidaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     *//*
    public function __construct()
    {
        $this->middleware('auth:api');
    }*/
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados['pessoas_perdidas'] = DB::table('caso')
        ->leftJoin('pessoa_perdida', 'pessoa_perdida.idpessoa_perdida', '=', 'caso.pessoa_perdida_idpessoa_perdida')
        ->select('pessoa_perdida.*')
        ->where('caso.estado','=',1)
        ->orderBy('caso.created_at', 'desc')
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
        /*pessoa_perdida::create([
            'nome' => $request['nome'],
            'data_nascimento' => $request['data_nascimento'],
            'nacionalidade' => $request['nacionalidade'],
            'naturalidade' => $request['naturalidade'],
            'descricao' => $request['obs'],
            'foto_idfoto' => 1
        ]);-*/
/*
        $data= DB::table('pessoa_perdida')
        ->select('idpessoa_perdida')->orderBy('idpessoa_perdida','desc')->get();
        $id = json_decode(json_encode($data),true);
        
        //$st = "-"+$id;
        //$id = explode("-",$data[0]);

        
*/
        
        //$id = auth('api')->user()->id;
        /*if($request->photo){
            $photo = time().'.'.explode('/', explode(':', substr($request->photo, 0, strpos ($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('/imagens/pessoas_perdidas/').$photo);
        }*/
        
        //$id = explode("-",$st);
        /*return caso::create([
            'pessoa_perdida_idpessoa_perdida' => $id,
            'utilizador_idutilizador' => 2,
            'coordenadas_idcoordenadas' => 1,
            'centro_idcentro' => 1
        ]);*/
        //return $data[2];

        return['message'=>'I have your data'];
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
