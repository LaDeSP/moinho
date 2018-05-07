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
            $table->text('motivo');
            $table->date('data_ocorrencia');
                             
            $table->integer('participante_id')->unsigned();
            $table->integer('colaborador_id')->unsigned();
            $table->integer('tipo_ocorrencia_advertencia')->unsigned();
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
        Schema::dropIfExists('ocorrencia');
    }
}
