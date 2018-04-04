<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaInscricoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricao', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->date('data_inscricao');
            $table->date('data_avaliacao');
            $table->integer('dados_inscricao_id')->unsigned();
=======
            $table->date_time_set('dd/mm/yyyy')('data_inscricao');
            $table->date_time_set('dd/mm/yyyy')('data_avaliacao');
            $table->integer('dados_inscricao_id')->unsigned;
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
        Schema::dropIfExists('inscricao');
    }
}
