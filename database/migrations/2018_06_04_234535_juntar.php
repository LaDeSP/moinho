<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Juntar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juntar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tabela1');
            $table->string('tabela2');
            $table->string('coluna1');
            $table->string('coluna2');
            $table->string('condicao');
            $table->timestamps();

            $table->unsignedInteger('relatorio_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juntar');
    }
}
