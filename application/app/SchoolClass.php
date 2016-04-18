<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    public function users()
    {
        return $this->belongsToMany('app\User');
    }

    public function courses()
    {
        return $this->belongsTo('app\Course');
    }
}
