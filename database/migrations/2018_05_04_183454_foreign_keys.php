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
        Schema::table('documento', function (Blueprint $table){
            $table->dropForeign(['documento_tipo_id', 'inscricao_id']);
        });
    }
}