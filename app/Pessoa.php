<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoa";
    
    public function Endereco()
    {
        return $this->belongsTo(Endereco::class);
    }



    public $timestamps = false;
}
