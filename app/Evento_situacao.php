<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento_situacao extends Model
{
    protected $table = 'evento_situacao';
    
    public function evento(){
        return $this->belongsTo(Evento::class);
    }

    public function situacao() {
        return $this->belongsTo(Situacao::class);
    }
}
