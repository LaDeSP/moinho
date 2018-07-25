<?php

    function busca_inscricao()
    {
        $query = DB::table('pessoas')
            ->join('dados_inscricao', 'pessoas.id', '=', 'dados_inscricao.dados_pessoais_id')
            ->join('inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
            ->select('pessoas.*', 'inscricao.id as inscricao_id', 'dados_inscricao.*')
            ->whereYear('inscricao.data_inscricao', '=', date('Y'))
            ->get();
        $query = json_decode($query);
        return $query;
    }

    function buscar_disciplina()
    {
        $query = DB::table('disciplina')
            ->join('colaborador', 'colaborador.id', '=', 'disciplina.colaborador_id')
            ->join('pessoas', 'pessoas.id', '=', 'colaborador.pessoa_id')
            ->select('disciplina.*', 'pessoas.nome as nome_colaborador')
            ->get();
        return $query;
    }

    function buscar_colaborador()
    {
        $query = DB::table('colaborador')
            ->join('pessoas', 'pessoas.id', '=', 'colaborador.pessoa_id')
            ->join('contatos', 'contatos.id', '=', 'pessoas.contato_id')
            ->select('colaborador.*', 'pessoas.nome', 'contatos.numero_fixo', 'contatos.celular1', 'contatos.celular2', 'contatos.email')
            ->get();
        return $query;
    }

    function buscar_matricula_pessoa($status)
    {
        $query = DB::table('matricula')
            ->join('turma', 'turma.id', '=', 'matricula.turma_id')
            ->join('nome_turma', 'nome_turma.id', '=', 'turma.nome_turma_id')
            ->join('inscricao', 'inscricao.id', '=', 'matricula.inscricao_id')
            ->join('dados_inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
            ->join('pessoas', 'pessoas.id', '=', 'dados_inscricao.dados_pessoais_id')
            ->join('status_matricula', 'status_matricula.id', '=', 'matricula.status_matricula_id')
            ->select('matricula.id', 'pessoas.nome', 'nome_turma.nome_turma')
            ->where('status_matricula.status', '=', $status)
            ->get();
        return $query;
    }

    function buscar_escola()
    {
        $query = DB::table('escolas')
            ->join('enderecos', 'enderecos.id', '=', 'escolas.endereco_id')
            ->join('contatos', 'contatos.id', '=', 'escolas.contato_id')
            ->select('*', 'escolas.id as escola_id')
            ->get();
        
        return $query; 
    }

    function busca_turma()
    {
        $query = DB::table('nome_turma')
            ->join('turma', 'nome_turma.id', '=', 'turma.nome_turma_id')
            ->select('nome_turma.nome_turma', 'turma.id', 'turma.ano', 'turma.turno', 'turma.periodo')
            ->where('turma.ano', '>=', date('Y'))
            ->get();
        //$query = json_encode($query); para funcionar com o php puro que o alan fez. do Laravel é assim. tava faltando campos no select tbm
        //$query = json_decode($query);
        return $query;
    }

    function busca_nome_inscrito()
    {
        $query = DB::table('pessoas')
            ->join('dados_inscricao', 'pessoas.id', '=', 'dados_inscricao.dados_pessoais_id')
            ->join('inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
            ->select('pessoas.nome', 'inscricao.id')
            ->get();
        //$query = json_encode($query); para funcionar com o php puro
        $query = json_decode($query);
        return $query;
    }

    function data_matricula($status)
    {
        $query = DB::table('matricula')
            ->join('status_matricula', 'matricula.status_matricula_id', '=', 'status_matricula.id')
            ->select('matricula.data')
            ->where('status_matricula.status', '=', $status)
            ->get();

        $date = [];
        foreach($query as $data)
        {
            $dados = date( 'Y', strtotime( $data->data ) );
            $date[] = $dados;
        }

        $date = array_unique($date);
        arsort($date);
        return $date;
    }

    function busca_nome()
    {
        $query = DB::table('nome_turma')
            ->join('turma', 'nome_turma.id', '=', 'turma.nome_turma_id')
            ->select('nome_turma.nome_turma', 'turma.id', 'turma.turno')
            ->get();
        //$query = json_encode($query); para funcionar com o php puro que o alan fez. do Laravel é assim. tava faltando campos no select tbm
        //$query = json_decode($query);
        return $query;
    }

    function busca_inscricao2($id)
    {
        $query = DB::table('inscricao')->where('id', '=', $id)->get();
        return $query;
    }

    function busca_dados($id)
    {
        $query = DB::table('dados_inscricao')->where('id', '=', $id)->get();
        return $query;
    }

    function busca_pessoa($id)
    {
        $query = DB::table('pessoas')->where('id', '=', $id)->get();
        return $query;
    }
    function buscar_turma($id)
    {
        $query = DB::table('turma')->where('id', '=', $id)->get();
        return $query;
    }
    function buscar_nometurma($id)
    {
        $query = DB::table('nome_turma')->where('id', '=', $id)->get();
        return $query;
    }

    function busca_matricula_ano($ano){
        $query = DB::table('matricula')->whereYear('data', $ano)->get();
        return $query;
    }
    function busca_matricula($id){
        $query = DB::table('matricula')->where('id', '>', $id)->get();
        return $query;
    }
    function busca_pessoa2($nome){
        $query = DB::table('pessoas')->where('nome', '=', $nome)->get();
        return $query;
    }
    function busca_pessoa3($id)
    {
        $query = DB::table('pessoas')->where('id', '>', $id)->get();
        return $query;
    }
    function busca_inscricao3($id)
    {
         $query = DB::table('inscricao')->where('id', '>', $id)->get();
        return $query;
    }
    function busca_dados_inscricao($id){
        $query = DB::table('dados_inscricao')->where('id', '>', $id)->get();
            return $query;
    }
    function buscar_turmaaa($id){
        $query = DB::table('turma')->where('id', '>', $id)->get();
            return $query;
    }
    function buscar_nome_turma($id){
         $query = DB::table('nome_turma')->where('id', '>', $id)->get();
            return $query;
    }

    function teste(){
        $query = DB::table('pessoas')
            ->join('dados_inscricao', 'pessoas.id', '=', 'dados_inscricao.dados_pessoais_id')
            ->join('inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
            ->join('matricula', 'inscricao.id', '=', 'matricula.inscricao_id')
            ->join('turma', 'turma.id', '=', 'matricula.turma_id')
            ->join('nome_turma', 'nome_turma.id', '=', 'turma.nome_turma_id')
            ->select('pessoas.nome', 'inscricao.id')
            ->get();
        return $query;
    }
    function home(){
        $query = DB::table('pessoas')
            ->join('dados_inscricao', 'pessoas.id', '=', 'dados_inscricao.dados_pessoais_id')
            ->join('inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
            ->select(DB::raw('inscricao.data_avaliacao, pessoas.nome, inscricao.id, pessoas.cpf, DATEDIFF(inscricao.data_avaliacao, CURDATE()) AS Dias'))  
            ->orderBy('Dias')
            ->get();
        return $query;
    }


    function mostrar_ocorrencia($id) //mostra as ocorrencias QUE ususario logado registrou
    {
        $query = DB::table('ocorrencia')
            ->join('colaborador', 'ocorrencia.colaborador_id', '=', 'colaborador.id')
            ->join('tipo_ocorrencia_advertencia', 'tipo_ocorrencia_advertencia.id', '=', 'ocorrencia.tipo_ocorrencia_advertencia')
            ->join('users','users.id','=','colaborador.user_id')
            ->join('matricula','matricula.id','=','ocorrencia.participante_id')
            ->join('inscricao','matricula.inscricao_id', '=', 'inscricao.id')
            //->whereYear('matricula.data', '=', 'ocorrencia.data_ocorrencia')
            ->join('dados_inscricao','dados_inscricao.id','=','inscricao.dados_inscricao_id')
            ->join('pessoas','pessoas.id','=','dados_inscricao.dados_pessoais_id')
            ->select('*','ocorrencia.id as ocorrencia_id','tipo_ocorrencia_advertencia.nome as status','pessoas.nome as nome_colaborador')
            ->whereYear('ocorrencia.data_ocorrencia', '=', date('Y'))
            ->where('colaborador.user_id','=',$id)
            ->orderByDesc('ocorrencia.data_ocorrencia')
            ->get();
        return $query; 
    }

    function mostrar_advertencia()
    {
        $query = DB::table('ocorrencia')
            ->join('colaborador', 'ocorrencia.colaborador_id', '=', 'colaborador.id')
            ->join('tipo_ocorrencia_advertencia', 'tipo_ocorrencia_advertencia.id', '=', 'ocorrencia.tipo_ocorrencia_advertencia')
            ->join('pessoas','pessoas.id','=','colaborador.pessoa_id')
            ->join('users','users.id','=','colaborador.user_id')
            ->select('*', 'ocorrencia.id as ocorrencia_id','tipo_ocorrencia_advertencia.nome as status','pessoas.nome as nome_colaborador')
            ->orderByDesc('ocorrencia.data_ocorrencia')
            ->get();
        return $query; 
    }
    function busca_participante()
    {
        $query = DB::table('matricula')
        ->join('inscricao','inscricao.id','=','matricula.inscricao_id')
        ->join('dados_inscricao','dados_inscricao.id','=','inscricao.dados_inscricao_id')
        ->join('pessoas','pessoas.id','=','dados_inscricao.dados_pessoais_id')
         //->join('matricula','participante.matricula_id','=','matricula.id')
         ->select('matricula.id as matricula','pessoas.nome as nome')
         ->whereYear('data',date('Y'))
         ->where('matricula.status_matricula_id','=',1)
        ->get();
        return $query;
    }
  
    function busca_ocorrencia_participante($id_ocorrencia) //LISTA A OCORRÊNCIA do participante
    {
        $query = DB::table('ocorrencia')
       ->join('matricula','matricula.id','=','ocorrencia.participante_id')
        ->join('inscricao','inscricao.id','=','matricula.inscricao_id')
       ->join('dados_inscricao','dados_inscricao.id','=','inscricao.dados_inscricao_id')
        ->join('pessoas','pessoas.id','=','dados_inscricao.dados_pessoais_id')
        ->join('tipo_ocorrencia_advertencia','tipo_ocorrencia_advertencia.id','ocorrencia.tipo_ocorrencia_advertencia')
        //->join('advertencia','advertencia.ocorrencia_id','=','ocorrencia.id')
        ->select('pessoas.nome as nome_participante','ocorrencia.motivo as motivo_ocorrencia','matricula.id as participante_id','ocorrencia.data_ocorrencia as data_ocorrencia','tipo_ocorrencia_advertencia.nome as tipo')
        ->whereYear('ocorrencia.data_ocorrencia', '=', date('Y'))
        ->where('ocorrencia.id','=',$id_ocorrencia)
        ->get();
        //->first();
        return $query;
    }
    function busca_colaborador_gerou_ocorrencia($ocorrencia_id){
        $query = DB::table('ocorrencia')
        ->join('colaborador', 'ocorrencia.colaborador_id', '=', 'colaborador.id')
        ->join('pessoas','pessoas.id','=','colaborador.pessoa_id')
        ->select('*')
        ->where('ocorrencia.id','=',$ocorrencia_id)
        ->get();
        //->first();
        return $query;


    }
  
    function mostrar_ocorrencias() //mostra as ocorrencias para o setor responsavel
    {
        $query = DB::table('ocorrencia')
            ->join('colaborador', 'ocorrencia.colaborador_id', '=', 'colaborador.id')
            ->join('tipo_ocorrencia_advertencia', 'tipo_ocorrencia_advertencia.id', '=', 'ocorrencia.tipo_ocorrencia_advertencia')
            ->join('users','users.id','=','colaborador.user_id')
            ->join('matricula','matricula.id','=','ocorrencia.participante_id')
            ->join('inscricao','matricula.inscricao_id', '=', 'inscricao.id')
            ->join('dados_inscricao','dados_inscricao.id','=','inscricao.dados_inscricao_id')
            ->join('pessoas','pessoas.id','=','dados_inscricao.dados_pessoais_id')
            ->select('*','ocorrencia.id as ocorrencia_id','tipo_ocorrencia_advertencia.nome as status','pessoas.nome as nome_colaborador')
            ->whereYear('ocorrencia.data_ocorrencia',date('Y'))
            ->orderByDesc('ocorrencia.data_ocorrencia')
            ->get();
        return $query; 
    }

    function mostrar_advertencias(){ //função que lista todas as advertências
        $query = DB::table('advertencia')
        ->join('tipo_ocorrencia_advertencia', 'tipo_ocorrencia_advertencia.id', '=', 'advertencia.tipo_ocorrencia_advertencia')
        ->join('ocorrencia','ocorrencia.id','=','advertencia.ocorrencia_id')
        ->join('matricula','matricula.id','=','ocorrencia.participante_id')
        ->join('inscricao','matricula.inscricao_id', '=', 'inscricao.id')
        ->join('dados_inscricao','dados_inscricao.id','=','inscricao.dados_inscricao_id')
        ->join('pessoas','pessoas.id','=','dados_inscricao.dados_pessoais_id')
        ->select('*','advertencia.id as advertencia_id','ocorrencia.id as ocorrencia_id','tipo_ocorrencia_advertencia.nome as status','pessoas.nome as nome_colaborador')
        ->whereYear('advertencia.data_advertencia', '=', date('Y'))
        ->where('advertencia.tipo_ocorrencia_advertencia','<>','4')
        ->orderByDesc('advertencia.data_advertencia')
        ->get();

        return $query;

    }
    function mostrar_advertencias_social(){ //função que lista todas as advertências DO SOCIAL
        $query = DB::table('advertencia')
        ->join('tipo_ocorrencia_advertencia', 'tipo_ocorrencia_advertencia.id', '=', 'advertencia.tipo_ocorrencia_advertencia')
        ->join('ocorrencia','ocorrencia.id','=','advertencia.ocorrencia_id')
        ->join('matricula','matricula.id','=','ocorrencia.participante_id')
        ->join('inscricao','matricula.inscricao_id', '=', 'inscricao.id')
        ->join('dados_inscricao','dados_inscricao.id','=','inscricao.dados_inscricao_id')
        ->join('pessoas','pessoas.id','=','dados_inscricao.dados_pessoais_id')
        ->select('*','advertencia.id as advertencia_id','ocorrencia.id as ocorrencia_id','tipo_ocorrencia_advertencia.nome as status','pessoas.nome as nome_colaborador')
        ->whereYear('advertencia.data_advertencia', '=', date('Y'))
        ->orderByDesc('advertencia.data_advertencia')
        ->get();

        return $query;

    }

    function listar_ocorrencias(){ //função que lista todas as ocorrencias na selection de advertencia
        $query = DB::table('advertencia')
        ->rightJoin('ocorrencia','advertencia.ocorrencia_id','=','ocorrencia.id')
        ->join('matricula','matricula.id','=','ocorrencia.participante_id')
        ->join('inscricao','matricula.inscricao_id', '=', 'inscricao.id')
        ->join('dados_inscricao','dados_inscricao.id','=','inscricao.dados_inscricao_id')
        ->join('colaborador', 'ocorrencia.colaborador_id', '=', 'colaborador.id')
        ->join('tipo_ocorrencia_advertencia', 'tipo_ocorrencia_advertencia.id', '=', 'ocorrencia.tipo_ocorrencia_advertencia')
        ->join('users','users.id','=','colaborador.user_id')
        ->join('pessoas','pessoas.id','=','dados_inscricao.dados_pessoais_id') 
        ->select('*','advertencia.id as advertencia','ocorrencia.id as ocorrencia_id','tipo_ocorrencia_advertencia.nome as status','pessoas.nome as nome_colaborador')
        ->whereYear('ocorrencia.data_ocorrencia',date('Y'))
        ->whereNull('advertencia.id')
        ->orderByDesc('ocorrencia.data_ocorrencia')
        ->get();
        return $query; 
    }

    function getColumn(){
        $table = DB::select('DESCRIBE users');
        return $table;
    }

   
   function buscar_turma_colaborador($id) //buscar a turma que o colaborador ministra as aulas
    {
        $query = DB::table('nome_turma')
        ->join('turma','nome_turma.id','=','turma.nome_turma_id')
        ->join('turma_disciplina','turma_disciplina.turma_id','=','turma.id')
        ->select(DB::raw('turma_disciplina.turma_id as td, turma_id, nome_turma'))
        ->groupBy('turma_id')
        ->join('disciplina','disciplina.id','=','turma_disciplina.disciplina_id') 
        ->where('disciplina.colaborador_id','=',$id)
        ->where('turma.ano', '=', date('Y'))
        ->get();

        return $query;
    }