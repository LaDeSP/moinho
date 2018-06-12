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
            #______________________--Evento--_____________________#
            $relatorio_evento = Relatorio::where('nome', '=', 'Evento') -> first();

            #______________________--Participante--_____________________#
            $relatorio_participante = Relatorio::where('nome', '=', 'Participante') -> first();

            #______________________--Colaborador--_____________________#
            $relatorio_colaborador = Relatorio::where('nome', '=', 'Colaborador') -> first();
        
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
        
        #______________________--Relatório Evento--_____________________#
            #Pessoas
                #1
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Nome do Colaborador';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #2
                $coluna = new Coluna;
                $coluna->coluna = 'cpf';
                $coluna->nome = 'CPF do Colaborador';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #3
                $coluna = new Coluna;
                $coluna->coluna = 'data_nascimento';
                $coluna->nome = 'Data de Nascimento do Colaborador';
                $coluna->tabela = 'pessoas';
                $coluna->relatorio()->associate($relatorio_evento);
                $coluna->tipo()->associate($tipo_date);
                $coluna->save();

            #Colunas da tabela Evento
                #4
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Nome do Evento';
                $coluna->tabela = 'eventos';
                $coluna->relatorio()->associate($relatorio_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                #5
                $coluna = new Coluna;
                $coluna->coluna = 'descricao';
                $coluna->nome = 'Descrição do Evento';
                $coluna->tabela = 'eventos';
                $coluna->relatorio()->associate($relatorio_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

            #Situacoes
                #6
                $coluna = new Coluna;
                $coluna->coluna = 'nome';
                $coluna->nome = 'Sitiação do Evento';
                $coluna->tabela = 'situacoes';
                $coluna->relatorio()->associate($relatorio_evento);
                $coluna->tipo()->associate($tipo_string);
                $coluna->save();

                # continuar a colocar as outras colunas

        #______________________--Relatório Participante--_____________________#
            #Colunas da tabela Inscrição
            #1
            $coluna = new Coluna;
            $coluna->coluna = 'data_inscricao';
            $coluna->nome = 'Data da Inscrição';
            $coluna->tabela = 'inscricao';
            $coluna->relatorio()->associate($relatorio_participante);
            $coluna->tipo()->associate($tipo_date);
            $coluna->save();

            # continuar a colocar as outras colunas

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
    }
}
