<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = new Role();
        $administrador->name         = 'administrador';
        $administrador->display_name = 'Administrador'; // optional
        $administrador->description  = 'Administrador do projeto'; // optional
        $administrador->save();

        $diretor = new Role();
        $diretor->name         = 'diretor';
        $diretor->display_name = 'Diretor'; // optional
        $diretor->description  = 'Diretor do moínho'; // optional
        $diretor->save();

        $coordenador = new Role();
        $coordenador->name = 'coordenador';
        $coordenador->display_name = 'Coordenador';
        $coordenador->description = 'Coordenador do Moínho';
        $coordenador->save();

        $social = new Role();
        $social->name = 'social';
        $social->display_name = 'Social';
        $social->decription = 'Social';
        $social->save();

        $colaborador = new Role();
        $colaborador->name = 'colaborador';
        $colaborador->display_name = 'Colaborador';
        $colaborador->decription = 'Colaborador';
        $colaborador->save();

        $apoio = new Role();
        $apoio->name = 'apoio';
        $apoio->display_name = 'Apoio';
        $apoio->decription = 'Apoio';
        $apoio->save();
    }
}
