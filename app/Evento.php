<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }
}
