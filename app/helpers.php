<?php

    function buscar_matricula_pessoa($status)
    {
        $query = DB::table('matricula')
            ->join('turma', 'turma.id', '=', 'matricula.turma_id')
            ->join('nome_turma', 'nome_turma.id', '=', 'turma.nome_turma_id')
            ->join('inscricao', 'inscricao.id', '=', 'matricula.inscricao_id')
            ->join('dados_inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
            ->join('pessoa', 'pessoa.id', '=', 'dados_inscricao.dados_pessoais_id')
            ->join('status_matricula', 'status_matricula.id', '=', 'matricula.status_matricula_id')
            ->select('matricula.id', 'pessoa.nome', 'nome_turma.nome_turma')
            ->where('status_matricula.status', '=', $status)
            ->get();
        return $query;
    }

    function buscar_escola()
    {
        $query = DB::table('escola')
            ->join('Endereco', 'Endereco.id', '=', 'escola.Endereco_id')
            ->join('contato', 'contato.id', '=', 'escola.contato_id')
            ->get();
        
        return $query; 
    }

    function busca_turma()
    {
        $query = DB::table('nome_turma')
            ->join('turma', 'nome_turma.id', '=', 'turma.nome_turma_id')
            ->select('nome_turma.nome_turma', 'turma.id', 'turma.ano', 'turma.turno')
            ->get();
        //$query = json_encode($query); para funcionar com o php puro que o alan fez. do Laravel é assim. tava faltando campos no select tbm
        $query = json_decode($query);
        return $query;
    }

    function busca_inscricao()
    {
        $query = DB::table('pessoa')
            ->join('dados_inscricao', 'pessoa.id', '=', 'dados_inscricao.dados_pessoais_id')
            ->join('inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
            ->select('pessoa.nome', 'inscricao.id')
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
        $query = DB::table('pessoa')->where('id', '=', $id)->get();
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
        $query = DB::table('pessoa')->where('nome', '=', $nome)->get();
        return $query;
    }
    function busca_pessoa3($id)
    {
        $query = DB::table('pessoa')->where('id', '>', $id)->get();
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
        $query = DB::table('pessoa')
            ->join('dados_inscricao', 'pessoa.id', '=', 'dados_inscricao.dados_pessoais_id')
            ->join('inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
            ->join('matricula', 'inscricao.id', '=', 'matricula.inscricao_id')
            ->join('turma', 'turma.id', '=', 'matricula.turma_id')
            ->join('nome_turma', 'nome_turma.id', '=', 'turma.nome_turma_id')
            ->select('pessoa.nome', 'inscricao.id')
            ->get();
        return $query;
    }
    function home(){
           $query = DB::table('pessoa')
        ->join('dados_inscricao', 'pessoa.id', '=', 'dados_inscricao.dados_pessoais_id')
        ->join('inscricao', 'dados_inscricao.id', '=', 'inscricao.dados_inscricao_id')
        ->select(DB::raw('inscricao.data_avaliacao, pessoa.nome, inscricao.id, pessoa.cpf, DATEDIFF(inscricao.data_avaliacao, CURDATE()) AS Dias'))  
        ->orderBy('Dias')
        ->get();
        return $query;
    }




    //'nome_turma.*', 