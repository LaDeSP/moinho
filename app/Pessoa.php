<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoa";
    
    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function contato() {
        return $this->hasMany(Contato::class);
    }



    public $timestamps = false;
}
