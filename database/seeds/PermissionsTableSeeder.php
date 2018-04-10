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

        # Ver matricula
        $new_permission = new Permission();
        $new_permission -> name = 'ver-matricula-alunos';
        $new_permission -> display_name = 'Ver matricula de Alunos';
        $new_permission -> description = 'Permite ver a matricula de alunos';
        $new_permission -> save();

        # Criar matricula
        $new_permission = new Permission();
        $new_permission -> name = 'criar-matricula-alunos';
        $new_permission -> display_name = 'Criar matricula de Alunos';
        $new_permission -> description = 'Permite criar a matricula de alunos';
        $new_permission -> save();

        # Editar matricula
        $new_permission = new Permission();
        $new_permission -> name = 'editar-matricula-alunos';
        $new_permission -> display_name = 'Editar matricula de Alunos';
        $new_permission -> description = 'Permite editar a matricula de alunos';
        $new_permission -> save();



    }
}
