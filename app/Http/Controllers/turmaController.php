<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NomeTurma;
use App\Turma;
<<<<<<< HEAD
use App\Disciplina;
use App\TurmaDisciplina;
=======
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab


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
        $turma = Turma::all();
        $nome = NomeTurma::all();
        return view('turma.create', compact('turma', 'nome'));
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
<<<<<<< HEAD
        

        $formulario->nome_turma_int = $request->turma;
        $formulario->turno = $request->turno;
        $formulario->ano = $request->ano;
        $formulario->periodo = $request->periodo;
=======

        $formulario->nome_turma_int = $request->turma;
        $formulario->turno = $request->turno;
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
      
    
        $formulario->save(['timestamps' => false]);

<<<<<<< HEAD
        $help = $formulario->id;
        $turma = Turma::all();
        $nome = NomeTurma::all();
        $disciplina = Disciplina::all();
        return view('turma_disciplina.create', compact('turma', 'nome', 'disciplina', 'help'));
    }


=======

        return view('home');
    }
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab

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
