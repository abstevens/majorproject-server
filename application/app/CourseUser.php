<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    protected $table = 'course_user';

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
