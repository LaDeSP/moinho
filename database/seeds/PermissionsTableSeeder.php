<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        #'''Criando as permissões necessárias'''

        #______________________--TURMAS--_____________________#
        $ver_turma = new Permission();
        $ver_turma -> name = 'ver-turma';
        $ver_turma -> display_name = 'Ver turma';
        $ver_turma -> description = 'Permite ver as turmas';
        $ver_turma -> save();

        #______________________--DISCIPLINA--_____________________#
        $ver_disciplina = new Permission();
        $ver_disciplina -> name = 'ver-disciplina';
        $ver_disciplina -> display_name = 'Ver disciplina';
        $ver_disciplina -> description = 'Permite ver as disciplinas';
        $ver_disciplina -> save();

        #______________________--PARTICIPANTE--_____________________#
        $ver_participante = new Permission();
        $ver_participante -> name = 'ver-participante';
        $ver_participante -> display_name = 'Ver participante';
        $ver_participante -> description = 'Permite ver os participantes';
        $ver_participante -> save();

        #______________________--INSCRIÇÃO--_____________________#
        $ver_inscricao = new Permission();
        $ver_inscricao -> name = 'ver-inscricao';
        $ver_inscricao -> display_name = 'Ver inscrição';
        $ver_inscricao -> description = 'Permite ver as inscrições';
        $ver_inscricao -> save();

        $criar_inscricao = new Permission();
        $criar_inscricao -> name = 'criar-inscricao';
        $criar_inscricao -> display_name = 'criar inscrição';
        $criar_inscricao -> description = 'Permite criar inscrições';
        $criar_inscricao -> save();

        #______________________--COLABORADOR--_____________________#
        $ver_colaborador = new Permission();
        $ver_colaborador -> name = 'ver-colaborador';
        $ver_colaborador -> display_name = 'Ver colaborador';
        $ver_colaborador -> description = 'Permite ver os colaboradores';
        $ver_colaborador -> save();

        $criar_colaborador = new Permission();
        $criar_colaborador -> name = 'criar-colaborador';
        $criar_colaborador -> display_name = 'criar colaborador';
        $criar_colaborador -> description = 'Permite criar os colaboradores';
        $criar_colaborador -> save();

        $excluir_colaborador = new Permission();
        $excluir_colaborador -> name = 'excluir_colaborador';
        $excluir_colaborador -> display_name = 'excluir colaborador';
        $excluir_colaborador -> description = 'Permite excluir os colaboradores';
        $excluir_colaborador -> save();

        #______________________--ESCOLA--_____________________#
        $ver_escola = new Permission();
        $ver_escola -> name = 'ver-escola';
        $ver_escola -> display_name = 'Ver escola';
        $ver_escola -> description = 'Permite ver as escolas';
        $ver_escola -> save();

        #_______________________--MATRICULAS--_______________________#
        $ver_matricula = new Permission();
        $ver_matricula -> name = 'ver-matricula';
        $ver_matricula -> display_name = 'Ver matricula de Alunos';
        $ver_matricula -> description = 'Permite ver a matricula de alunos';
        $ver_matricula -> save();

        $criar_matricula = new Permission();
        $criar_matricula -> name = 'criar-matricula';
        $criar_matricula -> display_name = 'Criar matricula de Alunos';
        $criar_matricula -> description = 'Permite criar a matricula de alunos';
        $criar_matricula -> save();

        $editar_matricula = new Permission();
        $editar_matricula -> name = 'editar-matricula';
        $editar_matricula -> display_name = 'Editar matricula de Alunos';
        $editar_matricula -> description = 'Permite editar a matricula de alunos';
        $editar_matricula -> save();

        $ver_matriculas_regulares = new Permission();
        $ver_matriculas_regulares -> name = 'ver-matriculas-regulares';
        $ver_matriculas_regulares -> display_name = 'Ver matriculas regulares de Alunos';
        $ver_matriculas_regulares -> description = 'Permite ver as matricula regulares de alunos';
        $ver_matriculas_regulares -> save();

        $ver_matriculas_irregulares = new Permission();
        $ver_matriculas_irregulares -> name = 'ver-matriculas-irregulares';
        $ver_matriculas_irregulares -> display_name = 'Ver matriculas irregulares de Alunos';
        $ver_matriculas_irregulares -> description = 'Permite ver as matricula irregulares de alunos';
        $ver_matriculas_irregulares -> save();

        #____________________________--Ocorrencias--____________________________#
        $ver_ocorrencias = new Permission();
        $ver_ocorrencias -> name = 'ver-ocorrencias';
        $ver_ocorrencias -> display_name= 'Ver ocorrencias geradas pelo Colaborador';
        $ver_ocorrencias -> description = 'Permite ver ocorrencias geradas';
        $ver_ocorrencias ->save();

        $criar_ocorrencias = new Permission();
        $criar_ocorrencias -> name = 'criar-ocorrencias';
        $criar_ocorrencias -> display_name= 'Criar ocorrencias de Alunos';
        $criar_ocorrencias -> description = 'Permite criar ocorrencias para estudantes';
        $criar_ocorrencias ->save();

        $editar_ocorrencias = new Permission();
        $editar_ocorrencias -> name = 'editar-ocorrencias';
        $editar_ocorrencias -> display_name= 'Editar ocorrencias de Alunos';
        $editar_ocorrencias -> description = 'Permite editar as ocorrencias estudantes';
        $editar_ocorrencias ->save();

        $excluir_ocorrencias = new Permission();
        $excluir_ocorrencias -> name = 'excluir-ocorrencias';
        $excluir_ocorrencias -> display_name= 'Excluir ocorrencias de Alunos';
        $excluir_ocorrencias -> description = 'Permite excluir as ocorrencias estudantes';
        $excluir_ocorrencias ->save();

        #____________________________--Advertências--____________________________#
        $ver_advertencias = new Permission();
        $ver_advertencias -> name = 'ver-advertencias';
        $ver_advertencias -> display_name= 'Ver advertencias geradas pelo Colaborador';
        $ver_advertencias -> description = 'Permite ver advertencias geradas';
        $ver_advertencias ->save();

        $criar_advertencias = new Permission();
        $criar_advertencias -> name = 'criar-advertencias';
        $criar_advertencias -> display_name= 'Criar advertencias de Alunos';
        $criar_advertencias -> description = 'Permite criar advertencias para estudantes';
        $criar_advertencias ->save();

        $editar_advertencias = new Permission();
        $editar_advertencias -> name = 'editar-advertencias';
        $editar_advertencias -> display_name= 'Editar advertencias de Alunos';
        $editar_advertencias -> description = 'Permite editar as advertencias estudantes';
        $editar_advertencias ->save();

        $excluir_advertencias = new Permission();
        $excluir_advertencias -> name = 'excluir-advertencias';
        $excluir_advertencias -> display_name= 'Excluir advertencias de Alunos';
        $excluir_advertencias -> description = 'Permite excluir as advertencias estudantes';
        $excluir_advertencias ->save();

        #____________________________--Eventos--____________________________#
        $ver_eventos = new Permission();
        $ver_eventos -> name = 'ver_eventos';
        $ver_eventos -> display_name= 'Ver eventos gerados';
        $ver_eventos -> description = 'Permite ver eventos gerados';
        $ver_eventos ->save();

        $visualizar_evento = new Permission();
        $visualizar_evento -> name = 'visualizar_evento';
        $visualizar_evento -> display_name= 'Visualizar evento gerado';
        $visualizar_evento -> description = 'Permite visualizar evento gerado';
        $visualizar_evento ->save();

        $criar_eventos = new Permission();
        $criar_eventos -> name = 'criar_eventos';
        $criar_eventos -> display_name= 'Criar eventos';
        $criar_eventos -> description = 'Permite criar eventos no sistema';
        $criar_eventos ->save();

        $editar_eventos = new Permission();
        $editar_eventos -> name = 'editar_eventos';
        $editar_eventos -> display_name= 'Editar eventos';
        $editar_eventos -> description = 'Permite editar os eventos no sistema';
        $editar_eventos ->save();

        $excluir_eventos = new Permission();
        $excluir_eventos -> name = 'excluir_eventos';
        $excluir_eventos -> display_name= 'Excluir eventos no sistema';
        $excluir_eventos -> description = 'Permite excluir os eventos no sistema';
        $excluir_eventos ->save();

        $editar_participantes = new Permission();
        $editar_participantes -> name = 'editar_participantes';
        $editar_participantes -> display_name= 'Editar quais participantes estão no evento';
        $editar_participantes -> description = 'Permite editar os participantes do evento';
        $editar_participantes ->save();

        #____________________________--Frequência--____________________________#
        $ver_frequencia = new Permission();
        $ver_frequencia -> name = 'ver_frequencia';
        $ver_frequencia -> display_name= 'Ver frequência';
        $ver_frequencia -> description = 'Permite ver frequências';
        $ver_frequencia ->save();

        # Atribuindo as permissões às funções

        $administrador = Role::where('name', '=', 'administrador') -> first();
        $administrador -> attachPermissions(array(
            $ver_colaborador, $criar_colaborador, $ver_turma, 
            $ver_matricula, $criar_matricula, $ver_matriculas_regulares, 
            $ver_matriculas_irregulares, $ver_escola, $ver_disciplina, 
            $ver_participante, $ver_inscricao, 
            $ver_ocorrencias, $criar_ocorrencias, $editar_ocorrencias, $excluir_ocorrencias,  // ocorrências
            $ver_advertencias, $criar_advertencias, $excluir_advertencias, $editar_advertencias,
            $ver_eventos,$criar_eventos, $visualizar_evento, $editar_eventos,
            $excluir_eventos, $editar_participantes, $excluir_colaborador
        ));

        $diretor = Role::where('name', 'diretor') -> first();
        $diretor -> attachPermissions(array(
            $ver_colaborador, 
            $ver_turma, 
            $ver_matricula, $criar_matricula, $ver_matriculas_regulares, $ver_matriculas_irregulares,
            $ver_escola, 
            $ver_disciplina, 
            $ver_participante, 
            $ver_inscricao, 
            $ver_ocorrencias,  $criar_ocorrencias, $editar_ocorrencias, $excluir_ocorrencias,  // ocorrências
            $ver_advertencias,  $criar_advertencias, $excluir_advertencias, $editar_advertencias,
            $ver_eventos, $criar_eventos, $visualizar_evento, $editar_eventos, $excluir_eventos,
            $editar_participantes
        ));

        $coordenador = Role::where('name', 'coordenador') -> first();
        $coordenador -> attachPermissions(array(
            $ver_participante,
            $ver_eventos, 
            $ver_advertencias, $criar_advertencias, $editar_advertencias,
            $ver_ocorrencias,  $criar_ocorrencias, $editar_ocorrencias,
        ));

        $social = Role::where('name', 'social') -> first();
        $social -> attachPermissions(array(
            $ver_inscricao, $criar_inscricao, $ver_matricula, $criar_matricula,
            $ver_turma, $ver_participante, $ver_colaborador,
            $ver_ocorrencias, $excluir_ocorrencias,$editar_ocorrencias,$criar_ocorrencias,
            $ver_eventos, 
            $ver_advertencias,$criar_advertencias,$editar_advertencias,$excluir_advertencias
        ));

        $colaborador = Role::where('name', 'colaborador') -> first();
        $colaborador -> attachPermissions(array(
            $ver_participante, //participante
            $ver_eventos, $criar_eventos, $visualizar_evento, //eventos
            $ver_ocorrencias,  $criar_ocorrencias, $editar_ocorrencias, // ocorrências
            $ver_frequencia,  //frequência
            $editar_participantes,
        ));

        $apoio = Role::where('name', 'apoio') -> first();
        $apoio -> attachPermissions(array(
            $ver_participante, $ver_turma, $ver_matricula,
            $criar_matricula, 
            $ver_ocorrencias, $criar_ocorrencias, $editar_ocorrencias,
            $ver_eventos, $criar_eventos, $visualizar_evento,
            $editar_participantes
        ));
        
    }
}
