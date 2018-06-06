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
        $report                     = new Relatorio();
        $report->nome               = 'Evento';
        $report->tabela             = 'eventos';
        $report->save();

        $report                     = new Relatorio();
        $report->nome               = 'Participante';
        $report->tabela             = 'inscricao';
        
        $report->save();
        
        $report                     = new Relatorio();
        $report->nome               = 'Colaborador';
        $report->tabela             = 'colaborador';
        
        $report->save();
    }
}
