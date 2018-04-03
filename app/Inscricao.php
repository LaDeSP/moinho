<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricao';
    
    public function dados_inscricao()
    {
        return $this->belongsTo(DadosInscricao::class);
    }
    public $timestamps = false;

}
