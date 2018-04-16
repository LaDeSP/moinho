<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";
    
    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function contato() {
        return $this->belongsTo(Contato::class);
    }



    public $timestamps = false;
}
