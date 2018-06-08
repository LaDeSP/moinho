<?php

use App\Relatorio_Role;
use App\Relatorio;
use App\Role;
use Illuminate\Database\Seeder;

class ReportRoleTableSeeder extends Seeder
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


        # Atribuindo as permissões àos relatórios
            #______________________--Administrador--_____________________# 
            $role = Role::where('name', '=', 'administrador') -> first();

            #Inserindo o evento
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_evento);
            $relatorio_role->save();

            #Inserindo o participante
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_participante);
            $relatorio_role->save();

            #Inserindo o colaborador
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_colaborador);
            $relatorio_role->save();

    }
}
