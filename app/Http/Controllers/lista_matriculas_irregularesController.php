<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Inscricao;
use App\DadosInscricao;
use App\Pessoa;
use App\Turma;
class lista_matriculas_irregularesController extends Controller
{
    protected $matricula;

    public function __construct(Matricula $matricula)
    {
        $this->matricula = Matricula::all();
    }

    public function index()
    {   
        $matricula = $this->matricula->all();

        //$matriculas = Matricula::all();
        $matricula = Matricula::all();
        $inscricao = Inscricao::all();
        $pessoa = Pessoa::all();
        $dados = DadosInscricao::all();
        $turma = Turma::all();

        return view('lista_matriculas_irregulares.index', compact('matricula', 'inscricao', 'pessoa', 'dados', 'turma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
