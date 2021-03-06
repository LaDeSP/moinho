<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NomeTurma;
use App\Turma;
use App\Disciplina;
use App\TurmaDisciplina;
use App\Horario;
use Zizaco\Entrust\EntrustFacade as Entrust;

class turmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $turma = Turma::all();
        $nome = NomeTurma::all();
        return view('turma.index', compact('turma', 'nome'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Caso o usuário logado não tenha acesso a essa página, retorna um erro
        if(!Entrust::can('ver-turma')) {
            return abort(404);
        }
        $turma = Turma::all();
        $disciplinas = Disciplina::all()->count();
        $count = Turma::all()->count();
        $nome = NomeTurma::all();
        return view('turma.create', compact('disciplinas', 'count', 'turma', 'nome'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formulario = new Turma;
        $nome_turma = new NomeTurma;
        $nome_turma -> nome_turma = $request->turma;
        $nome_turma -> save();

        $formulario->nome_turma_id = $nome_turma -> id;
        $formulario->turno = $request->turno;
        $formulario->ano = $request->ano;
        $formulario->periodo = $request->periodo;
        $formulario->save(['timestamps' => false]);

        $help = $formulario->id;
        $turma = Turma::all();
        $nome = NomeTurma::all();
        $disciplina = Disciplina::all();
        foreach( $disciplina as $value ){
            $hora[$value->id] = Horario::where('disciplina_id', $value->id)->first();
        }
        return view('turma_disciplina.create', compact('turma', 'nome', 'disciplina', 'help', 'hora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function intercept($card)
    {
        $turma = Turma::all();
        $nome = NomeTurma::all();
        return view('turma.create', compact('turma', 'nome'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turma = Turma::find($id);
        $nome = NomeTurma::all();
        $turmaDisciplina = TurmaDisciplina::where('turma_id', $id)->get();
        $disciplinas = [];
        foreach($turmaDisciplina as $td){
            $disciplinas[] = Disciplina::findOrFail($td->disciplina_id);
        }

        return view('turma.show', compact('turma', 'nome', 'id', 'disciplinas', 'turmaDisciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turma = Turma::findOrFail($id);
        $nome = NomeTurma::findOrFail($turma -> nome_turma_id);
        $turmaDisciplina = TurmaDisciplina::where('turma_id', $id)->get();
        $disciplinas = [];
        foreach($turmaDisciplina as $td){
            $disciplinas[] = Disciplina::findOrFail($td->disciplina_id);
        }
        return view('turma.edit', compact('turmaDisciplina', 'turma', 'nome', 'disciplinas'));
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
        $turma = Turma::findOrFail($id);
        $nome_turma = NomeTurma::findOrFail($turma -> nome_turma_id);

        $turma->nome_turma_id = $nome_turma -> id;
        $turma->turno = $request->turno;
        $turma->ano = $request->ano;
        $turma->periodo = $request->periodo;
      
        $nome_turma -> nome_turma = $request -> turma;
    
        $nome_turma -> save(['timestamps' => false]);
        $turma->save(['timestamps' => false]);

        return redirect()->back()->with('message', 'Alteração realizada com sucesso!');

    }

    public function teste(Request $request)
    {
        return 'hello';
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
