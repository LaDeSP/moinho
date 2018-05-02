<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoSituacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_situacao', function (Blueprint $table) {
            $table->increments('id');
            $table->text('observacao')->nullable();
            $table->timestamps();

            $table->unsignedInteger('evento_id');
            $table->unsignedInteger('situacao_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_situacao');
    }
}
