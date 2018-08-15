<?php

use App\Relatorio;
use Illuminate\Database\Seeder;

class ReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #1
        $report                     = new Relatorio();
        $report->nome               = 'Participantes do Evento';
        $report->tabela             = 'eventos';
        
        $report->save();

        #2
        $report                     = new Relatorio();
        $report->nome               = 'Eventos e Períodos';
        $report->tabela             = 'eventos';
        
        $report->save();

        #3
        $report                     = new Relatorio();
        $report->nome               = 'Participante';
        $report->tabela             = 'inscricao';
        
        $report->save();
        
        #4
        $report                     = new Relatorio();
        $report->nome               = 'Colaborador';
        $report->tabela             = 'colaborador';
        
        $report->save();

        #5
        $report                     = new Relatorio();
        $report->nome               = 'Frequência';
        $report->tabela             = 'frequencia';
        
        $report->save();
    }
}
