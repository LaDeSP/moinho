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
use Zizaco\Entrust\EntrustFacade as Entrust;

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
        $contato = Contato::all();
        
        return view('dados_inscricao.index', compact('dados_inscricao', 'escola', 'documento_tipo', 'documento_tipo2', 'documento_tipo3', 'contato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #Caso o usuário logado não tenha acesso a essa página, retorna um erro
        if(!Entrust::can('ver-inscricao'))
            return abort(404);

        $dados_inscricao = DadosInscricao::all();
        $count = DadosInscricao::all()->count();
        $escola = Escola::all();
        $documento_tipo = Documento_tipo::all();
        $documento_tipo2 = Documento_tipo::all();
        $documento_tipo3 = Documento_tipo::all();
        $contato = Contato::all();


        return view('dados_inscricao.create', compact('count', 'dados_inscricao', 'escola', 'documento_tipo', 'documento_tipo2', 'documento_tipo3', 'contato'));
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
        $telefone = new Contato;

        
        //Contato
        $telefone->numero_fixo = $request->telefone;
        $telefone->celular1 = $request->celular1;
        $telefone->celular2 = $request->celular2;
        $telefone->email = $request->email;
        $telefone->save(['timestamps' => false]);
        
        //Pessoa
        $person->nome = $request->nome;
        $person->cpf = $request->cpf;
        $person->data_nascimento = $request->data_nascimento;
        
        //Pessoa - Responsavel
        $pai->nome = $request->nomePai;
        $pai->cpf = $request->cpfPai;
        $pai->data_nascimento = $request->data_nascimentoPai;
        
        //Pessoa - Responsavel 2
        $mae->nome = $request->nomeMae;
        $mae->cpf = $request->cpfMae;
        $mae->data_nascimento = $request->data_nascimentoMae;
        
        //Endereço
        $ende->rua = $request->rua;
        $ende->bairro = $request->bairro;
        $ende->numero = $request->numero;
        $ende->complemento = $request->complemento;
        $ende->cep = $request->cep;
        $ende->cidade = $request->cidade;
        $ende->estado = $request->uf;
        $ende->pais = $request->pais;
        $ende->save(['timestamps' => false]);

        //Chaves estrangeiras - Pessoa
        $person->endereco()->associate($ende);
        $person->contato()->associate($telefone);

        //Chaves estrangeiras - Responsavel 2
        $mae->endereco()->associate($ende);
        $mae->contato()->associate($telefone);

        //Chaves estrangeiras - Responsavel 1
        $pai->endereco()->associate($ende);
        $pai->contato()->associate($telefone);

        //Criando os registros
        $person->save(['timestamps' => false]);
        $pai->save(['timestamps' => false]);
        $mae->save(['timestamps' => false]);

        //Criar os dados inscrição
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
        $formulario->responsavel1()->associate($pai);
        $formulario->responsavel2()->associate($mae);
       


        //Criando o registro
        $formulario->save(['timestamps' => false]);

        //Inscrição
        $insc->data_inscricao = $request->data_inscricao;
        $insc->data_avaliacao = $request->data_avaliacao;
        $insc->dados_inscricao()->associate($formulario);
        $insc->save(['timestamps' => false]);

        

        $help = $insc->id;
        $documento_tipo = Documento_tipo::all();
        $documento_tipo2 = Documento_tipo::all();
        $documento_tipo3 = Documento_tipo::all();
       return view('documento.create', compact('documento_tipo', 'documento_tipo2', 'documento_tipo3', 'help'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $escola = Escola::all();
        $inscricao = Inscricao::find($id);
        $dados_inscricao = DadosInscricao::find($inscricao->dados_inscricao_id);
        $dados_pessoais = Pessoa::find($dados_inscricao->dados_pessoais_id);
        $responsavel1 =  Pessoa::find($dados_inscricao->responsavel1_id);
        $responsavel2 =  Pessoa::find($dados_inscricao->responsavel2_id);
        $endereco = Endereco::find($dados_pessoais->endereco_id);
        $document = Documento::all();
        $contato = Contato::find($dados_pessoais->contato_id);
        return view('dados_inscricao.show', compact('id', 'escola', 'contato', 'document', 'inscricao', 'endereco', 'dados_inscricao', 'dados_pessoais', 'responsavel1', 'responsavel2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $escola = Escola::all();
        $inscricao = Inscricao::find($id);
        $dados_inscricao = DadosInscricao::find($inscricao->dados_inscricao_id);
        $dados_pessoais = Pessoa::find($dados_inscricao->dados_pessoais_id);
        $responsavel1 =  Pessoa::find($dados_inscricao->responsavel1_id);
        $responsavel2 =  Pessoa::find($dados_inscricao->responsavel2_id);
        $endereco = Endereco::find($dados_pessoais->endereco_id);
        $document = Documento::all();
        $contato = Contato::find($dados_pessoais->contato_id);
        return view('dados_inscricao.edit', compact('escola', 'contato', 'document', 'inscricao', 'endereco', 'dados_inscricao', 'dados_pessoais', 'responsavel1', 'responsavel2'));
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
        $dadosInscricao = DadosInscricao::findOrFail($id);
        $person = Pessoa::findOrFail($dadosInscricao->dados_pessoais_id);
        $pai = Pessoa::findOrFail($dadosInscricao->responsavel1_id);
        $mae = Pessoa::findOrFail($dadosInscricao->responsavel2_id);
        $ende = Endereco::findOrFail($person->endereco_id);
        $insc = Inscricao::findOrFail($dadosInscricao->id);
        $contato = Contato::findOrFail($person->contato_id);

        
        //Contato
        $contato->numero_fixo = $request->telefone;
        $contato->celular1 = $request->celular1;
        $contato->celular2 = $request->celular2;
        $contato->email = $request->email;
        $contato->save(['timestamps' => false]);
        
        //Pessoa
        $person->nome = $request->nome;
        $person->cpf = $request->cpf;
        $person->data_nascimento = $request->data_nascimento;
        
        //Pessoa - Responsavel
        $pai->nome = $request->nomePai;
        $pai->cpf = $request->cpfPai;
        $pai->data_nascimento = $request->data_nascimentoPai;
        
        //Pessoa - Responsavel 2
        $mae->nome = $request->nomeMae;
        $mae->cpf = $request->cpfMae;
        $mae->data_nascimento = $request->data_nascimentoMae;
        
        //Endereço
        $ende->rua = $request->rua;
        $ende->bairro = $request->bairro;
        $ende->numero = $request->numero;
        $ende->complemento = $request->complemento;
        $ende->cep = $request->cep;
        $ende->cidade = $request->cidade;
        $ende->estado = $request->uf;
        $ende->pais = $request->pais;
        $ende->save(['timestamps' => false]);

        //Criando os registros
        $person->save(['timestamps' => false]);
        $pai->save(['timestamps' => false]);
        $mae->save(['timestamps' => false]);

        //Criar os dados inscrição
        $dadosInscricao->turno = $request->turno;
        $dadosInscricao->turma = $request->turma;
        $dadosInscricao->observacoes = $request->observacoes;
        $dadosInscricao->transporte = $request->transporte;
        $dadosInscricao->profissao = $request->profissao;
        $dadosInscricao->raca = $request->raca;
        $dadosInscricao->religiao = $request->religiao;
        $dadosInscricao->renda = $request->renda;
        $dadosInscricao->qtd_residencia = $request->qtd_residencia;
        $dadosInscricao->beneficio_social = $request->beneficio_social;
        $dadosInscricao->serie = $request->serie;
        $dadosInscricao->escola_id = $request->escola;
       


        //Criando o registro
        $dadosInscricao->save(['timestamps' => false]);

        //Inscrição
        $insc->data_inscricao = $request->data_inscricao;
        $insc->data_avaliacao = $request->data_avaliacao;
        $insc->save(['timestamps' => false]);


        return redirect()->back()->with('message', 'Alteração realizada com sucesso!');
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
