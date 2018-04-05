<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Inscricao;
use App\DadosInscricao;
use App\Pessoa;
use App\Turma;
class listar_matriculasController extends Controller
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

        return view('listar_matriculas.index', compact('matricula', 'inscricao', 'pessoa', 'dados', 'turma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    public function matricula(){
         $query = busca_matricula(0);
         //echo $query;

        //return;
         return $query;


    }

    public function pessoa(){
        $query = busca_pessoa3(0);

        return $query;

    }
    public function turma(){
        $query = buscar_turmaaa(0);

        return $query;

    }
    public function nome_turma(){
        $query = buscar_nome_turma(0);

        return $query;

    }
    public function inscricao(){
        $query = busca_inscricao3(0);

        return $query;
    }
    public function contatinho($ano){
         $query = busca_matricula_ano($ano);
         //echo $query;

        return $query;


    }
    public function dados_inscricao(){
        $query = busca_dados_inscricao(0);
        return $query;
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
