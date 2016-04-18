<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class SchoolUser extends Model
{
    protected $table = 'school_user';

    public function schools()
    {
        return $this->belongsToMany('app\School');
    }

    public function users()
    {
        return $this->belongsToMany('app\User');
    }
}
