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
            #______________________--Participantes do Evento--_____________________#
            $relatorio_participante_evento = Relatorio::where('nome', '=', 'Participantes do Evento') -> first();

            #______________________--Evento e Períodos--_____________________#
            $relatorio_evento_periodo = Relatorio::where('nome', '=', 'Eventos e Períodos') -> first();

            #______________________--Participante--_____________________#
            $relatorio_participante = Relatorio::where('nome', '=', 'Participante') -> first();

            #______________________--Colaborador--_____________________#
            $relatorio_colaborador = Relatorio::where('nome', '=', 'Colaborador') -> first();

        #______________________--Relatório Participante Evento--_____________________#
            #Inner join Pessoa_evento
                $join                     = new Juntar();
                $join->tabela1            = 'pessoa_evento';
                $join->tabela2            = 'eventos';
                $join->coluna1            = 'evento_id';
                $join->coluna2            = 'id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_participante_evento);
                $join->save();

            #Inner join Pessoas
                $join                     = new Juntar();
                $join->tabela1            = 'pessoas';
                $join->tabela2            = 'pessoa_evento';
                $join->coluna1            = 'id';
                $join->coluna2            = 'pessoa_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_participante_evento);
                $join->save();
            
            #Inner join Evento_situacao
                $join                     = new Juntar();
                $join->tabela1            = 'evento_situacao';
                $join->tabela2            = 'eventos';
                $join->coluna1            = 'evento_id';
                $join->coluna2            = 'id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_participante_evento);
                $join->save();

            #Inner join Situação
                $join                     = new Juntar();
                $join->tabela1            = 'situacoes';
                $join->tabela2            = 'evento_situacao';
                $join->coluna1            = 'id';
                $join->coluna2            = 'situacao_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_participante_evento);
                $join->save();

        #______________________--Relatório Evento Periodo--_____________________#
            #Inner join Periodo_Evento
                $join                     = new Juntar();
                $join->tabela1            = 'periodo_evento';
                $join->tabela2            = 'eventos';
                $join->coluna1            = 'evento_id';
                $join->coluna2            = 'id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_evento_periodo);
                $join->save();

            #Inner join Periodo_Evento
                $join                     = new Juntar();
                $join->tabela1            = 'periodos';
                $join->tabela2            = 'periodo_evento';
                $join->coluna1            = 'id';
                $join->coluna2            = 'periodo_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_evento_periodo);
                $join->save();

            #Inner join Evento_situacao
                $join                     = new Juntar();
                $join->tabela1            = 'evento_situacao';
                $join->tabela2            = 'eventos';
                $join->coluna1            = 'evento_id';
                $join->coluna2            = 'id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_evento_periodo);
                $join->save();

            #Inner join Situação
                $join                     = new Juntar();
                $join->tabela1            = 'situacoes';
                $join->tabela2            = 'evento_situacao';
                $join->coluna1            = 'id';
                $join->coluna2            = 'situacao_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_evento_periodo);
                $join->save();

        #______________________--Relatório Colaborador--_____________________#
            #Inner join Pessoa
                $join                     = new Juntar();
                $join->tabela1            = 'pessoas';
                $join->tabela2            = 'colaborador';
                $join->coluna1            = 'id';
                $join->coluna2            = 'pessoa_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_colaborador);
                $join->save();

            #Inner join Endereco
                $join                     = new Juntar();
                $join->tabela1            = 'enderecos';
                $join->tabela2            = 'pessoas';
                $join->coluna1            = 'id';
                $join->coluna2            = 'endereco_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_colaborador);
                $join->save();

            #Inner join Contato
                $join                     = new Juntar();
                $join->tabela1            = 'contatos';
                $join->tabela2            = 'pessoas';
                $join->coluna1            = 'id';
                $join->coluna2            = 'contato_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_colaborador);
                $join->save();
        #______________________--Relatório Participante--_____________________#
            #Inner join Dados Inscrição
                $join                     = new Juntar();
                $join->tabela1            = 'dados_inscricao';
                $join->tabela2            = 'inscricao';
                $join->coluna1            = 'id';
                $join->coluna2            = 'dados_inscricao_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_participante);
                $join->save();
            
            #Inner join Dados Pessoais
                $join                     = new Juntar();
                $join->tabela1            = 'pessoas';
                $join->tabela2            = 'dados_inscricao';
                $join->coluna1            = 'id';
                $join->coluna2            = 'dados_pessoais_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_participante);
                $join->save();

            #Inner join Escola
                $join                     = new Juntar();
                $join->tabela1            = 'escolas';
                $join->tabela2            = 'dados_inscricao';
                $join->coluna1            = 'id';
                $join->coluna2            = 'escola_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_participante);
                $join->save();
            
            #Inner join Endereco
                $join                     = new Juntar();
                $join->tabela1            = 'enderecos';
                $join->tabela2            = 'pessoas';
                $join->coluna1            = 'id';
                $join->coluna2            = 'endereco_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_participante);
                $join->save();

            #Inner join Contato
                $join                     = new Juntar();
                $join->tabela1            = 'contatos';
                $join->tabela2            = 'pessoas';
                $join->coluna1            = 'id';
                $join->coluna2            = 'contato_id';
                $join->condicao           = '=';

                #Associar a query
                $join->relatorio()->associate($relatorio_participante);
                $join->save();
    }
}
