<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Pessoa;
use App\Colaborador;
use App\Endereco;
use App\Role;
use App\Contato;
use App\User;
use Zizaco\Entrust\EntrustFacade as Entrust;

class colaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaborador = Colaborador::all();
        $tipo = Role::all();
  
        
        return view('colaborador.index', compact('colaborador', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Caso o usuário logado não tenha acesso a essa página, retorna um erro
        if(!Entrust::can('ver-colaborador')) {
            return abort(404);
        }
        
        $colaborador = Colaborador::all();
        $tipo = Role::all();
        
        return view('colaborador.create', compact('colaborador', 'tipo'));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $formulario = new Colaborador;
        $person = new Pessoa;
        $ende = new Endereco;
        $telefone = new Contato;
        $user = new User;
        
      
        $person->nome = $request->nome;
        $person->cpf = $request->cpf;
        $person->data_nascimento = $request->data_nascimento;

        $telefone->numero_fixo = $request->telefone;
        $telefone->celular1 = $request->celular1;
        $telefone->celular2 = $request->celular2;
        $telefone->email = $request->email;
        //$telefone->pessoa()->associate($person);
        $telefone->save(['timestamps' => false]);

        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = bcrypt('MC/01');
        $user->save(['timestamps' => false]);

        $ende->rua = $request->rua;
        $ende->bairro = $request->bairro;
        $ende->numero = $request->numero;
        $ende->complemento = $request->complemento;
        $ende->cep = $request->cep;
        $ende->cidade = $request->cidade;
        $ende->estado = $request->uf;
        $ende->pais = $request->pais;
        $ende->save(['timestamps' => false]);

        $person->Endereco()->associate($ende);
        $person->contato()->associate($telefone);
        $person->save(['timestamps' => false]);

        $formulario->ano_ingreco = $request->ano_ingresso;
        $formulario->area_atuacao = $request->area_atuacao;
        $formulario->tipo_colaborador_id = $request->tipo_colaborador;
        $formulario->pessoa()->associate($person);
        $formulario->user()->associate($user);
        $formulario->save(['timestamps' => false]);
        

        $role = Role::where('id', $request->tipo_colaborador)->first();
        $user->attachRole($role);



        


        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function show($id)
    {
        $documents = Document::where('organization_id', $id)->get();
        return view('organizations.show', compact('documents'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colaborador = Colaborador::find($id);
        $pessoa = Pessoa::find($colaborador->pessoa_id);
        $endereco = Endereco::find($pessoa->endereco_id);
        $contato = Contato::find($pessoa->contato_id);
        $user = User::find($colaborador->user_id);
        $tipo = Role::all();

        return view('colaborador.edit', compact('tipo', 'colaborador', 'pessoa', 'endereco', 'contato', 'user'));
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

    /*public function list_documents()
    {
        $documents = Documents::where('organization');
    }*/

    public function export(Request $request){       
        $tot_record_found=1;
        $CsvData = $this->dados();
        $filename='Colaborador_'.date('Y-m-d').".csv";
        $file_path=base_path().'/'.$filename;   
        $file = fopen($file_path,"w+");
        foreach ($CsvData as $exp_data){
            fputcsv($file, $exp_data);
        }   
        fclose($file);          
        $headers = ['Content-Type' => 'application/csv'];
        return response()->download($file_path,$filename,$headers );
    }
    

    public function buscar_colaborador(){
        $column = '';
        $order = '';
        if(strcmp($column, '')){
            $order = 'desc';
        }

        $query = DB::table('colaborador')
            ->join('pessoas', 'pessoas.id', '=', 'colaborador.pessoa_id')
            ->join('roles', 'roles.id', '=', 'colaborador.tipo_colaborador_id')
            ->select('pessoas.*', 'colaborador.*', 'roles.name as Atuacao');
        
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
        $query = $this->buscar_colaborador();
        $key = $this->buscar_chave($query);
        $arquivo = $this->juntar($key, $query);
        
        return $arquivo;
    }
}
