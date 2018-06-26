<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaFrequencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequencia', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->boolean('frequencia');
            $table->string('justificativa')->nullable();
            $table->integer('quantidade')->nullable();;
            $table->unsignedInteger('participante_id')->unsigned; //vai referenciar matricula.id
            $table->unsignedInteger('disciplina_id')->unsigned;
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frequencia');
    }
}
