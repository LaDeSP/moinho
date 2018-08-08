<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAdvertencia extends Migration
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
            $table->integer('providencia'); 
            $table->text('observacao')->nullable(); //texto não obrigatório 
            $table->timestamps();
            $table->string('colaborador'); //nome do colaborador que gerou a advertencia ou id
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

