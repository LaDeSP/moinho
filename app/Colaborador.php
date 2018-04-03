<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = 'colaborador';
    
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
    public $timestamps = false;

}
