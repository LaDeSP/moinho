<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusMatricula extends Model
{
    protected $table = 'status_matricula';
   /* public function organization()
    {
        return $this->belongsToOne(Organization::class);
    }*/
    public $timestamps = false;

}
