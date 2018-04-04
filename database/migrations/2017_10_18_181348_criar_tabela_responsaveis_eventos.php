<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaResponsaveisEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavel_evento', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->integer('colaborador_id')->unsigned();
            $table->integer('evento_id')->unsigned();
=======
            $table->integer('colaborador_id')->integer;
            $table->integer('evento_id')->integer;
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
        Schema::dropIfExists('responsavel_evento');
    }
}

<<<<<<< HEAD
=======
CREATE TABLE IF NOT EXISTS `moinho`.`responsavel_evento` (
  `id` INT NOT NULL,
  `colaborador_id` INT NOT NULL,
  `evento_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_responsavel_evento_colaborador1_idx` (`colaborador_id` ASC),
  INDEX `fk_responsavel_evento_evento1_idx` (`evento_id` ASC),
  CONSTRAINT `fk_responsavel_evento_colaborador1`
    FOREIGN KEY (`colaborador_id`)
    REFERENCES `moinho`.`colaborador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_responsavel_evento_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `moinho`.`evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
