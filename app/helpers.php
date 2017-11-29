<?php


   function busca_turma()
    {
        $query = DB::table('nome_turma')
            ->join('turma', 'nome_turma.id', '=', 'turma.nome_turma_int')
            ->select('nome_turma.nome', 'turma.id', 'turma.turno')
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

    function busca_nome()
    {
        $query = DB::table('nome_turma')
            ->join('turma', 'nome_turma.id', '=', 'turma.nome_turma_int')
            ->select('nome_turma.nome', 'turma.id', 'turma.turno')
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

    //'nome_turma.*', 