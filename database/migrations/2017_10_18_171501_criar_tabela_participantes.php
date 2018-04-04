<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaParticipantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serie');
            $table->string('sala_de_aula');
            $table->string('status');
<<<<<<< HEAD
            $table->integer('matricula_id')->unsigned();
=======
            $table->integer('matricula_id')->unsigned;
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
        Schema::dropIfExists('participante');
    }
}
