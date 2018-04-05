<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaDisciplina extends Model
{
    protected $table = 'turma_disciplina';
   /* public function organization()
    {
        return $this->belongsToOne(Organization::class);
    }*/
    public $timestamps = false;

}