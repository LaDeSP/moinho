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
            $table->date_time_set('dd/mm/yyyy')('data');
            $table->integer('participante_id')->unsigned;
            $table->integer('coordenador_id')->unsigned;
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
