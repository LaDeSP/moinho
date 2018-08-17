<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Disciplina;
use App\Colaborador;
use App\Horario;
use DB;
use Zizaco\Entrust\EntrustFacade as Entrust;

class disciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $disciplina = Disciplina::all();
        $colaborador = Colaborador::all();
        return view('disciplina.index', compact('disciplina', 'colaborador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Caso o usuário logado não tenha acesso a essa página, retorna um erro
        if(!Entrust::can('ver-disciplina')) {
            return abort(404);
        }
        $disciplinas = DB::table('disciplina')
            ->join('colaborador', 'colaborador.id', '=', 'disciplina.colaborador_id')
            ->join('pessoas', 'pessoas.id', '=', 'colaborador.pessoa_id')
            ->join('horario', 'disciplina.id', 'horario.disciplina_id')
            ->select(
                'disciplina.*', 
                'pessoas.nome as nome_colaborador', 
                'horario.dia_semana', 
                'horario.hora'
            )
            ->get();
        $count = DB::table('disciplina')->count();
        $colaboradores = Colaborador::where('status', 0)->get();
        $countColaboradores = Colaborador::where('status', 0)->where('tipo_colaborador_id', 5)->count();
        return view('disciplina.create', compact('count', 'countColaboradores', 'disciplinas', 'colaboradores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach( $request->datas as $key => $data ){
            $formulario = new Disciplina;
            $formulario->nome = $request->nome;
            $formulario->turno = $request->turno;
            $formulario->sala_aula = $request->sala_de_aula;
            $formulario->colaborador_id = $request->colaborador_id;
            $formulario->save(['timestamps' => false]);

            $horario = new Horario;
            $horario->dia_semana = $data;
            $horario->hora = $request->horas[$key];
            $horario->disciplina()->associate($formulario);
            $horario->save(['timestamps' => false]);
        }
        return redirect()->back()->with('message', 'Alteração realizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disciplina = Disciplina::find($id);
        $horario = Horario::where('disciplina_id', $id)->first();
        $colaborador = Colaborador::all();

        return view('disciplina.show', compact('disciplina', 'horario', 'colaborador', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disciplina = Disciplina::find($id);
        $horario = Horario::where('disciplina_id', $id)->first();
        $colaborador = Colaborador::all();

        return view('disciplina.edit', compact('disciplina', 'horario', 'colaborador'));
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
        $disciplina = Disciplina::findOrFail($id);
        $horario = Horario::where('disciplina_id', $disciplina->id)->first();

        $disciplina->nome = $request->nome;
        $disciplina->turno = $request->turno;
        $disciplina->sala_aula = $request->sala_de_aula;
        $disciplina->colaborador_id = $request->colaborador_id;

        $horario->dia_semana = $request->dia_semana;
        $horario->hora = $request->hora;
        
        $disciplina->save(['timestamps' => false]);
        $horario->save(['timestamps' => false]);

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
