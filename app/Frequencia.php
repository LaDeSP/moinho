<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequencia extends Model
{
	protected $table = 'frequencias';

	public function alunos() {

		return $this -> belongsTo(App\Aluno::class);
	}

	public function disciplina() {

		return $this -> belongsTo(App\Disciplina::class);
	}
}
