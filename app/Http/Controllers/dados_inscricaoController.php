<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DadosInscricao;
use App\Pessoa;
use App\Endereco;
use App\Contato;
use App\Escola;
use App\Inscricao;
use App\Documento;
use App\Documento_tipo;

class dados_inscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados_inscricao = DadosInscricao::all();
        $escola = Escola::all();
        $documento_tipo = Documento_tipo::all();
        $documento_tipo2 = Documento_tipo::all();
        $documento_tipo3 = Documento_tipo::all();
<<<<<<< HEAD
        $contato = Contato::all();
        
        return view('dados_inscricao.index', compact('dados_inscricao', 'escola', 'documento_tipo', 'documento_tipo2', 'documento_tipo3', 'contato'));
=======
        
        return view('dados_inscricao.index', compact('dados_inscricao', 'escola', 'documento_tipo', 'documento_tipo2', 'documento_tipo3'));
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados_inscricao = DadosInscricao::all();
        $escola = Escola::all();
        $documento_tipo = Documento_tipo::all();
        $documento_tipo2 = Documento_tipo::all();
        $documento_tipo3 = Documento_tipo::all();
<<<<<<< HEAD
        $contato = Contato::all();


        return view('dados_inscricao.create', compact('dados_inscricao', 'escola', 'documento_tipo', 'documento_tipo2', 'documento_tipo3', 'contato'));
=======


        return view('dados_inscricao.create', compact('dados_inscricao', 'escola', 'documento_tipo', 'documento_tipo2', 'documento_tipo3'));
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
    }

    public function pesquisa($cpf){

      return DB::table('pessoa')->where('cpf', '=', $cpf)->get();

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formulario = new DadosInscricao;
        $person = new Pessoa;
        $pai = new Pessoa;
        $mae = new Pessoa;
        $ende = new Endereco;
        $insc = new Inscricao;
        $document = new Documento;
<<<<<<< HEAD
        $telefone = new Contato;

=======
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
        //$document2 = new Documento;
        //$document3 = new Documento;
        //$document4 = new Documento;
        // criar view cadastrar escola pra ter campo com lista de escolas pra mostrar. 
        // criar objeto do endereço pra colocar endereço tanto da escolaa quanto das pessoas
        // contato tbm
        $person->nome = $request->nome;
        $person->cpf = $request->cpf;
        $person->data_nascimento = $request->data_nascimento;
        

        $pai->nome = $request->nomePai;
        $pai->cpf = $request->cpfPai;
        $pai->data_nascimento = $request->data_nascimentoPai;
        

        $mae->nome = $request->nomeMae;
        $mae->cpf = $request->cpfMae;
        $mae->data_nascimento = $request->data_nascimentoMae;
        
        //colocar barra de rolagem com escolas. olhar no git, nas views do hackaton
       

        $ende->rua = $request->rua;
        $ende->bairro = $request->bairro;
        $ende->numero = $request->numero;
        $ende->complemento = $request->complemento;
        $ende->cep = $request->cep;
        $ende->cidade = $request->cidade;
        $ende->estado = $request->uf;
        $ende->pais = $request->pais;
        $ende->save(['timestamps' => false]);
            //SQLSTATE[HY000]: General error: 1364 Field 'Endereco_id' doesn't have a default value
        $person->Endereco()->associate($ende);
        $mae->Endereco()->associate($ende);
        $pai->Endereco()->associate($ende);
        $person->save(['timestamps' => false]);
        $pai->save(['timestamps' => false]);
        $mae->save(['timestamps' => false]);
        //testar essas alterações depois de remover os index no BD. Daí, recriar a relação pessoa-endereço que tá bugadas e ver

        $formulario->turno = $request->turno;
        $formulario->turma = $request->turma;
        $formulario->observacoes = $request->observacoes;
        $formulario->transporte = $request->transporte;
        $formulario->profissao = $request->profissao;
        $formulario->raca = $request->raca;
        $formulario->religiao = $request->religiao;
        $formulario->renda = $request->renda;
        $formulario->qtd_residencia = $request->qtd_residencia;
        $formulario->beneficio_social = $request->beneficio_social;
        $formulario->serie = $request->serie;
        $formulario->escola_id = $request->escola;
        //$formulario->escola()->associate($escola_id);
        $formulario->dados_pessoais()->associate($person); //BO aqui
        $formulario->pai()->associate($pai);
        $formulario->mae()->associate($mae);
       


        //$formulario->escola_id
        //$formulario->dados_pessoais_id  tirar isso de nulo no banco. Colocar lista de escolas disponíveis 
        //$formulario->mae_id
        //$formulario->pai_id
        $formulario->save(['timestamps' => false]);
        $insc->data_inscricao = $request->data_inscricao;
        $insc->data_avaliacao = $request->data_avaliacao;
        $insc->dados_inscricao()->associate($formulario);
        $insc->save(['timestamps' => false]);
<<<<<<< HEAD
        $telefone->numero_fixo = $request->telefone;
        $telefone->celular1 = $request->celular1;
        $telefone->celular2 = $request->celular2;
        $telefone->email = $request->email;
        $telefone->pessoa()->associate($person);
        $telefone->save(['timestamps' => false]);

        $help = $insc->id;
        $documento_tipo = Documento_tipo::all();
        $documento_tipo2 = Documento_tipo::all();
        $documento_tipo3 = Documento_tipo::all();
       return view('documento.create', compact('documento_tipo', 'documento_tipo2', 'documento_tipo3', 'help'));
=======

        $this->validate($request, [
            'documento' => 'required|file'
         ]);
        
        $file = $request->file('documento');
        $document->url = $file->store('documento');
        $document->numero_documento = $request->numero_documento;
        $document->comentario = $request->comentario;
        $document->inscricao()->associate($insc);
        $document->documento_tipo_id = $request->doc_type; 
        $document->save(['timestamps' => false]);

        $this->validate($request, [
            'documento' => 'required|file'
         ]);
        
        $file = $request->file('documento2');
        $document->url = $file->store('documento');
        $document->numero_documento = $request->numero_documento;
        $document->comentario = $request->comentario2;
        $document->inscricao()->associate($insc);
        $document->documento_tipo_id = $request->doc_type2; 
        $document->save(['timestamps' => false]);

        $this->validate($request, [
            'documento' => 'required|file'
         ]);
        
        $file = $request->file('documento3');
        $document->url = $file->store('documento');
        $document->numero_documento = $request->numero_documento3;
        $document->comentario = $request->comentario3;
        $document->inscricao()->associate($insc);
        $document->documento_tipo_id = $request->doc_type3; 
        $document->save(['timestamps' => false]);

        return view('home');
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
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
