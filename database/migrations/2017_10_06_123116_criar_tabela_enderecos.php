<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rua');
            $table->string('bairro');
            $table->string('numero');
            $table->string('complemento');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
	        $table->string('pais');
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
        Schema::dropIfExists('Endereco');
    }
}

