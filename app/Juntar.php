<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juntar extends Model
{
    protected $table = "juntar";

    public function relatorio(){
        return $this->belongsTo(Relatorio::class);
    }


    public $timestamps = false;
}
