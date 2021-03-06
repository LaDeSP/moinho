<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contatos';
    
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
    public $timestamps = false;

}
