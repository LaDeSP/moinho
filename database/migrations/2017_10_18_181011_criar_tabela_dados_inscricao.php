<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaDadosInscricao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_inscricao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('turno');
            $table->string('turma');
            $table->text('observacoes')->nullable();
            $table->string('transporte');
            $table->string('profissao')->nullable();
            $table->string('raca');
            $table->string('religiao');
            $table->float('renda')->unsigned();
            $table->integer('qtd_residencia')->unsigned();
            $table->string('beneficio_social');
            $table->string('serie');
            $table->integer('escola_id')->unsigned();
            $table->integer('dados_pessoais_id')->unsigned();
            $table->integer('responsavel1_id')->unsigned();
            $table->integer('responsavel2_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_inscricao');
    }
}
