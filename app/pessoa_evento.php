<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pessoa_evento extends Model
{
    protected $table = 'pessoa_evento';

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }

    public function evento(){
        return $this->belongsTo(Evento::class);
    }
}
