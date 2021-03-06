<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coluna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coluna', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coluna');
            $table->string('nome');
            $table->string('tabela');
            $table->timestamps();

            $table->unsignedInteger('relatorio_id');
            $table->unsignedInteger('tipo_id'); //Gerar o tipo primeiro que a coluna
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coluna');
    }
}
