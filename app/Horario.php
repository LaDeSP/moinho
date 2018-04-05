<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
  	public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
    public $timestamps = false;

}