<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Condicoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('condicao');
            $table->boolean('especial')->default(1);
            
            $table->timestamps();

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
        Schema::dropIfExists('condicoes');
    }
}
