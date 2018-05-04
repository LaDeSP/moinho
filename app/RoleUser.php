<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = "role_user";
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
