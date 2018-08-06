<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Inscricao;
use App\Turma;
use App\StatusMatricula;
use App\DadosInscricao;
use App\Pessoa;
use App\Endereco;
use Zizaco\Entrust\EntrustFacade as Entrust;


class matriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matricula = Matricula::all();
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
        # Caso o usuário logado não tenha acesso a essa página, retorna um erro
        if(!Entrust::can('ver-matricula')) {
            return abort(404);
        }

        $matricula = Matricula::all();
        $count = Matricula::whereYear('data', '>=', date('Y'))->count(); //Terá que ser mudado, pois existe mais de uma lista
        $inscricao_id = Inscricao::all();
        $turma_id = Turma::all();
        $todos_status = StatusMatricula::all();
        $cont = 1;
        foreach($todos_status as $value){
            $status[ $value->id ] = $value;
        }

        return view('matricula.create', compact('cont', 'count', 'matricula', 'inscricao_id', 'turma_id', 'status'));
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
        
        $formulario->turno = $request->turno;
        //$formulario->periodo = $request->periodo;
        $formulario->inscricao_id = $request->inscricao_id;
        $formulario->data = $request->data;
        $formulario->status_matricula_id = $request->status;
        $formulario->turma_id = $request->turma_id;
    
        $formulario->save(['timestamps' => false]);


        return redirect()->back()->with('message', 'Matricula adicionada com sucesso!');
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
        $matricula = Matricula::find($id);
        $status = StatusMatricula::all();

        return view('matricula.show', compact('matricula', 'status', 'id'));
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matricula = Matricula::find($id);
        $status = StatusMatricula::all();

        return view('matricula.edit', compact('matricula', 'status'));
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
        $matricula = Matricula::find($id);

        $matricula->turno = $request->turno;
        
        $matricula->inscricao_id = $request->inscricao_id;
        $matricula->data = $request->data;
        $matricula->status_matricula_id = $request->status;
        $matricula->turma_id = $request->turma_id;
    
        $matricula->save(['timestamps' => false]);

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

    public function termo($id)
    {
        $matricula = Matricula::find($id);
        $inscricao = Inscricao::find($matricula->inscricao_id);
        $dados_inscricao = DadosInscricao::find($inscricao->dados_inscricao_id);
        $inscrito = Pessoa::find($dados_inscricao->dados_pessoais_id);
        $responsavel = Pessoa::find($dados_inscricao->responsavel1_id);
        $endereco_responsavel = Endereco::find($responsavel->endereco_id);

        // Declara a data! :P
        $data = $inscrito->data_nascimento;
    
        // Separa em dia, mês e ano
        list($ano, $mes, $dia) = explode('-', $data);
    
        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
    
        // Depois apenas fazemos o cálculo já citado :)
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        $inscrito->idade = $idade;

        return view('matricula.termoDeImagem', compact('inscrito', 'responsavel', 'endereco_responsavel'));
    }
}
