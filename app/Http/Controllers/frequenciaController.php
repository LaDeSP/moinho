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
        //
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

    public function ajaxDisciplina(){
        $turma = Input::get('turma_id'); //peguei o id da turma
        $turma_disciplina = TurmaDisciplina::where('turma_id','=',$turma); //buscar em turma_disciplina o id
        //encontrar as disciplinas
        $disciplinas = Disciplina::where('id', '=', $turma_disciplina->disciplina_id)->get();
        return response()->json($disciplinas);
      }
}
