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

            #______________________--Date--_____________________#
            $tipo_date = Tipos::where('nome', '=', 'date') -> first();

            #______________________--Date Year--_____________________#
            $tipo_date_year = Tipos::where('tipo', '=', 'year') -> first();

            #______________________--Date Month--_____________________#
            $tipo_date_month = Tipos::where('tipo', '=', 'month') -> first();
            
            #______________________--Date day--_____________________#
            $tipo_date_day = Tipos::where('tipo', '=', 'day') -> first();
        
        #______________________--Relatório Evento--_____________________#
            #Colunas da tabela Evento
            #1
            $coluna = new Coluna;
            $coluna->coluna = 'nome';
            $coluna->nome = 'Nome do Evento';
            $coluna->tabela = 'eventos';
            $coluna->relatorio()->associate($relatorio_evento);
            $coluna->tipo()->associate($tipo_string);
            $coluna->save();

            #2
            $coluna = new Coluna;
            $coluna->coluna = 'descricao';
            $coluna->nome = 'Descrição do Evento';
            $coluna->tabela = 'eventos';
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
            #Colunas da tabela Colaborador
            #1
            $coluna = new Coluna;
            $coluna->coluna = 'area_atuacao';
            $coluna->nome = 'Aréa de Atuação';
            $coluna->tabela = 'colaborador';
            $coluna->relatorio()->associate($relatorio_colaborador);
            $coluna->tipo()->associate($tipo_string);
            $coluna->save();

            # continuar a colocar as outras colunas
    }
}
