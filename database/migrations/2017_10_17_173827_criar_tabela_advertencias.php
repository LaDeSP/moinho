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
            $table->date('data_advertencia'); //data da advertencia

            $table->string('agressor')->nullable(); //não obrigatório
            $table->boolean('responsavel_assina'); 
            $table->string('observacao')->nullable(); //texto não obrigatório 
           
            $table->string('colaborador'); //nome do colaborador que gerou a ocorrência
            $table->integer('ocorrencia_id')->unsigned();
            $table->integer('tipo_ocorrencia_advertencia')->unsigned();
             
            
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

