<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dados_inscricao', function(Blueprint $table){
            $table->foreign('dados_pessoais_id')->references('id')->on('pessoas');
        });

        Schema::table('dados_inscricao', function(Blueprint $table){
            $table->foreign('responsavel2_id')->references('id')->on('pessoas');
        });

        Schema::table('dados_inscricao', function(Blueprint $table){
            $table->foreign('responsavel1_id')->references('id')->on('pessoas');
        });

        Schema::table('pessoas', function(Blueprint $table){
            $table->foreign('endereco_id')->references('id')->on('enderecos');
        });

        Schema::table('escolas', function(Blueprint $table){
            $table->foreign('contato_id')->references('id')->on('contatos');
        });

        Schema::table('pessoas', function(Blueprint $table){
            $table->foreign('contato_id')->references('id')->on('contatos');
        });

        Schema::table('escolas', function(Blueprint $table){
            $table->foreign('endereco_id')->references('id')->on('enderecos');
        });

        Schema::table('documentos', function (Blueprint $table){
            $table->foreign('documento_tipo_id')->references('id')->on('documento_tipo');
            $table->foreign('inscricao_id')->references('id')->on('inscricao');
        });

        Schema::table('colaborador', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        //Novos
       
        Schema::table('eventos', function (Blueprint $table) {
            $table->foreign('colaborador_id')->references('id')->on('colaborador');
        });

        Schema::table('evento_situacao', function (Blueprint $table) {
            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->foreign('situacao_id')->references('id')->on('situacoes');
        });

        Schema::table('pessoa_evento', function (Blueprint $table) {
            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });

        Schema::table('periodo_evento', function (Blueprint $table) {
            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->foreign('periodo_id')->references('id')->on('periodos');
        });

        Schema::table('ocorrencia', function (Blueprint $table){
          $table->foreign('tipo_ocorrencia_advertencia')->references('id')->on('tipo_ocorrencia_advertencia');
           $table->foreign('colaborador_id')->references('id')->on('colaborador');
           $table->foreign('participante_id')->references('id')->on('matricula');
        });

        Schema::table('advertencia',function(Blueprint $table){
            $table->foreign('tipo_ocorrencia_advertencia')->references('id')->on('tipo_ocorrencia_advertencia');
            $table->foreign('ocorrencia_id')->references('id')->on('ocorrencia');
        });
        
        Schema::table('disciplina',function(Blueprint $table){
            $table->foreign('colaborador_id')->references('id')->on('colaborador');
        });

        Schema::table('matricula',function(Blueprint $table){
            $table->foreign('status_matricula_id')->references('id')->on('status_matricula');
            $table->foreign('inscricao_id')->references('id')->on('inscricao');
            $table->foreign('turma_id')->references('id')->on('turma');
        });

        Schema::table('turma',function(Blueprint $table){
            $table->foreign('nome_turma_id')->references('id')->on('nome_turma');
        });
      

        Schema::table('turma_disciplina',function(Blueprint $table){
            $table->foreign('turma_id')->references('id')->on('turma');
            $table->foreign('disciplina_id')->references('id')->on('disciplina');            
        });

        Schema::table('frequencia',function(Blueprint $table){
            $table->foreign('disciplina_id')->references('id')->on('disciplina');    
            $table->foreign('participante_id')->references('id')->on('matricula');

        }); 

        //Incio Relatórios
        Schema::table('relatorio_role',function(Blueprint $table){
            $table->foreign('relatorio_id')->references('id')->on('relatorios');
            $table->foreign('role_id')->references('id')->on('roles');            
        });

        Schema::table('juntar',function(Blueprint $table){
            $table->foreign('relatorio_id')->references('id')->on('relatorios');
        });

        Schema::table('coluna',function(Blueprint $table){
            $table->foreign('relatorio_id')->references('id')->on('relatorios');
        });
        //Fim Relatórios


    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('colaborador', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::table('dados_inscricao', function (Blueprint $table){
            $table->dropForeign(['dados_pessoais_id']);
        });

        Schema::table('dados_inscricao', function (Blueprint $table){
            $table->dropForeign(['responsavel1_id']);
        });

        Schema::table('dados_inscricao', function (Blueprint $table){
            $table->dropForeign(['responsavel2_id']);
        });
        Schema::table('pessoas', function (Blueprint $table){
            $table->dropForeign(['Endereco_id']);
        });
        Schema::table('escolas', function (Blueprint $table){
            $table->dropForeign(['Endereco_id']);
        });
        Schema::table('escolas', function (Blueprint $table){
            $table->dropForeign(['contato_id']);
        });
        Schema::table('documentos', function (Blueprint $table){
            $table->dropForeign(['documento_tipo_id', 'inscricao_id']);
        });
        
    }
}