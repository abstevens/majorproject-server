<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
