<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAdvertencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertencia', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dd/mm/yyyy');
            $table->string('tipo_abuso');
            $table->string('agressor');
            $table->integer('ocorrencia_id')->unsigned();
            $table->integer('nome_advertencia_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertencia');
    }
}

