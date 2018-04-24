<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regular = new Status();
        $regular -> status = 'Regular';
        $regular -> save();

        $irregular = new Status();
        $irregular -> status = 'Irregular';
        $irregular -> save();

        $afastado = new Status();
        $afastado -> status = 'Afastado';
        $afastado -> save();

        $egresso = new Status();
        $egresso -> status = 'Egresso';
        $egresso -> save();

        $outro = new Status();
        $outro -> status = 'Outro';
        $outro -> save();
    }
}
