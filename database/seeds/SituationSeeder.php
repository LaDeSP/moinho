<?php

use Illuminate\Database\Seeder;
use Situacao;

class SituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $situacao = new Situacao;
        $situacao->nome = 'Agendado';
        $situacao->save();

        $situacao = new Situacao;
        $situacao->nome = 'Realizado';
        $situacao->save();

        $situacao = new Situacao;
        $situacao->nome = 'Cancelado';
        $situacao->save();
    }
}
