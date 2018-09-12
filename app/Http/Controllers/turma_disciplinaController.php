<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NomeTurma;
use App\Turma;
use App\Disciplina;
use App\TurmaDisciplina;
use App\Horario;


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
        foreach( $disciplina as $value ){
            $hora[$value->id] = Horario::where('disciplina_id', $value->id)->first();
        }
        $help = 1;
        return view('turma_disciplina.create', compact('turma', 'nome', 'disciplina', 'help', 'hora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( !isset($request->testando) ){
            return redirect()->route('turma.create')->with('message', 'Turma criada com sucesso!');
            echo 'Entrou';
        }
        //$tamanho = $request->tamanho;
        $teste = $request->testando;
        $teste = $this->split( str_split($teste) , ',');
        $tamanho = count($teste);
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
       
        

       


        return redirect()->route('turma.create')->with('message', 'Turma criada com sucesso junto com as suas disciplinas!');
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
        $turma_disciplina = TurmaDisciplina::where('turma_id', $id)->get();
        $disciplina = Disciplina::all();
        foreach( $disciplina as $value ){
            $hora[$value->id] = Horario::where('disciplina_id', $value->id)->first();
        }
        foreach( $turma_disciplina as $value ){
            $disciplina_add[] = Disciplina::find( $value->disciplina_id );
            $nomes[] = Disciplina::find( $value->disciplina_id )->nome.', '.$hora[$value->disciplina_id]->dia_semana.' - '.$hora[$value->disciplina_id]->hora;
            $ids[] = Disciplina::find( $value->disciplina_id )->id;
        }
        return view('turma_disciplina.edit', compact('id', 'hora', 'disciplina_add', 'disciplina', 'nomes', 'ids'));
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
        $disciplinas = $this->split( str_split($request->testando) , ',');
        $disciplinas = array_diff($disciplinas, [',']);
        $turma_disciplina = TurmaDisciplina::where('turma_id', $id)->get();
        foreach( $turma_disciplina as $index => $value ){
            if( $this->indexOf($disciplinas, $value->id) == -1 ){
                $value->delete();
            } else {
                unset( $disciplinas[$this->indexOf($disciplinas, $value->id)] );
            }
        }
        if( $disciplinas[0] != '' ){
            foreach( $disciplinas as $value ){
                $formulario = new TurmaDisciplina;
                $formulario->turma_id = $id;
                $formulario->disciplina_id = $value;
                $formulario->save(['timestamps' => false]);
            }
        }
        return redirect()->back()->with('message', 'Turma alterada com sucesso');
    }

    public function indexOf($arr, $string){
        foreach($arr as $index => $value){
            if( $value == $string ){
                return $index;
            }
        }
        return -1;
    }

    public function split($string, $comp){
        $new_string = '';
        foreach($string as $key => $char){
            if($char == $comp){
                $new_array[] = $new_string;
                $new_string = '';
            } else {
                $new_string = $new_string.$char;
            }
        }
        $new_array[] = $new_string;
        return $new_array;
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
