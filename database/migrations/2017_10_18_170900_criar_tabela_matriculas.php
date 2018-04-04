<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaMatriculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula', function (Blueprint $table) {
            $table->increments('id');
            $table->string('turno');
<<<<<<< HEAD
            $table->integer('status_matricula_id')->unsigned();
            $table->integer('inscricao_id')->unsigned();
            $table->date('data');
            $table->integer('turma_id')->unsigned();
=======
            $table->integer('status_matricula_id');->unsigned;
            $table->integer('inscricao_id')->unsigned;
            $table->date_time_set('dd/mm/yyyy')('data');
            $table->integer->('turma_id')->unsigned;
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matricula');
    }
}
