<?php

use App\Juntar;
use App\Relatorio;
use Illuminate\Database\Seeder;

class JoinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Buscando os Relatórios
            #______________________--Evento--_____________________#
            $relatorio_evento = Relatorio::where('nome', '=', 'Evento') -> first();

            #______________________--Participante--_____________________#
            $relatorio_participante = Relatorio::where('nome', '=', 'Participante') -> first();

            #______________________--Colaborador--_____________________#
            $relatorio_colaborador = Relatorio::where('nome', '=', 'Colaborador') -> first();

        #______________________--Relatório Evento--_____________________#
            #Inner join Pessoa_evento
                $join                     = new Juntar();
                $join->tabela1            = 'pessoa_evento';
                $join->tabela2            = 'eventos';
                $join->coluna1            = 'evento_id';
                $join->coluna2            = 'id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_evento);
                $join->save();

            #Inner join Pessoas
                $join                     = new Juntar();
                $join->tabela1            = 'pessoa_evento';
                $join->tabela2            = 'pessoas';
                $join->coluna1            = 'pessoa_id';
                $join->coluna2            = 'id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_evento);
                $join->save();
            
            #Inner join Evento_situacao
                $join                     = new Juntar();
                $join->tabela1            = 'evento_situacao';
                $join->tabela2            = 'eventos';
                $join->coluna1            = 'evento_id';
                $join->coluna2            = 'id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_evento);
                $join->save();

            #Inner join Situação
                $join                     = new Juntar();
                $join->tabela1            = 'evento_situacao';
                $join->tabela2            = 'situacoes';
                $join->coluna1            = 'situacao_id';
                $join->coluna2            = 'id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_evento);
                $join->save();
    }
}
