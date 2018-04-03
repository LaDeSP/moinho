<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NomeTurma;
use App\Turma;
use App\Disciplina;
use App\TurmaDisciplina;


class turma_disciplinaController extends Controller
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
        $disciplina = Disciplina::all();
        return view('turma_disciplina.index', compact('turma', 'nome', 'disciplina'));
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
        $disciplina = Disciplina::all();
        $help = 1;
        return view('turma_disciplina.create', compact('turma', 'nome', 'disciplina', 'help'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$tamanho = $request->tamanho;
        $teste = $request->testando;
        $teste = str_split($teste);
        $tamanho=count($teste);
        $teste = array_diff($teste, [',']);
        $turma_disciplina_aux = $request->botao;


        
      /*  for ($i=0; $i<$tamanho; $i=$i+1){
            if ($teste[$i]==',' && $i<$tamanho-1){
                unset($teste[$i]);


            }
        }*/

        for ($i=0; $i<$tamanho; $i=$i+1){
            if (isset($teste[$i])){
                $formulario = new TurmaDisciplina;
                $formulario->turma_id = $turma_disciplina_aux;
                $formulario->disciplina_id = $teste[$i];
                $formulario->save(['timestamps' => false]);
            }
        }
       
        

       


        return view('home');
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
