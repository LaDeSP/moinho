<?php

use Illuminate\Database\Seeder;
use App\statusOcorrenciaAdvertencia;

class Ocr_Advr_Type extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new statusOcorrenciaAdvertencia;
        $tipo->nome = 'Leve';
        $tipo->save();
        
        $tipo = new statusOcorrenciaAdvertencia;
        $tipo->nome = 'Moderado';
        $tipo->save();

        $tipo = new statusOcorrenciaAdvertencia;
        $tipo->nome = 'Grave';
        $tipo->save();

        $tipo = new statusOcorrenciaAdvertencia;
        $tipo->nome = 'Abuso';
        $tipo->save();
    }
}
