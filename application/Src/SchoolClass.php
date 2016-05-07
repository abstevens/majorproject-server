<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function courses()
    {
        return $this->belongsTo('App\Course');
    }
}
