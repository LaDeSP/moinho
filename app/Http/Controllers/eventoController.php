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
use Zizaco\Entrust\EntrustFacade as Entrust;

class eventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaboradores = Colaborador::all();
        $situacoes = Situacao::all();
        return view('evento.index', compact('colaboradores', 'situacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colaboradores = Colaborador::all();
        $situacoes = Situacao::all();

        foreach($colaboradores as $colaborador){
            $pessoas[$colaborador->id] = Pessoa::find($colaborador->pessoa_id);
        }

        return view('evento.create', compact('colaboradores', 'situacoes', 'pessoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento;
        $evento_situacao = new Evento_situacao;
        
        $evento->nome = $request->nome;
        $evento->descricao = $request->descricao;
        $evento->colaborador_id = $request->colaborador;
        $evento->save(['timestamps' => false]);

        $evento_situacao->evento()->associate($evento);
        $evento_situacao->situacao_id = $request->situacao;
        $evento_situacao->save();

        for($i = 0; $i < count($request->evento_in); $i++){
            $periodo = new Periodo;
            $periodo->inicio = $request->evento_in[ $i ];
            $periodo->fim = $request->evento_out[ $i ];
            $periodo->save();

            $evento_periodo = new Periodo_evento;
            $evento_periodo->evento()->associate($evento);
            $evento_periodo->periodo()->associate($periodo);
            $evento_periodo->save();
        }


        return redirect()->back()->with('message', 'Evento adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
