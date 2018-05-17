<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Colaborador;
use App\Evento_situacao;
use App\Situacao;
use App\Pessoa;
use App\Periodo_evento;
use App\Periodo;
use App\Pessoa_evento;
use DB;
use Zizaco\Entrust\EntrustFacade as Entrust;

class eventoParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        //echo $request->evento_id;
        //dd( $request->participante_id );

        foreach( $request->participante_id as $pessoa ){
            $pessoa_evento = new Pessoa_evento;
            $pessoa_evento->evento_id = $request->evento_id;
            $pessoa_evento->pessoa_id = $pessoa;

            $pessoa_evento->save();
        }
        return redirect('evento/create');
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
        $colaboradores = DB::table('colaborador')
        ->join('pessoas', 'pessoas.id', '=', 'colaborador.pessoa_id')
        ->select('*', 'pessoas.id as id')
        ->get();
        $inscritos = DB::table('inscricao')
        ->join('dados_inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
        ->join('pessoas', 'pessoas.id', '=', 'dados_inscricao.dados_pessoais_id')        
        ->select('*', 'pessoas.id as id')
        ->get();

        //$pessoas = array_merge($colaboradores, $inscritos);
        return view('evento.participante', compact(
            'id',
            'colaboradores',
            'inscritos'
        ));
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
