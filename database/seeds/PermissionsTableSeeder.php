<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Ver alunos
        $new_permission = new Permission();
        $new_permission -> name = 'ver-lista-alunos';
        $new_permission -> display_name = 'Ver Lista de Alunos';
        $new_permission -> description = 'Permite ver a lista de alunos';
        $new_permission -> save();
        
        # Ver presença
        $new_permission = new Permission();
        $new_permission -> name = 'ver-presenca-alunos';
        $new_permission -> display_name = 'Ver Presença de Alunos';
        $new_permission -> description = 'Permite ver a presença de alunos';
        $new_permission -> save();



    }
}
