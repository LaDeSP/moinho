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

    public function user() {
        return $this->belongsTo(User::class);
    }
    public $timestamps = false;

}
