<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condicao extends Model
{
    protected $table = "condicoes";

    public function tipo(){
        return $this->belongsTo(Tipos::class);
    }


    public $timestamps = false;
}