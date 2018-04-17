<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Matricula;
use App\Participante;
use Zizaco\Entrust\EntrustFacade as Entrust;

class participanteController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matricula = Matricula::all();
        $participante = Participante::all();
        return view('participante.create', compact('matricula', 'participante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Caso o usuário logado não tenha acesso a essa página, retorna um erro
        if(!Entrust::can('ver-participante')) {
            return abort(404);
        }
        $matricula = Matricula::all();
        $participante = Participante::all();
        return view('participante.create', compact('matricula', 'participante'));
    }

    public function store(Request $request)
    {
        $formulario = new Participante;

        $formulario->id = $this->ultimo_id()[0]->id + 1;
        $formulario->serie = $request->serie;
        $formulario->sala_de_aula = $request->sala;
        $formulario->status = $request->status;
        $formulario->matricula_id = $request->matricula_id;

        $formulario->save(['timestamps' => false]);
        
        return view('participante.create');
    }

    public function edit($id)
    {
        $participante = Participante::find($id);

        return view('participante.edit', compact('participante'));
    }

    public function update(Request $request, $id)
    {
        $participante = Participante::find($id);

        $participante->serie = $request->serie;
        $participante->sala_de_aula = $request->sala;
        $participante->status = $request->status;

        $participante->save(['timestamps' => false]);

        return redirect()->back();
    }

    public function ultimo_id()
    {
        //Arrumar a tabela participante -> colocar na coluna id auto_increment
        $query = DB::table('participante')
            ->select('participante.id')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->get();
        return $query;
    }

    /*Export Data.csv*/
    public function export(Request $request){       
        $tot_record_found=1;
        $CsvData = $this->dados();
        $filename='Participante_'.date('Y-m-d').".csv";
        $file_path=base_path().'/'.$filename;   
        $file = fopen($file_path,"w+");
        foreach ($CsvData as $exp_data){
            fputcsv($file, $exp_data);
        }   
        fclose($file);          
        $headers = ['Content-Type' => 'application/csv'];
        return response()->download($file_path,$filename,$headers ); 
    }
    

    public function buscar_participante(){
        $column = 'dados_inscricao.renda';
        $order = '';
        if(strcmp($column, '')){
            $order = 'desc';
        }

        $query = DB::table('participante')
            ->join('matricula', 'matricula.id', '=', 'participante.matricula_id')
            ->join('status_matricula', 'status_matricula.id', '=', 'matricula.status_matricula_id')
            ->join('inscricao', 'inscricao.id', '=', 'matricula.inscricao_id')
            ->join('dados_inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
            ->join('pessoa', 'pessoa.id', '=', 'dados_inscricao.dados_pessoais_id')
            ->join('Endereco', 'Endereco.id', '=', 'pessoa.Endereco_id')
            ->select('pessoa.*', 'Endereco.*', 'matricula.*', 'status_matricula.*', 'inscricao.*', 'dados_inscricao.*');
        
        if(strcmp($column, '')){
            $query = $query->orderBy($column, $order)->get();
        } else{
            $query = $query->get();
        }
        
        return $query;
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

    public function dados(){
        $query = $this->buscar_participante();
        $key = $this->buscar_chave($query);
        $arquivo = $this->juntar($key, $query);
        
        return $arquivo;
    }
}