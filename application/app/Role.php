<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany('app\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('app\Permission');
    }
}
