<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DadosInscricao extends Model
{
    protected $table="dados_inscricao";

    public function dados_pessoais()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function responsavel1()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function responsavel2()
    {
        return $this->belongsTo(Pessoa::class);
    }
    
    public function escola(){
        return $this->belongsTo(Escolas::class);
    }

    


    /*
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }*/
    public $timestamps = false;
}
