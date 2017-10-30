<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaPresencas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presenca', function (Blueprint $table) {
            $table->increments('id');
            $table->date_time_set('dd/mm/yyyy')('data');
            $table->string('presenca');
            $table->string('justificativa');
            $table->integer('participante_id')->unsigned;
            $table->integer('disciplina_id')->unsigned;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presenca');
    }
}
