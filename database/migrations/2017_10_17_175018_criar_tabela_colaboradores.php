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
<<<<<<< HEAD
            $table->integer('ano_ingreco');
            $table->string('area_atuacao');
            $table->integer('pessoa_id')->unsigned();
            $table->integer('tipo_colaborador_id')->unsigned();
=======
            $table->year('ano_ingreco');
            $table->string('area_atuacao');
            $table->integer('dados_pessoais_id')->unsigned();
            $table->string('tipo');
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
        Schema::dropIfExists('colaborador');
    }
}

