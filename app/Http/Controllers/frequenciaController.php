<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\RoleUser;
use App\Role;
use App\Pessoa;
use App\Colaborador;

use App\NomeTurma;
use App\Turma;
use App\Disciplina;
use App\TurmaDisciplina;

use App\Frequencia;

use DB;

class frequenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    return view('frequencia.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role_user = RoleUser::where('user_id', Auth::user()->id )->first();
        $role = Role::find($role_user->role_id);

        $colaborador = Colaborador::where('user_id', auth()->user()->id)->first();

        return view('frequencia.create', compact('colaborador') );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colaborador = Colaborador::where('user_id', auth()->user()->id)->first();

        if(!isset($request->matricula)){
            return view('frequencia.create', compact('colaborador'),[
                'error' => 'Error ao gerar frequência!'
            ]);
        }

        $data_frequencia = $request->novaData;
        $disciplina_id=$request->disci;
       

        //data, presenca, justificativa, participante_id, disciplina_id
        for($i = 0; $i < count($request->justificativa); $i++){
            $frequencia = new Frequencia;

            $frequencia->presenca = $request->presenca[$i];
            $frequencia->disciplina_id = $disciplina_id; //disciplina
            $frequencia->participante_id = $request->matricula[$i]; //matricula
            $frequencia->justificativa = $request->justificativa[$i];
            $frequencia->data = $data_frequencia; //data da chamada

            $frequencia->save();
        }
        return view('frequencia.create', compact('colaborador'),[
            'message' => 'Frequência gerada com sucesso!'
        ]);

        //$frequencia->save();

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
        $freque = Frequencia::find($id);
        return view('frequencia.edit',compact('freque'));

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

    public function ajaxDisciplina($id){ //passando a turma
        
       // $query = DB::table('disciplina')
        //->join('turma_disciplina','turma_disciplina.disciplina_id','=','disciplina.id')
        //->join('turma','turma.id','=','turma_disciplina.turma_id')
        //->where('turma_disciplina.turma_id','=',$id)
        //->where('turma.ano', '=', date('Y'))
        //->get();
        
        $query = DB::table('disciplina')
        ->join('turma_disciplina','turma_disciplina.disciplina_id','=','disciplina.id')
        ->join('turma','turma.id','=','turma_disciplina.turma_id')
        ->where('turma_disciplina.turma_id','=',$id)
        ->where('turma.ano', '=', date('Y'))
        ->get();
        
        return response()->json($query);
      // return Response::json($disciplina);
      }
      public function ajaxParticipantes($turma, $disciplina)
    {
        // listar todos os matriculados regular turma e disciplina.
        $regular = 1;

        $query = DB::table('matricula')
        ->join('turma','matricula.turma_id','=','turma.id')
        ->join('turma_disciplina','turma_disciplina.turma_id','=','turma.id')
        ->join('disciplina','turma_disciplina.disciplina_id','=','disciplina.id')
        ->join('inscricao','inscricao.id','=','matricula.inscricao_id')
        ->join('dados_inscricao','dados_inscricao.id','=','inscricao.dados_inscricao_id')
        ->join('pessoas','pessoas.id','=','dados_inscricao.dados_pessoais_id')
        ->join('status_matricula', 'status_matricula.id', '=', 'matricula.status_matricula_id')
        ->select('pessoas.nome','matricula.id as matricula','status_matricula.status','disciplina.id as disciplina_id','disciplina.nome as disciplina','turma.id as turma')
        ->where('turma_disciplina.turma_id','=',$turma) //filtro turma
        ->where('disciplina.id','=',$disciplina) //filtro disciplina
        ->where('matricula.status_matricula_id','=',$regular)//matricula regular        
        ->where('turma.ano', '=', date('Y'))
        ->get();
           
        return response()->json($query);

    }
    public function ajaxVerifica($data, $disciplina){
      

        $query = DB::table('frequencia')
        ->join('disciplina','frequencia.disciplina_id','=','disciplina.id')
        ->where('frequencia.disciplina_id','=',$disciplina)
        ->where('frequencia.data','=',$data)
        ->select('*', 'frequencia.id as frequencia_id')
        ->get();
     
        if($query->isEmpty()) //esta vazio, não há data e id da disciplina lançada no sistema
            return response()->json(1);
           
            return response()->json($query);            
                    
    }

    public function post(Request $request){
       
        $data= $request->data;
    }
}
