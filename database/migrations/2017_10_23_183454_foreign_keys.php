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
            $table->foreign('dados_pessoais_id')->references('id')->on('pessoa');
        });

        Schema::table('dados_inscricao', function(Blueprint $table){
            $table->foreign('mae_id')->references('id')->on('pessoa');
        });

        Schema::table('dados_inscricao', function(Blueprint $table){
            $table->foreign('pai_id')->references('id')->on('pessoa');
        });
        Schema::table('pessoa', function(Blueprint $table){
            $table->foreign('Endereco_id')->references('id')->on('Endereco');
        });
        Schema::table('escola', function(Blueprint $table){
            $table->foreign('contato_id')->references('id')->on('contato');
        });
        Schema::table('escola', function(Blueprint $table){
            $table->foreign('Endereco_id')->references('id')->on('Endereco');
        });
        Schema::table('contato', function(Blueprint $table){
            $table->foreign('pessoa_id')->references('id')->on('pessoa');
        });
        Schema::table('documento', function (Blueprint $table){
            $table->foreign('documento_tipo_id')->references('id')->on('documento_tipo');
            $table->foreign('inscricao_id')->references('id')->on('inscricao');
        });


    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dados_inscricao', function (Blueprint $table){
            $table->dropForeign(['dados_pessoais_id']);
        });

        Schema::table('dados_inscricao', function (Blueprint $table){
            $table->dropForeign(['mae_id']);
        });

        Schema::table('dados_inscricao', function (Blueprint $table){
            $table->dropForeign(['pai_id']);
        });
        Schema::table('pessoa', function (Blueprint $table){
            $table->dropForeign(['Endereco_id']);
        });
        Schema::table('escola', function (Blueprint $table){
            $table->dropForeign(['Endereco_id']);
        });
        Schema::table('escola', function (Blueprint $table){
            $table->dropForeign(['contato_id']);
        });
        Schema::table('documento', function (Blueprint $table){
            $table->dropForeign(['documento_tipo_id', 'inscricao_id']);
        });
    }
}