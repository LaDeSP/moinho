<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaTurmaDisciplinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma_disciplina', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->integer('turma_id')->unsigned();
            $table->integer('disciplina_id')->unsigned();
=======
            $table->integer('turma_id')->unsigned;
            $table->integer('disciplina_id')->unsigned;
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
        Schema::dropIfExists('turma_disciplina');
    }
}
