<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'disciplina';
   /* public function organization()
    {
        return $this->belongsToOne(Organization::class);
    }*/
    public $timestamps = false;

}