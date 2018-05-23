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
    public function index($id)
    {
        return view('teste', compact( 'id' ));
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
        //dd( $request->evento_participante);
        $cont = 0;

        foreach( $request->participante_id as $pessoa ){
            if( $request->evento_participante[$cont] == 0 ){
                //echo $cont;
                //echo "Pessoa: ".$pessoa;
                $pessoa_evento = new Pessoa_evento;
                $pessoa_evento->evento_id = $request->evento_id;
                $pessoa_evento->pessoa_id = $pessoa;

                $pessoa_evento->save();
            }
            $cont++;
        }

        if(isset( $request->excluir[0] )){
            foreach( $request->excluir as $evento_pessoa ){
                Pessoa_evento::find( $evento_pessoa )->delete();
            }
        } else {
            if(isset( $request->excluir )){
                Pessoa_evento::find( $request->excluir )->delete();
            }
        }
        //dd( $request->excluir );
        if( !isset($request->excluir) ){
            return redirect()->back()->with('message', 'Participantes foram adicionados com sucesso!');
        } else {
            return redirect()->back()->with('message', 'Alteração realizada com sucesso!');
        }
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
            ->whereYear('inscricao.data_inscricao', date('Y'))
            ->get();
        
        $participantes_col = DB::table('pessoa_evento')
            ->join('pessoas', 'pessoas.id', 'pessoa_evento.pessoa_id')
            ->join('eventos', 'eventos.id', 'pessoa_evento.evento_id')
            ->join('colaborador', 'pessoas.id', 'colaborador.pessoa_id')
            ->where('eventos.id', '=', $id)
            ->select('pessoas.*', 'pessoa_evento.id as pessoa_evento_id', 'colaborador.area_atuacao')
            ->get();
        $participantes_ins = DB::table('pessoa_evento')
            ->join('pessoas', 'pessoas.id', 'pessoa_evento.pessoa_id')
            ->join('eventos', 'eventos.id', 'pessoa_evento.evento_id')
            ->leftJoin('colaborador', 'pessoas.id', 'colaborador.pessoa_id')
            ->where('eventos.id', '=', $id)
            ->whereNull('colaborador.id')
            ->select('pessoas.*', 'pessoa_evento.id as pessoa_evento_id')
            ->get();


        //$pessoas = array_merge($colaboradores, $inscritos);
        return view('evento.participante', compact(
            'id',
            'colaboradores',
            'inscritos',
            'participantes_col',
            'participantes_ins'
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
