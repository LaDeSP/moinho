<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo_evento extends Model
{
    protected $table = 'periodo_evento';
    
    public function periodo(){
        return $this->belongsTo(Pessoa::class);
    }

    public function evento(){
        return $this->belongsTo(Evento::class);
    }
}
