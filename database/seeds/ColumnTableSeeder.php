<?php

use App\Coluna;
use App\Relatorio;
use App\Tipos;
use Illuminate\Database\Seeder;

class ColumnTableSeeder extends Seeder
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

            #______________________--Frequência--_____________________#
            $relatorio_frequencia = Relatorio::where('nome', '=', 'Frequência') -> first();
        
        # Buscando os Tipos de Relatórios
            #______________________--String--_____________________#
            $tipo_string = Tipos::where('nome', '=', 'string') -> first();

            #______________________--Double--_____________________#
            $tipo_double = Tipos::where('nome', '=', 'double') -> first();

            #______________________--Tinyint--_____________________#
            $tipo_tinyint = Tipos::where('nome', '=', 'tinyint') -> first();
            
            #______________________--Int--_____________________#
            $tipo_int = Tipos::where('nome', '=', 'int') -> first();

            #______________________--Date--_____________________#
            $tipo_date = Tipos::where('nome', '=', 'date') -> first();
        
        #______________________--Relatório Participante Evento --_____________________#
            #Pessoas
                #1
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Nome do Colaborador';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_participante_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #2
                $coluna = new Coluna;
                $coluna->coluna = 'cpf';
                $coluna->nome = 'CPF do Colaborador';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_participante_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #3
                $coluna = new Coluna;
                $coluna->coluna = 'data_nascimento';
                $coluna->nome = 'Data de Nascimento do Colaborador';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_participante_evento);
                $coluna->tipo()->associate($tipo_date);
                $coluna->save();

            #Colunas da tabela Evento
                #4
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Nome do Evento';
                $coluna->tabela = 'eventos';
                $coluna->relatorio()->associate($relatorio_participante_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #5
                $coluna = new Coluna;
                $coluna->coluna = 'descricao';
                $coluna->nome = 'Descrição do Evento';
                $coluna->tabela = 'eventos';
                $coluna->relatorio()->associate($relatorio_participante_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

            #Situacoes
                #6
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Situação do Evento';
                $coluna->tabela = 'situacoes';
                $coluna->relatorio()->associate($relatorio_participante_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();
            
            #Evento Situação
                #7
                $coluna = new Coluna;
                $coluna->coluna = 'observacao';
                $coluna->nome = 'Observações do Evento';
                $coluna->tabela = 'evento_situacao';
                $coluna->relatorio()->associate($relatorio_participante_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                # verificar se há mais colunas para colocar

        #______________________--Relatório Evento Periodos--_____________________#
            #Colunas da tabela Evento
                #1
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Nome do Evento';
                $coluna->tabela = 'eventos';
                $coluna->relatorio()->associate($relatorio_evento_periodo);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #2
                $coluna = new Coluna;
                $coluna->coluna = 'descricao';
                $coluna->nome = 'Descrição do Evento';
                $coluna->tabela = 'eventos';
                $coluna->relatorio()->associate($relatorio_evento_periodo);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

            #Situacoes
                #3
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Situação do Evento';
                $coluna->tabela = 'situacoes';
                $coluna->relatorio()->associate($relatorio_evento_periodo);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();
            
            #Periodos
                #4
                $coluna = new Coluna;
                $coluna->coluna = 'inicio';
                $coluna->nome = 'Início do Período';
                $coluna->tabela = 'periodos';
                $coluna->relatorio()->associate($relatorio_evento_periodo);
                $coluna->tipo()->associate($tipo_date);
                $coluna->save();

                #5
                $coluna = new Coluna;
                $coluna->coluna = 'fim';
                $coluna->nome = 'Fim do Período';
                $coluna->tabela = 'periodos';
                $coluna->relatorio()->associate($relatorio_evento_periodo);
                $coluna->tipo()->associate($tipo_date);
                $coluna->save();
            
            #Evento Situação
                #6
                $coluna = new Coluna;
                $coluna->coluna = 'observacao';
                $coluna->nome = 'Observação sobre o Evento';
                $coluna->tabela = 'evento_situacao';
                $coluna->relatorio()->associate($relatorio_evento_periodo);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

            # verificar se há mais colunas para colocar

        #______________________--Relatório Participante--_____________________#
            #Pessoa
                #1
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Nome do Participante';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #2
                $coluna = new Coluna;
                $coluna->coluna = 'cpf';
                $coluna->nome = 'CPF do Participante';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #3
                $coluna = new Coluna;
                $coluna->coluna = 'data_nascimento';
                $coluna->nome = 'Data de Nascimento do Participante';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_date);
                $coluna->save();

            #Inscrição
                #1
                $coluna = new Coluna;
                $coluna->coluna = 'data_inscricao';
                $coluna->nome = 'Data da Inscrição';
                $coluna->tabela = 'inscricao';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_date);
                $coluna->save();

                #2
                $coluna = new Coluna;
                $coluna->coluna = 'data_avaliacao';
                $coluna->nome = 'Data da Avaliação';
                $coluna->tabela = 'inscricao';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_date);
                $coluna->save();
            
            #Dados Inscrição
                #3
                $coluna = new Coluna;
                $coluna->coluna = 'turma';
                $coluna->nome = 'Turma';
                $coluna->tabela = 'dados_inscricao';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #4
                $coluna = new Coluna;
                $coluna->coluna = 'turno';
                $coluna->nome = 'Turno';
                $coluna->tabela = 'dados_inscricao';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #5
                $coluna = new Coluna;
                $coluna->coluna = 'transporte';
                $coluna->nome = 'Transporte';
                $coluna->tabela = 'dados_inscricao';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #6
                $coluna = new Coluna;
                $coluna->coluna = 'raca';
                $coluna->nome = 'Raça';
                $coluna->tabela = 'dados_inscricao';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #7
                $coluna = new Coluna;
                $coluna->coluna = 'renda';
                $coluna->nome = 'Renda';
                $coluna->tabela = 'dados_inscricao';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_double);
                $coluna->save();

                #8
                $coluna = new Coluna;
                $coluna->coluna = 'qtd_residencia';
                $coluna->nome = 'Quantidade de residências';
                $coluna->tabela = 'dados_inscricao';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_double);
                $coluna->save();

                #9
                $coluna = new Coluna;
                $coluna->coluna = 'beneficio_social';
                $coluna->nome = 'Beneficio Social';
                $coluna->tabela = 'dados_inscricao';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #10
                $coluna = new Coluna;
                $coluna->coluna = 'serie';
                $coluna->nome = 'Série';
                $coluna->tabela = 'dados_inscricao';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

            #Endereços
                #6
                $coluna = new Coluna;
                $coluna->coluna = 'rua';
                $coluna->nome = 'Endereço Rua';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #7
                $coluna = new Coluna;
                $coluna->coluna = 'bairro';
                $coluna->nome = 'Endereço Bairro';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #8
                $coluna = new Coluna;
                $coluna->coluna = 'numero';
                $coluna->nome = 'Endereço Número';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #9
                $coluna = new Coluna;
                $coluna->coluna = 'complemento';
                $coluna->nome = 'Endereço Complemento';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #10
                $coluna = new Coluna;
                $coluna->coluna = 'cep';
                $coluna->nome = 'Endereço CEP';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #11
                $coluna = new Coluna;
                $coluna->coluna = 'cidade';
                $coluna->nome = 'Endereço Cidade';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #12
                $coluna = new Coluna;
                $coluna->coluna = 'estado';
                $coluna->nome = 'Endereço Estado';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #13
                $coluna = new Coluna;
                $coluna->coluna = 'pais';
                $coluna->nome = 'Endereço País';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

            #Contatos
                #14
                $coluna = new Coluna;
                $coluna->coluna = 'numero_fixo';
                $coluna->nome = 'Contato Telefone';
                $coluna->tabela = 'contatos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #15
                $coluna = new Coluna;
                $coluna->coluna = 'celular1';
                $coluna->nome = 'Contato Celular 1';
                $coluna->tabela = 'contatos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #16
                $coluna = new Coluna;
                $coluna->coluna = 'celular2';
                $coluna->nome = 'Contato Celular 2';
                $coluna->tabela = 'contatos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #17
                $coluna = new Coluna;
                $coluna->coluna = 'email';
                $coluna->nome = 'Contato Email';
                $coluna->tabela = 'contatos';
                $coluna->relatorio()->associate($relatorio_participante);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();
            
            
            #Arrumar a numeração depois
            #continuar a colocar as outras colunas

        #______________________--Relatório Colaborador--_____________________#
            #Colaborador
                #1
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Nome do Colaborador';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #2
                $coluna = new Coluna;
                $coluna->coluna = 'ano_ingreco';
                $coluna->nome = 'Ano de Ingresso';
                $coluna->tabela = 'colaborador';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_int);
                $coluna->save();

                #3
                $coluna = new Coluna;
                $coluna->coluna = 'area_atuacao';
                $coluna->nome = 'Aréa de Atuação';
                $coluna->tabela = 'colaborador';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

            #Pessoas
                #4
                $coluna = new Coluna;
                $coluna->coluna = 'cpf';
                $coluna->nome = 'CPF do Colaborador';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #5
                $coluna = new Coluna;
                $coluna->coluna = 'data_nascimento';
                $coluna->nome = 'Data de Nascimento do Colaborador';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_date);
                $coluna->save();

            #Endereços
                #6
                $coluna = new Coluna;
                $coluna->coluna = 'rua';
                $coluna->nome = 'Endereço Rua';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #7
                $coluna = new Coluna;
                $coluna->coluna = 'bairro';
                $coluna->nome = 'Endereço Bairro';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #8
                $coluna = new Coluna;
                $coluna->coluna = 'numero';
                $coluna->nome = 'Endereço Número';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #9
                $coluna = new Coluna;
                $coluna->coluna = 'complemento';
                $coluna->nome = 'Endereço Complemento';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #10
                $coluna = new Coluna;
                $coluna->coluna = 'cep';
                $coluna->nome = 'Endereço CEP';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #11
                $coluna = new Coluna;
                $coluna->coluna = 'cidade';
                $coluna->nome = 'Endereço Cidade';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #12
                $coluna = new Coluna;
                $coluna->coluna = 'estado';
                $coluna->nome = 'Endereço Estado';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #13
                $coluna = new Coluna;
                $coluna->coluna = 'pais';
                $coluna->nome = 'Endereço País';
                $coluna->tabela = 'enderecos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

            #Contatos
                #14
                $coluna = new Coluna;
                $coluna->coluna = 'numero_fixo';
                $coluna->nome = 'Contato Telefone';
                $coluna->tabela = 'contatos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #15
                $coluna = new Coluna;
                $coluna->coluna = 'celular1';
                $coluna->nome = 'Contato Celular 1';
                $coluna->tabela = 'contatos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #16
                $coluna = new Coluna;
                $coluna->coluna = 'celular2';
                $coluna->nome = 'Contato Celular 2';
                $coluna->tabela = 'contatos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #17
                $coluna = new Coluna;
                $coluna->coluna = 'email';
                $coluna->nome = 'Contato Email';
                $coluna->tabela = 'contatos';
                $coluna->relatorio()->associate($relatorio_colaborador);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                # continuar a colocar as outras colunas
        #______________________--Relatório Colaborador--_____________________#
            # Participante
                #1
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Nome do Particpante';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_frequencia);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #2
                $coluna = new Coluna;
                $coluna->coluna = 'cpf';
                $coluna->nome = 'CPF do Participante';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_frequencia);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #3
                $coluna = new Coluna;
                $coluna->coluna = 'data_nascimento';
                $coluna->nome = 'Data de Nascimento do Participante';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_frequencia);
                $coluna->tipo()->associate($tipo_date);
                $coluna->save();

            # Frequência
                #1
                $coluna = new Coluna;
                $coluna->coluna = 'presenca';
                $coluna->nome = 'Presença';
                $coluna->tabela = 'frequencia';
                $coluna->relatorio()->associate($relatorio_frequencia);
                $coluna->tipo()->associate($tipo_tinyint);
                $coluna->save();

                #2
                $coluna = new Coluna;
                $coluna->coluna = 'data';
                $coluna->nome = 'Data';
                $coluna->tabela = 'frequencia';
                $coluna->relatorio()->associate($relatorio_frequencia);
                $coluna->tipo()->associate($tipo_date);
                $coluna->save();

                #3
                $coluna = new Coluna;
                $coluna->coluna = 'justificativa';
                $coluna->nome = 'Justificativa';
                $coluna->tabela = 'frequencia';
                $coluna->relatorio()->associate($relatorio_frequencia);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

            # Disciplina
                #1
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Nome da Disciplina';
                $coluna->tabela = 'disciplina';
                $coluna->relatorio()->associate($relatorio_frequencia);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #2
                $coluna = new Coluna;
                $coluna->coluna = 'turno';
                $coluna->nome = 'Turno da Disciplina';
                $coluna->tabela = 'disciplina';
                $coluna->relatorio()->associate($relatorio_frequencia);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #3
                $coluna = new Coluna;
                $coluna->coluna = 'sala_aula';
                $coluna->nome = 'Sala de Aula';
                $coluna->tabela = 'disciplina';
                $coluna->relatorio()->associate($relatorio_frequencia);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();
            
            # Turma
                #1
                $coluna = new Coluna;
                $coluna->coluna = 'nome_turma';
                $coluna->nome = 'Turma';
                $coluna->tabela = 'nome_turma';
                $coluna->relatorio()->associate($relatorio_frequencia);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();
    }
}
