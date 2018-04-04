<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

<<<<<<< HEAD
class CriarTabelaStatusMatricula extends Migration
=======
class CriarTabelaStatus_Matricula extends Migration
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_matricula', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_matricula');
    }
}