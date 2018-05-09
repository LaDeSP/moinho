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
use DB;
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
        $todos_eventos = Evento::all();
        foreach($todos_eventos as $evento){
            $eventos[$evento->id] = $evento;
        }
        $todos_evento_situacao = Evento_situacao::all();
        foreach($todos_evento_situacao as $evento_situacoes){
            $evento_situacao[$evento_situacoes->id] = $evento_situacoes;
        }
        $todas_situacoes = Situacao::all();
        foreach($todas_situacoes as $situacao){
            $situacoes[$situacao->id] = $situacao;
        }
        $todos_evento_periodo = Periodo_evento::all();
        foreach($todos_evento_periodo as $evento_periodos){
            $evento_periodo[$evento_periodos->id] = $evento_periodos;
        }
        $todos_periodos = Periodo::all();
        foreach($todos_periodos as $periodo){
            $periodos[$periodo->id] = $periodo;
        }
        return view('evento.index', compact('eventos', 'evento_situacao', 'situacoes', 'evento_periodo', 'periodos'));
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

        $eventos = DB::table('evento_situacao')
            ->join('eventos', 'eventos.id', '=', 'evento_situacao.evento_id')
            ->join('situacoes', 'situacoes.id', '=', 'evento_situacao.situacao_id')
            ->join('periodo_evento', 'eventos.id', '=', 'periodo_evento.evento_id')
            ->join('periodos', 'periodos.id', '=', 'periodo_evento.periodo_id')
            ->select('eventos.id',
                    'eventos.nome as nome_evento', 
                    'eventos.descricao as descricao_evento', 
                    'situacoes.nome as situacao', 
                    'evento_situacao.observacao as observacao',
                    'periodos.inicio as inicio',
                    'periodos.fim as fim')
            ->orderBy('periodos.inicio', 'asc')
            ->get();

        return view('evento.create', compact('colaboradores', 'pessoas', 'eventos', 'situacoes'));
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

        if(!isset($request->evento_in)){
            return redirect()->back()->with('error', 'Nenhum horário adicionado!');
        }
        
        $evento->nome = $request->nome;
        $evento->descricao = $request->descricao;
        $evento->colaborador_id = $request->colaborador;
        $evento->save(['timestamps' => false]);

        $evento_situacao->evento()->associate($evento);
        $evento_situacao->situacao_id = $request->situacao;
        $evento_situacao->save();

        if(isset($request->evento_in)){
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
        $colaboradores = Colaborador::all();
        $situacoes = Situacao::all();
        foreach($colaboradores as $colaborador){
            $pessoas[$colaborador->id] = Pessoa::find($colaborador->pessoa_id);
        }

        $evento = Evento::find($id);
        $evento_situacao = Evento_situacao::where('evento_id', $id)->first();
        $evento_periodo = Periodo_evento::where('evento_id', $id)->get();
        $situacao = Situacao::find($evento_situacao->situacao_id);
        foreach($evento_periodo as $eve_per){
            $periodos[] = Periodo::find($eve_per->periodo_id);
        }
        return view('evento.show', compact(
            'colaboradores',
            'situacoes',
            'pessoas',
            'evento',
            'evento_situacao',
            'evento_periodo',
            'situacao',
            'periodos'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colaboradores = Colaborador::all();
        $situacoes = Situacao::all();
        foreach($colaboradores as $colaborador){
            $pessoas[$colaborador->id] = Pessoa::find($colaborador->pessoa_id);
        }

        $evento = Evento::find($id);
        $evento_situacao = Evento_situacao::where('evento_id', $id)->first();
        $evento_periodo = Periodo_evento::where('evento_id', $id)->get();
        $situacao = Situacao::find($evento_situacao->situacao_id);
        foreach($evento_periodo as $eve_per){
            $periodos[] = Periodo::find($eve_per->periodo_id);
        }
        return view('evento.edit', compact(
            'colaboradores',
            'situacoes',
            'pessoas',
            'evento',
            'evento_situacao',
            'evento_periodo',
            'situacao',
            'periodos',
            'id'
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
        $evento = Evento::find($id);
        $evento_situacao = Evento_situacao::where('evento_id', $id)->first();
        
        $evento->nome = $request->nome;
        $evento->descricao = $request->descricao;
        $evento->colaborador_id = $request->colaborador;
        //$evento->save(['timestamps' => false]);

        $evento_situacao->evento()->associate($evento);
        $evento_situacao->situacao_id = $request->situacao;
        //$evento_situacao->save();

        $evento_periodos = Periodo_evento::where('evento_id', $id)->get();
        foreach($evento_periodos as $evento_periodo){
            $value = Periodo::find( $evento_periodo->periodo_id );
            $periodos[ $value->id ] = $value;
        }

        if( isset($request->periodo_id) ){
            for( $i = 0; $i < count( $request->periodo_id ); $i++ ){
                if( $request->periodo_id[ $i ] > 0 ){
                    unset( $periodos[ $request->periodo_id[ $i ] ] );
                    $periodo = Periodo::find( $request->periodo_id[ $i ] );
                    $evento_periodo = Periodo_evento::where('periodo_id', $request->periodo_id[ $i ])->first();
                } else{
                    $periodo = new Periodo;
                    $evento_periodo = new Periodo_evento;
                }
                    $periodo->inicio = $request->evento_in[ $i ];
                    $periodo->fim = $request->evento_out[ $i ];
                    //dd($request->evento_in);
                    $periodo->save();
        
                    $evento_periodo->evento()->associate($evento);
                    $evento_periodo->periodo()->associate($periodo);
                    $evento_periodo->save();
            }
        }

        foreach( $periodos as $periodo ){
            Periodo_evento::where('periodo_id', $periodo->id)->delete();
            $periodo->delete();
        }
        
        
        //dd($request->periodo_id);
        //dd($periodos);
        //$evento_periodos[0]->delete();


        return redirect()->back()->with('message', 'Alteração realizada com sucesso!');
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
