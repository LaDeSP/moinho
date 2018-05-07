<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    protected $table = 'ocorrencia';
    
    public function colaborador(){
        return $this->belongsTo(Colaborador::class);
    }

    public function participante() {
        return $this->belongsTo(Participante::class);
    }
   

}
