<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertencia extends Model
{
    //    
    protected $table = 'advertencia';

    public function colaborador(){
        return $this->belongsTo(Colaborador::class);
    }

    public function participante() {
        return $this->belongsTo(Participante::class);
    }

    public function ocorrencia(){
        return $this->belongsTo(Ocorrencia::class);

    }

}
