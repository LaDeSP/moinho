<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Inscricao;
use App\Turma;
use App\StatusMatricula;


class matriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculaa = Matricula::all();
        $inscricao_id = Inscricao::all();
        $turma_id = Turma::all();
        $status = StatusMatricula::all();
        return view('matricula.index', compact('matricula', 'inscricao_id', 'turma_id', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matriculaa = Matricula::all();
        $inscricao_id = Inscricao::all();
        $turma_id = Turma::all();
         $status = StatusMatricula::all();
        return view('matricula.create', compact('matricula', 'inscricao_id', 'turma_id', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formulario = new Matricula;
        
        //$formulario->turno = $request->turno;
        $formulario->periodo = $request->periodo;
        $formulario->inscricao_id = $request->inscricao_id;
        $formulario->data = $request->data;
        $formulario->status_matricula_id = $request->status;
        $formulario->turma_id = $request->turma_id;
    
        $formulario->save(['timestamps' => false]);


        return view('home');
    }

   /* public function ajaxprod(){
        $item_categoria = Request::input('selecao_ano');
        $produtos = busca_matricula($item_categoria);
        $json = json_enconde($produtos); // transforma em json
        return response()->json($json); // retorna uma resposta com o json
    }*/

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
