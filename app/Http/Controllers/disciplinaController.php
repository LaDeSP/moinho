<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Disciplina;
use App\Colaborador;
use App\Horario;


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
        $disciplina = Disciplina::all();
        $colaborador = Colaborador::all();
        return view('disciplina.create', compact('disciplina', 'colaborador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formulario = new Disciplina;
        $horario = new Horario;

        $formulario->nome = $request->nome;
        $formulario->turno = $request->turno;
        $formulario->sala_de_aula = $request->sala_de_aula;
        $formulario->colaborador_id = $request->colaborador_id;

        $horario->dia_semana = $request->dia_semana;
        $horario->hora = $request->hora;
    
        $formulario->save(['timestamps' => false]);
        $horario->disciplina()->associate($formulario);
        $horario->save(['timestamps' => false]);


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
