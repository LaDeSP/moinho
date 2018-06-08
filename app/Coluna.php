<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coluna extends Model
{
    protected $table = "coluna";

    public function relatorio(){
        return $this->belongsTo(Relatorio::class);
    }

    public function tipo(){
        return $this->belongsTo(Tipos::class);
    }


    public $timestamps = false;
}