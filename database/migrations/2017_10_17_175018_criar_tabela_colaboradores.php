<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaColaboradores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador', function (Blueprint $table) {
            $table->increments('id');
            $table->year('ano_ingreco');
            $table->string('area_atuacao');
            $table->integer('dados_pessoais_id')->unsigned();
            $table->string('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaborador');
    }
}

