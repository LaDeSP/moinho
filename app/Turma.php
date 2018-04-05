<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = 'turma';
    
    public function nome()
    {
        return $this->belongsTo(NomeTurma::class);
    }
    public $timestamps = false;

}
