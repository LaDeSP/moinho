<?php

use Illuminate\Database\Seeder;
use App\StatusMatricula;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regular = new StatusMatricula();
        $regular -> status = 'Regular';
        $regular -> save();

        $irregular = new StatusMatricula();
        $irregular -> status = 'Irregular';
        $irregular -> save();

        $afastado = new StatusMatricula();
        $afastado -> status = 'Afastado';
        $afastado -> save();

        $egresso = new StatusMatricula();
        $egresso -> status = 'Egresso';
        $egresso -> save();

        $outro = new StatusMatricula();
        $outro -> status = 'Outro';
        $outro -> save();
    }
}
