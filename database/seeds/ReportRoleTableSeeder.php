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
            #______________________--Participantes do Evento--_____________________#
            $relatorio_participante_evento = Relatorio::where('nome', '=', 'Participantes do Evento') -> first();

            #______________________--Evento e Períodos--_____________________#
            $relatorio_evento_periodo = Relatorio::where('nome', '=', 'Eventos e Períodos') -> first();

            #______________________--Participante--_____________________#
            $relatorio_participante = Relatorio::where('nome', '=', 'Participante') -> first();

            #______________________--Colaborador--_____________________#
            $relatorio_colaborador = Relatorio::where('nome', '=', 'Colaborador') -> first();

            #______________________--Frequência--_____________________#
            $relatorio_frequencia = Relatorio::where('nome', '=', 'Frequência') -> first();


        # Atribuindo as permissões àos relatórios
            #______________________--Administrador--_____________________# 
            $role = Role::where('name', '=', 'administrador') -> first();

            #Inserindo o participante evento
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_participante_evento);
            $relatorio_role->save();

            #Inserindo o evento periodo
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_evento_periodo);
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

            #Inserindo o frequência
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_frequencia);
            $relatorio_role->save();

            #______________________--Diretor--_____________________# 
            $role = Role::where('name', '=', 'diretor') -> first();

            #Inserindo o participante evento
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_participante_evento);
            $relatorio_role->save();

            #Inserindo o evento periodo
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_evento_periodo);
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

            #Inserindo o frequência
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_frequencia);
            $relatorio_role->save();

            #______________________--Social--_____________________# 
            $role = Role::where('name', '=', 'social') -> first();

            #Inserindo o participante evento
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_participante_evento);
            $relatorio_role->save();

            #Inserindo o evento periodo
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_evento_periodo);
            $relatorio_role->save();

            #Inserindo o participante
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_participante);
            $relatorio_role->save();

            #Inserindo o frequência
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_frequencia);
            $relatorio_role->save();

            #______________________--Coordenador--_____________________# 
            $role = Role::where('name', '=', 'coordenador') -> first();

            #Inserindo o participante evento
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_participante_evento);
            $relatorio_role->save();

            #Inserindo o evento periodo
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_evento_periodo);
            $relatorio_role->save();

            #Inserindo o participante
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_participante);
            $relatorio_role->save();

            #Inserindo o frequência
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_frequencia);
            $relatorio_role->save();

            #______________________--Colaborador--_____________________# 
            $role = Role::where('name', '=', 'colaborador') -> first();

            #Inserindo o participante evento
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_participante_evento);
            $relatorio_role->save();

            #Inserindo o evento periodo
            $relatorio_role = new Relatorio_Role;
            $relatorio_role->role()->associate($role);
            $relatorio_role->relatorio()->associate($relatorio_evento_periodo);
            $relatorio_role->save();

    }
}
