<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'Endereco';
   /* public function organization()
    {
        return $this->belongsToOne(Organization::class);
    }*/
    public $timestamps = false;

}
