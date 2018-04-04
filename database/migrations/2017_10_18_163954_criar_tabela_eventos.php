<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('tipo');
<<<<<<< HEAD
            $table->date('data_inicial');
            $table->date('data_final');
=======
            $table->date_time_set('dd/mm/yyyy')('data_inicial');
            $table->date_time_set('dd/mm/yyyy')('data_final');
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
            $table->string('descricao');
            $table->string('situacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento');
    }
}
