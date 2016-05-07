<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolUser extends Model
{
    protected $table = 'school_user';

    public function schools()
    {
        return $this->belongsToMany('App\School');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
