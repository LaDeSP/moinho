<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pessoa;
use App\Colaborador;
use App\Endereco;
use App\TipoColaborador;
use App\Contato;

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
        $tipo = TipoColaborador::all();
  
        
        return view('colaborador.index', compact('colaborador', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $colaborador = Colaborador::all();
         $tipo = TipoColaborador::all();
  
        
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
      
        $person->nome = $request->nome;
        $person->cpf = $request->cpf;
        $person->data_nascimento = $request->data_nascimento;
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
        $person->save(['timestamps' => false]);
        $formulario->ano_de_ingresso = $request->ano_ingresso;
        $formulario->area_atuacao = $request->area_atuacao;
        $formulario->tipo_colaborador_id = $request->tipo_colaborador;
        $formulario->pessoa()->associate($person);
        $formulario->save(['timestamps' => false]);
        $telefone->numero_fixo = $request->telefone;
        $telefone->celular1 = $request->celular1;
        $telefone->celular2 = $request->celular2;
        $telefone->email = $request->email;
        $telefone->pessoa()->associate($person);
        $telefone->save(['timestamps' => false]);



        


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

    /*public function list_documents()
    {
        $documents = Documents::where('organization');
    }*/
}
