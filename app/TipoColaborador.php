<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoColaborador extends Model
{
    protected $table = 'tipo_colaborador';
   /* public function organization()
    {
        return $this->belongsToOne(Organization::class);
    }*/
    public $timestamps = false;

}
