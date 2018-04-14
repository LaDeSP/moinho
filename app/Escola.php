<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $table="escolas";

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function contato()
    {
        return $this->hasMany(Contato::class);
    }



    
    


    public $timestamps = false;
}
