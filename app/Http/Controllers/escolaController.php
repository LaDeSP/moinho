<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Endereco;
use App\Contato;
use App\Escola;
use Zizaco\Entrust\EntrustFacade as Entrust;

class escolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escolas = Escola::all();
        
        return view('escola.index', compact('escolas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escolas = Escola::all();
        $count = Escola::all()->count();

        # Caso o usuário logado não tenha acesso a essa página, retorna um erro
        if(!Entrust::can('ver-escola')) {
            return abort(404);
        }
        return view('escola.create', compact('count', 'escolas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formulario = new Escola;
        $ende = new Endereco;
        $telefone = new Contato;

        $ende->rua = $request->rua;
        $ende->bairro = $request->bairro;
        $ende->numero = $request->numero;
        $ende->complemento = $request->complemento;
        $ende->cep = $request->cep;
        $ende->cidade = $request->cidade;
        $ende->estado = $request->estado;
        $ende->pais = $request->pais;
        $ende->save(['timestamps' => false]);
        //recriar relação escola e dados inscrição
        $telefone->numero_fixo = $request->telefone;
        $telefone->celular1 = $request->celular1;
        $telefone->celular2 = $request->celular2;
        $telefone->email = $request->email;
        $telefone->save(['timestamps' => false]);
       

        $formulario->nome_fantasia = $request->nome_fantasia;
        $formulario->nome = $request->nome;
        $formulario->tipo = $request->tipo;
        $formulario->contato()->associate($telefone);
        $formulario->endereco()->associate($ende);
        $formulario->save(['timestamps' => false]);


        return redirect()->back()->with('message', 'Alteração realizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $escola = Escola::find($id);
        $contato = Contato::find($escola->contato_id);
        $endereco = Endereco::find($escola->endereco_id);

        return view('escola.show', compact('escola', 'contato', 'endereco', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $escola = Escola::find($id);
        $contato = Contato::find($escola->contato_id);
        $endereco = Endereco::find($escola->endereco_id);

        return view('escola.edit', compact('escola', 'contato', 'endereco'));
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
        $escola = Escola::find($id);
        $endereco = Endereco::find($escola->endereco_id);
        $contato = Contato::find($escola->contato_id);

        $endereco->rua = $request->rua;
        $endereco->bairro = $request->bairro;
        $endereco->numero = $request->numero;
        $endereco->complemento = $request->complemento;
        $endereco->cep = $request->cep;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->pais = $request->pais;
        $endereco->save(['timestamps' => false]);
        
        //recriar relação escola e dados inscrição
        $contato->numero_fixo = $request->telefone;
        $contato->celular1 = $request->celular1;
        $contato->celular2 = $request->celular2;
        $contato->email = $request->email;
        $contato->save(['timestamps' => false]);
       

        $escola->nome_fantasia = $request->nome_fantasia;
        $escola->nome = $request->nome;
        $escola->tipo = $request->tipo;

        $escola->save(['timestamps' => false]);

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
}
