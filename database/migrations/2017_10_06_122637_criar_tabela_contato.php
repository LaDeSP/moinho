<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaContato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_fixo');
            $table->string('celular1');
            $table->string('celular2');
            $table->string('email');
            $table->integer('pessoa_id')->unsigned();
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
        Schema::dropIfExists('contato');
    }
}
