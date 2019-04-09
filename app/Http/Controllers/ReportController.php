<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Relatorio_Role;
use App\RoleUser;
use App\Juntar;
use App\Relatorio;
use App\Coluna;
use App\Condicao;
use App\Tipos;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $role = RoleUser::where('user_id', $id)->first();
        $reports_id = Relatorio_Role::where('role_id', $role->role_id)->get();
        #$reports_id = Relatorio::where('role_id', $role->role_id)->get();
        foreach($reports_id as $id){
            $reports[] = Relatorio::find( $id->relatorio_id );
        }
        return view('relatorio.index', compact('reports'));
    }

    /**
     * Fazer a consulta para criar o relatório
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $report = Relatorio::find($request->id_report);
        $joins = Juntar::where('relatorio_id', '=', $request->id_report)->get();
        $query = DB::table($report->tabela);
        $report_name = $report->nome;
        // Começo -> fazer os inner join
        foreach($joins as $join){
            $table = $join->tabela1;
            $column1 = $join->tabela1.'.'.$join->coluna1;
            $column2 = $join->tabela2.'.'.$join->coluna2;
            $query = $query->join($table, $column1 , $join->condicao, $column2);
        }
        // Fim -> fazer os inner join

        // Começo -> fazer o select
        if(!isset($request->id_select)){
            //Se não existir colunas especificas, o relatorio conterá todos as colunas cadastradas
            $selects = '';
            $columns = Coluna::where('relatorio_id', '=', $request->id_report)->get();
            foreach($columns as $column){
                $nome = str_replace(' ', '_', $column->nome);
                $select = $column->tabela.'.'.$column->coluna.' as '.$nome.',';               
                $selects = $selects.' '.$select;
            }
            $selects = substr($selects, 0, strlen($selects) - 1);
            $query = $query->selectRaw($selects);
        } else {
            //Se existir colunas especificas, será colocado só as colunas especificadas
            $selects = '';
            foreach($request->id_select as $id_select){
                $column = Coluna::find($id_select);
                $columns[] = $column;
                $nome = str_replace(' ', '_', $column->nome);
                $select = $column->tabela.'.'.$column->coluna.' as '.$nome.',';               
                $selects = $selects.' '.$select;
            }
            $selects = substr($selects, 0, strlen($selects) - 1);
            $query = $query->selectRaw($selects);
        }
        //  Fim -> fazer o select

        // Começo -> fazer o filtro
        if(isset($request->id_conlumn)){
            for( $i = 0; $i < count($request->id_conlumn); $i++ ){
                $column = Coluna::find($request->id_conlumn[$i]);
                $condition = Condicao::find($request->id_condition[$i]);
                $coluna = $column->tabela.'.'.$column->coluna;
                $condicao = $condition->condicao;
                $query = $query->where($coluna, $condicao, $request->input_condition[$i]);
            }
        }
        //  Fim -> fazer o filtro

        $query = $query->get();
        if(count($query) == 0){
            return redirect()->back()->with('error', 'Não há dados para realizar o relatório de '.$report->nome.'!');
        }

        $dataReport = date('d/m/Y h:i');
        $data = date('d/m/Y');

        if($request->tipo_relatorio == 1)
            return view('relatorio.pdf', compact('query', 'columns', 'report_name', 'dataReport', 'data'));
        if($request->tipo_relatorio == 0)
            return $this->export($query, $report->nome);
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
    
    /**
     * Exportar em csv
     * 
     * 
     */
    public function export($query, $name){       
        $tot_record_found=1;
        $CsvData = $this->formatar($query);
        $filename= $name.'_'.date('Y-m-d').".csv";
        $this->excluir(base_path().'/relatorios/');
        $file_path=base_path().'/relatorios/'.$filename;
        //dd($file_path);
        $file = fopen($file_path,"w+");
        foreach ($CsvData as $exp_data){
            fputcsv($file, $exp_data);
        }
        fclose($file);          
        $headers = ['Content-Type' => 'application/csv'];
        return response()->download($file_path, $filename, $headers); 
    }

    /**
     * Formatar os dados para criar o relatório em csv
     * 
     * 
     */
    public function formatar($query){
        //$query = $this->buscar_inscricao();
        $key = $this->buscar_chave($query);
        $arquivo = $this->juntar($key, $query);
        
        return $arquivo;
    }

    public function buscar_chave($query){
        foreach($query[0] as $key => $value)
        {
            if( strcmp($key, 'id') && strcmp( substr($key, '-3'), '_id' ) ){
                $array[] = ucfirst( str_replace('_', ' ', $key) );
            }
        }
        $result[] = $array;
        return $result;
    }

    public function juntar($result, $query){
        foreach($query as $row){
            foreach($row as $key => $value){
                if( strcmp($key, 'id') && strcmp( substr($key, '-3'), '_id' ) )
                    $array[] = $value;
            }
            $result[] = $array;
            $array = [];
        }
        return $result;
    }

    /**
     * Excluir arquivos da pasta
     * 
     * 
     */
    public function excluir($pasta){
        $diretorio = dir($pasta);
        while($arquivo = $diretorio->read()){
            if(($arquivo != '.') && ($arquivo != '..')){
                unlink($pasta.$arquivo);
                //echo 'Arquivo '.$arquivo.' foi apagado com sucesso. <br />';
            }
        }
        $diretorio->close();
    }



    
}