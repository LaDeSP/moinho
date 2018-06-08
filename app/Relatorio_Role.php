<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relatorio_Role extends Model
{
    protected $table = "relatorio_role";

    public function relatorio(){
        return $this->belongsTo(Relatorio::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }


    public $timestamps = false;
}
