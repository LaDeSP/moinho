<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
 
class relatorioController extends Controller {
     
    /*Export Data*/
    public function export(Request $request){       
        $tot_record_found=1;
        $CsvData = $this->dados_inscricao();
        $filename='Inscricao_'.date('Y-m-d').".csv";
        $file_path=base_path().'/'.$filename;   
        $file = fopen($file_path,"w+");
        foreach ($CsvData as $exp_data){
            fputcsv($file, $exp_data);
        }   
        fclose($file);          
        $headers = ['Content-Type' => 'application/csv'];
        return response()->download($file_path,$filename,$headers ); 
    }

    public function testando(){
        return $this->dados_inscricao();
    }
    

    public function buscar_inscricao(){
        $query = DB::table('inscricao')
            ->join('dados_inscricao', 'inscricao.dados_inscricao_id', '=', 'dados_inscricao.id')
            ->join('pessoas', function($join){
                $join->on('pessoas.id', '=', 'dados_inscricao.dados_pessoais_id');
            })
            ->select('*', 'inscricao.id as id_inscricao')
            ->get();
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

    public function dados_inscricao(){
        $query = $this->buscar_inscricao();
        $key = $this->buscar_chave($query);
        $arquivo = $this->juntar($key, $query);
        
        return $arquivo;
    }
     
}   
?>