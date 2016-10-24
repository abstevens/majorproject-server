<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
//    public function users()
//    {
//        return $this->belongsToMany('App\User');
//    }

    public function courses()
    {
        return $this->belongsTo('App\Course');
    }
}
