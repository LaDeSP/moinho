<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaOcorrencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('motivo');
<<<<<<< HEAD
            $table->date('data');
            $table->integer('participante_id')->unsigned();
            $table->integer('coordenador_id')->unsigned();
=======
            $table->date_time_set('dd/mm/yyyy')('data');
            $table->integer('participante_id')->unsigned;
            $table->integer('coordenador_id')->unsigned;
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
        Schema::dropIfExists('ocorrencia');
    }
}
