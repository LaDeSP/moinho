<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juntar;
use App\Relatorio;
use App\Coluna;
use App\Condicao;
use App\Tipos;
use DB;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Relatorio::all();
        return view('relatorio.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Pesquisa quais são as colunas disponiveis para o relatório escolhido.
     * A pesquisa é retornada em json.
     * 
     * 
     */

    public function getColumns($id)
    {
        $column = Coluna::where('relatorio_id', '=', $id)->get();
        return response()->json($column);
    }

    /**
     * Pesquisa quais são as condições disponiveis para a coluna escolhida.
     * A pesquisa é retornada em json.
     * 
     * 
     */

    public function getConditions($id)
    {
        $column = Coluna::find($id);

        $condition = DB::table('condicoes')
            ->join('tipos', 'tipos.id', '=', 'condicoes.tipo_id')
            ->select('condicoes.*', 'tipos.input')
            ->where('tipos.id', '=', $column->tipo_id)
            ->get();

        return response()->json($condition);
    }
}
