<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaNomeTurmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nome_turma', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->string('nome_turma');
        });
=======
            $table->string('nome');
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nome_turma');
    }
}
